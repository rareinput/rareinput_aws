<!DOCTYPE html>
<html>
<body style="font-family:sans-serif;color:#1a1a1a;padding:32px;max-width:600px;margin:0 auto;">
    <h2 style="font-size:1.25rem;font-weight:700;margin-bottom:0.5rem;">We received your application, {{ $application->name }}.</h2>
    <p style="color:#6b7280;font-size:0.95rem;margin-bottom:1.5rem;">
        Thank you for applying for the <strong style="color:#1a1a1a;">{{ $application->jobPosting->title }}</strong> position at Rare Input.
        We have received your application and will review it shortly.
    </p>

    <div style="padding:1.25rem;background:#f9fafb;border-radius:8px;font-size:0.9rem;color:#374151;line-height:1.6;margin-bottom:1.5rem;">
        <p style="font-weight:600;margin:0 0 0.75rem;">Application Summary:</p>
        <table style="width:100%;border-collapse:collapse;">
            <tr>
                <td style="padding:5px 0;font-weight:600;width:40%;">Position</td>
                <td style="padding:5px 0;color:#6b7280;">{{ $application->jobPosting->title }}</td>
            </tr>
            <tr>
                <td style="padding:5px 0;font-weight:600;">Department</td>
                <td style="padding:5px 0;color:#6b7280;">{{ $application->jobPosting->department }}</td>
            </tr>
            <tr>
                <td style="padding:5px 0;font-weight:600;">Type</td>
                <td style="padding:5px 0;color:#6b7280;">{{ $application->jobPosting->type->value }}</td>
            </tr>
        </table>
    </div>

    <p style="font-size:0.9rem;color:#374151;line-height:1.6;">
        If your profile matches what we are looking for, we will be in touch to schedule a conversation.
        We appreciate your interest in joining the Rare Input team.
    </p>

    <p style="margin-top:2rem;font-size:0.9rem;color:#374151;">
        Warm regards,<br>
        <strong>The Rare Input Careers Team</strong>
    </p>
    <p style="margin-top:2rem;font-size:0.8rem;color:#9ca3af;">This is an automated acknowledgement. Please do not reply to this email.</p>
</body>
</html>
