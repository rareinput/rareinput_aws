# AWS Deployment Guide — Rare Input (Laravel 12)

## Stack Overview

| Component | Choice |
|---|---|
| Server | AWS EC2 (Ubuntu 24.04 LTS) |
| Web server | Nginx + PHP 8.2-FPM |
| Database | Supabase PostgreSQL (already hosted) |
| File storage | AWS S3 |
| Mail | Resend (already configured) |
| Queue / Cache | Database driver (upgrade to SQS/Redis later) |
| SSL | Let's Encrypt (Certbot) |

---

## 1. Launch EC2 Instance

1. Go to **EC2 → Launch Instance**
2. **AMI**: Ubuntu Server 24.04 LTS (64-bit x86)
3. **Instance type**: `t3.small` (minimum) or `t3.medium` for comfort
4. **Key pair**: Create or select an existing `.pem` key
5. **Security group** — open these ports:
   - SSH: 22 (your IP only)
   - HTTP: 80 (anywhere)
   - HTTPS: 443 (anywhere)
6. **Storage**: 20 GB gp3
7. Launch and note the **Public IPv4 address**

---

## 2. Point Domain to EC2

In your DNS provider (Route 53 or external):
- Add an **A record**: `rareinput.com` → EC2 public IP
- Add an **A record**: `www.rareinput.com` → EC2 public IP

Wait for DNS to propagate before running Certbot.

---

## 3. SSH into the Server

```bash
chmod 400 your-key.pem
ssh -i your-key.pem ubuntu@YOUR_EC2_IP
```

---

## 4. Install Dependencies

```bash
sudo apt update && sudo apt upgrade -y

# Nginx
sudo apt install -y nginx

# PHP 8.2 + extensions
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
sudo apt install -y php8.2-fpm php8.2-cli php8.2-pgsql php8.2-mbstring \
  php8.2-xml php8.2-curl php8.2-zip php8.2-bcmath php8.2-intl \
  php8.2-gd php8.2-tokenizer php8.2-fileinfo

# Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Node.js 20 (for npm run build)
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install -y nodejs

# Git
sudo apt install -y git
```

---

## 5. Clone the Repository

```bash
sudo mkdir -p /var/www/rareinput
sudo chown ubuntu:ubuntu /var/www/rareinput

git clone https://github.com/rareinput/rareinput_aws.git /var/www/rareinput
cd /var/www/rareinput
```

---

## 6. Install PHP & Node Dependencies

```bash
composer install --no-dev --optimize-autoloader
npm ci
npm run build
```

---

## 7. Configure Environment

```bash
cp .env.example .env
nano .env
```

Update these values:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://rareinput.com

# Supabase DB — keep same as local
DB_CONNECTION=pgsql
DB_URL=postgresql://...

# S3 for file storage
FILESYSTEM_DISK=s3
AWS_ACCESS_KEY_ID=your_key
AWS_SECRET_ACCESS_KEY=your_secret
AWS_DEFAULT_REGION=ap-south-1
AWS_BUCKET=rareinput-uploads
AWS_URL=https://rareinput-uploads.s3.ap-south-1.amazonaws.com

# Mail — keep same Resend config
MAIL_MAILER=smtp
MAIL_HOST=smtp.resend.com
MAIL_PORT=465
MAIL_SCHEME=smtps
MAIL_USERNAME=resend
MAIL_PASSWORD=your_resend_api_key
MAIL_FROM_ADDRESS=hello@ada.rareinput.com

# Queue & cache
QUEUE_CONNECTION=database
CACHE_STORE=database
```

```bash
php artisan key:generate
```

---

## 8. Set Permissions

```bash
sudo chown -R www-data:www-data /var/www/rareinput/storage /var/www/rareinput/bootstrap/cache
sudo chmod -R 775 /var/www/rareinput/storage /var/www/rareinput/bootstrap/cache
```

---

## 9. Run Migrations

```bash
php artisan migrate --force
```

---

## 10. Configure Nginx

```bash
sudo nano /etc/nginx/sites-available/rareinput
```

Paste:

```nginx
server {
    listen 80;
    server_name rareinput.com www.rareinput.com;
    root /var/www/rareinput/public;
    index index.php;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }

    client_max_body_size 20M;
}
```

```bash
sudo ln -s /etc/nginx/sites-available/rareinput /etc/nginx/sites-enabled/
sudo rm /etc/nginx/sites-enabled/default
sudo nginx -t
sudo systemctl restart nginx
```

---

## 11. SSL with Let's Encrypt

```bash
sudo apt install -y certbot python3-certbot-nginx
sudo certbot --nginx -d rareinput.com -d www.rareinput.com
```

Certbot auto-configures Nginx for HTTPS and sets up auto-renewal.

---

## 12. Set Up S3 for File Uploads

1. Create an S3 bucket: `rareinput-uploads` in your chosen region
2. Uncheck "Block all public access" (for public images like OG images)
3. Add bucket policy for public read:
```json
{
  "Version": "2012-10-17",
  "Statement": [{
    "Effect": "Allow",
    "Principal": "*",
    "Action": "s3:GetObject",
    "Resource": "arn:aws:s3:::rareinput-uploads/*"
  }]
}
```
4. Create an **IAM user** with `AmazonS3FullAccess`, generate access keys, add to `.env`
5. Install the AWS SDK:
```bash
composer require league/flysystem-aws-s3-v3 --no-dev
```

---

## 13. Queue Worker (for emails & jobs)

```bash
sudo nano /etc/supervisor/conf.d/rareinput-worker.conf
```

Paste:

```ini
[program:rareinput-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/rareinput/artisan queue:work --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=www-data
numprocs=2
redirect_stderr=true
stdout_logfile=/var/www/rareinput/storage/logs/worker.log
stopwaitsecs=3600
```

```bash
sudo apt install -y supervisor
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start rareinput-worker:*
```

---

## 14. Scheduler (for Laravel cron)

```bash
sudo crontab -e -u www-data
```

Add:

```
* * * * * php /var/www/rareinput/artisan schedule:run >> /dev/null 2>&1
```

---

## 15. Optimize for Production

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
```

---

## 16. Deployment Checklist

- [ ] `APP_DEBUG=false` in `.env`
- [ ] `APP_ENV=production` in `.env`
- [ ] `APP_URL` set to HTTPS domain
- [ ] S3 configured and `FILESYSTEM_DISK=s3`
- [ ] `php artisan storage:link` not needed (S3 handles it)
- [ ] SSL certificate active
- [ ] Queue worker running via Supervisor
- [ ] Cron job added
- [ ] All caches cleared and rebuilt

---

## Future Deploys (after first setup)

```bash
cd /var/www/rareinput
git pull origin main
composer install --no-dev --optimize-autoloader
npm ci && npm run build
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
sudo supervisorctl restart rareinput-worker:*
```

---

## Useful Commands

```bash
# View logs
tail -f /var/www/rareinput/storage/logs/laravel.log

# Restart PHP-FPM
sudo systemctl restart php8.2-fpm

# Restart Nginx
sudo systemctl restart nginx

# Check queue worker
sudo supervisorctl status rareinput-worker:*

# Clear all caches
php artisan optimize:clear
```
