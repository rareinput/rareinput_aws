<!DOCTYPE html>
<html>
<body style="font-family:sans-serif;color:#1a1a1a;padding:32px;max-width:600px;margin:0 auto;">
    <h2 style="font-size:1.25rem;font-weight:700;margin-bottom:1.5rem;">New Lead from Website</h2>
    <table style="width:100%;border-collapse:collapse;font-size:0.9rem;">
        <tr style="border-bottom:1px solid #e5e7eb;">
            <td style="padding:10px 0;font-weight:600;color:#374151;width:40%;">Name</td>
            <td style="padding:10px 0;color:#6b7280;">{{ $contact->name }}</td>
        </tr>
        <tr style="border-bottom:1px solid #e5e7eb;">
            <td style="padding:10px 0;font-weight:600;color:#374151;">Email</td>
            <td style="padding:10px 0;color:#6b7280;">{{ $contact->email }}</td>
        </tr>
        @if($contact->subject)
        <tr style="border-bottom:1px solid #e5e7eb;">
            <td style="padding:10px 0;font-weight:600;color:#374151;">Subject</td>
            <td style="padding:10px 0;color:#6b7280;">{{ $contact->subject }}</td>
        </tr>
        @endif
        <tr style="border-bottom:1px solid #e5e7eb;">
            <td style="padding:10px 0;font-weight:600;color:#374151;">Received</td>
            <td style="padding:10px 0;color:#6b7280;">{{ $contact->created_at->format('d M Y, H:i') }}</td>
        </tr>
    </table>
    <div style="margin-top:1.5rem;padding:1rem;background:#f9fafb;border-radius:8px;font-size:0.9rem;color:#374151;line-height:1.6;">
        <p style="font-weight:600;margin:0 0 0.5rem;">Message:</p>
        <p style="margin:0;white-space:pre-wrap;">{{ $contact->message }}</p>
    </div>
    <p style="margin-top:2rem;font-size:0.8rem;color:#9ca3af;">This is an automated notification from the Rare Input website.</p>
</body>
</html>
