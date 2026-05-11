<!DOCTYPE html>
<html>
<body style="font-family:sans-serif;color:#1a1a1a;padding:32px;max-width:600px;margin:0 auto;">
    <h2 style="font-size:1.25rem;font-weight:700;margin-bottom:0.5rem;">You're in{{ $subscriber->name ? ', ' . $subscriber->name : '' }}!</h2>
    <p style="color:#6b7280;font-size:0.95rem;margin-bottom:1.5rem;">Thanks for subscribing to Rare Input. We'll be sharing insights on digital marketing, web development, and growth strategies — straight to your inbox.</p>

    <p style="font-size:0.9rem;color:#374151;">In the meantime, feel free to explore our services at
        <a href="{{ config('app.url') }}" style="color:#1a1a2e;">{{ config('app.url') }}</a>.
    </p>

    <p style="margin-top:2rem;font-size:0.9rem;color:#374151;">
        Warm regards,<br>
        <strong>The Rare Input Team</strong>
    </p>
    <p style="margin-top:2rem;font-size:0.8rem;color:#9ca3af;">
        Don't want to hear from us? <a href="{{ route('unsubscribe', $subscriber->unsubscribe_token) }}" style="color:#9ca3af;">Unsubscribe</a>.
    </p>
</body>
</html>
