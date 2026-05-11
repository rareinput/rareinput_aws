# Running the Laravel Scheduler in Production

The drip email system depends on Laravel's task scheduler. The scheduler itself is just one cron entry on your server — Laravel handles everything else internally.

---

## The one cron entry you need

SSH into your server and run:

```bash
crontab -e
```

Add this single line:

```
* * * * * cd /path/to/your/project && php artisan schedule:run >> /dev/null 2>&1
```

Replace `/path/to/your/project` with the actual path to the `website/` folder on your server. For example:

```
* * * * * cd /var/www/rareinput.com && php artisan schedule:run >> /dev/null 2>&1
```

This runs every minute. Laravel reads your schedule definition and decides which commands are actually due. The `sequences:send` command is configured to run **daily at 08:00**.

---

## What runs automatically

Defined in `routes/console.php`:

```php
Schedule::command('sequences:send')->dailyAt('08:00')->withoutOverlapping();
```

`sequences:send` is the drip engine — it:
1. Finds all active subscribers enrolled in active sequences
2. Checks which email is due today based on `started_at + day_number`
3. Sends it via Resend (SMTP) and records the send in `sequence_sends`
4. Marks the sequence complete when all emails have been sent

`withoutOverlapping()` ensures if a run takes longer than a minute, a second instance won't start on top of it.

---

## Testing the scheduler locally

To verify the cron entry works without waiting until 08:00:

```bash
# Run the drip command directly (ignores schedule timing)
php artisan sequences:send

# Or test that the scheduler itself is wired up
php artisan schedule:list
```

`schedule:list` will show `sequences:send` with its next due time.

---

## If you're on a managed host (Forge, Ploi, etc.)

**Laravel Forge / Ploi:** Add a scheduled job in the dashboard:

- **Command:** `php artisan schedule:run`
- **Frequency:** Every minute
- **User:** `forge` (or `www-data` depending on your setup)

These platforms handle the crontab for you — just fill in the form.

**Shared hosting (cPanel):** Go to Cron Jobs → add a new cron, set frequency to "Every Minute", and enter:

```
cd /home/yourusername/public_html && php artisan schedule:run >> /dev/null 2>&1
```

---

## Verifying emails are going out

Check the `sequence_sends` table in Supabase — each row represents one email that was successfully sent. If the count grows each day after 08:00, the scheduler is working.

You can also tail the Laravel log:

```bash
tail -f storage/logs/laravel.log
```

---

## Timezone

The schedule runs in the timezone set in `config/app.php` (`timezone`). Make sure it matches your expected send time. Default is `UTC`. If you want 08:00 IST, either:

- Change `APP_TIMEZONE=Asia/Kolkata` in `.env` and `config/app.php` to read it, or
- Adjust the time: 08:00 IST = 02:30 UTC → `dailyAt('02:30')`
