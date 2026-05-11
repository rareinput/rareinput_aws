<!DOCTYPE html>
<html>
<body style="font-family:sans-serif;color:#1a1a1a;padding:32px;max-width:600px;margin:0 auto;">
    <div style="font-size:0.95rem;color:#374151;line-height:1.7;">
        {!! nl2br(e($sequenceEmail->body)) !!}
    </div>

    <p style="margin-top:2rem;font-size:0.9rem;color:#374151;">
        Warm regards,<br>
        <strong>The Rare Input Team</strong>
    </p>
    <p style="margin-top:2rem;font-size:0.8rem;color:#9ca3af;">
        Don't want to hear from us? <a href="{{ route('unsubscribe', $subscriber->unsubscribe_token) }}" style="color:#9ca3af;">Unsubscribe</a>.
    </p>
</body>
</html>
