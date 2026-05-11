<!DOCTYPE html>
<html>
<body style="font-family:sans-serif;color:#1a1a1a;padding:32px;max-width:600px;margin:0 auto;">
    <h2 style="font-size:1.25rem;font-weight:700;margin-bottom:0.5rem;">Thanks for reaching out, {{ $contact->name }}.</h2>
    <p style="color:#6b7280;font-size:0.95rem;margin-bottom:1.5rem;">We have received your message and will get back to you within one business day.</p>

    <div style="padding:1.25rem;background:#f9fafb;border-radius:8px;font-size:0.9rem;color:#374151;line-height:1.6;margin-bottom:2rem;">
        <p style="font-weight:600;margin:0 0 0.5rem;">Your message:</p>
        <p style="margin:0;white-space:pre-wrap;color:#6b7280;">{{ $contact->message }}</p>
    </div>

    <p style="font-size:0.9rem;color:#374151;">In the meantime, feel free to explore our services at
        <a href="{{ config('app.url') }}" style="color:#1a1a2e;">{{ config('app.url') }}</a>.
    </p>

    <p style="margin-top:2rem;font-size:0.9rem;color:#374151;">
        Warm regards,<br>
        <strong>The Rare Input Team</strong>
    </p>
    <p style="margin-top:2rem;font-size:0.8rem;color:#9ca3af;">This is an automated acknowledgement. Please do not reply to this email.</p>
</body>
</html>
