<!DOCTYPE html>
<html>
<body style="font-family:sans-serif;color:#1a1a1a;padding:32px;max-width:600px;margin:0 auto;">
    <h2 style="font-size:1.25rem;font-weight:700;margin-bottom:1.5rem;">New Job Application Received</h2>
    <table style="width:100%;border-collapse:collapse;font-size:0.9rem;">
        <tr style="border-bottom:1px solid #e5e7eb;">
            <td style="padding:10px 0;font-weight:600;color:#374151;width:40%;">Applicant</td>
            <td style="padding:10px 0;color:#6b7280;">{{ $application->name }}</td>
        </tr>
        <tr style="border-bottom:1px solid #e5e7eb;">
            <td style="padding:10px 0;font-weight:600;color:#374151;">Position</td>
            <td style="padding:10px 0;color:#6b7280;">{{ $application->jobPosting->title }}</td>
        </tr>
        <tr style="border-bottom:1px solid #e5e7eb;">
            <td style="padding:10px 0;font-weight:600;color:#374151;">Email</td>
            <td style="padding:10px 0;color:#6b7280;">{{ $application->email }}</td>
        </tr>
        @if($application->work_email)
        <tr style="border-bottom:1px solid #e5e7eb;">
            <td style="padding:10px 0;font-weight:600;color:#374151;">Work Email</td>
            <td style="padding:10px 0;color:#6b7280;">{{ $application->work_email }}</td>
        </tr>
        @endif
        <tr style="border-bottom:1px solid #e5e7eb;">
            <td style="padding:10px 0;font-weight:600;color:#374151;">Phone</td>
            <td style="padding:10px 0;color:#6b7280;">{{ $application->phone }}</td>
        </tr>
        <tr style="border-bottom:1px solid #e5e7eb;">
            <td style="padding:10px 0;font-weight:600;color:#374151;">Education</td>
            <td style="padding:10px 0;color:#6b7280;">{{ $application->highest_education }}, {{ $application->university }}</td>
        </tr>
        @if($application->experience)
        <tr style="border-bottom:1px solid #e5e7eb;">
            <td style="padding:10px 0;font-weight:600;color:#374151;">Experience</td>
            <td style="padding:10px 0;color:#6b7280;">{{ $application->experience }}</td>
        </tr>
        @endif
        @if($application->linkedin_url)
        <tr style="border-bottom:1px solid #e5e7eb;">
            <td style="padding:10px 0;font-weight:600;color:#374151;">LinkedIn</td>
            <td style="padding:10px 0;"><a href="{{ $application->linkedin_url }}" style="color:#1a1a2e;">{{ $application->linkedin_url }}</a></td>
        </tr>
        @endif
        @if($application->portfolio_urls)
        <tr style="border-bottom:1px solid #e5e7eb;">
            <td style="padding:10px 0;font-weight:600;color:#374151;">Portfolio URLs</td>
            <td style="padding:10px 0;">
                @foreach($application->portfolio_urls as $url)
                    <a href="{{ $url }}" style="color:#1a1a2e;display:block;">{{ $url }}</a>
                @endforeach
            </td>
        </tr>
        @endif
        <tr>
            <td style="padding:10px 0;font-weight:600;color:#374151;">Applied</td>
            <td style="padding:10px 0;color:#6b7280;">{{ $application->created_at->format('d M Y, H:i') }}</td>
        </tr>
    </table>

    <div style="margin-top:1.5rem;padding:1rem;background:#f9fafb;border-radius:8px;font-size:0.9rem;color:#374151;line-height:1.6;">
        <p style="font-weight:600;margin:0 0 0.5rem;">Cover Note:</p>
        <p style="margin:0;white-space:pre-wrap;color:#6b7280;">{{ $application->cover_note }}</p>
    </div>

    <p style="margin-top:2rem;">
        <a href="{{ route('admin.applications.show', $application) }}"
           style="display:inline-block;background:#1a1a2e;color:#fff;padding:0.75rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.875rem;">
            View Full Application &amp; Download Resume
        </a>
    </p>
    <p style="margin-top:2rem;font-size:0.8rem;color:#9ca3af;">This is an automated notification from the Rare Input careers system.</p>
</body>
</html>
