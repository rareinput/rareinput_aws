<!DOCTYPE html>
<html>
<body style="font-family:sans-serif;color:#1a1a1a;padding:32px;max-width:600px;margin:0 auto;">
    {!! $trackedBody !!}

    <p style="margin-top:2rem;font-size:0.9rem;color:#374151;">
        Warm regards,<br>
        <strong>The Rare Input Team</strong>
    </p>
    <p style="margin-top:2rem;font-size:0.8rem;color:#9ca3af;">
        You're receiving this because you subscribed to Rare Input updates.<br>
        Don't want to hear from us? <a href="{{ route('unsubscribe', $subscriber->unsubscribe_token) }}?nl={{ $newsletter->id }}" style="color:#9ca3af;">Unsubscribe</a>.
    </p>
</body>
</html>
