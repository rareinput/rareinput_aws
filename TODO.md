# Rare Input — Backlog

## Pages
- [ ] About Us page
- [ ] Contact form thank-you page
- [ ] Custom 404 page

## Blog
- [ ] Style blog detail page for long-form content typography
- [ ] Featured image display on blog listing and detail pages

## Admin
- [ ] UI to view contact form submissions in admin panel

## Homepage / General
- [ ] Case studies / portfolio section
- [ ] Testimonials section
- [ ] General FAQ page
- [ ] Active nav link highlighting (current page)
- [x] Open Graph / social share meta tags
- [x] Unique meta descriptions per page

## SEO — Manual Tasks
- [ ] **OG fallback image** — Create a 1200×630px image and place it at `public/og-default.jpg`. This is the social share image used when a page has no specific OG image (all pages without a featured image currently show nothing). Format: JPG, ≤300 KB. Include brand name and tagline.
- [ ] **Blog search** — The WebSite schema on the home page declares a `SearchAction` pointing to `/blog?search=`. If you add a search feature to the blog index route, this will activate Google Sitelinks Searchbox. Until then it's harmless but unused.
- [ ] **Organization address** — The Organization schema uses `addressCountry: IN`. Update if the registered address is different or if you want a full street address added for local SEO.
- [ ] **Twitter/X handle** — The layout emits `twitter:site: @rareinput`. Verify this handle is correct and the account is active.
