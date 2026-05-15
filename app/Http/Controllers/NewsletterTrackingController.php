<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Models\NewsletterEvent;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class NewsletterTrackingController extends Controller
{
    public function open(Request $request, int $newsletterId, string $token): Response
    {
        $subscriber = Subscriber::where('unsubscribe_token', $token)->first();

        if ($subscriber && Newsletter::find($newsletterId)) {
            NewsletterEvent::firstOrCreate([
                'newsletter_id' => $newsletterId,
                'subscriber_id' => $subscriber->id,
                'type' => 'open',
            ], [
                'ip' => $request->ip(),
            ]);
        }

        // Return a 1x1 transparent GIF
        $pixel = base64_decode('R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7');

        return response($pixel, 200, [
            'Content-Type' => 'image/gif',
            'Cache-Control' => 'no-store, no-cache, must-revalidate',
            'Pragma' => 'no-cache',
        ]);
    }

    public function click(Request $request, int $newsletterId, string $token): RedirectResponse
    {
        $url = $request->query('url', '/');
        $subscriber = Subscriber::where('unsubscribe_token', $token)->first();

        if ($subscriber && Newsletter::find($newsletterId)) {
            NewsletterEvent::create([
                'newsletter_id' => $newsletterId,
                'subscriber_id' => $subscriber->id,
                'type' => 'click',
                'url' => $url,
                'ip' => $request->ip(),
            ]);
        }

        return redirect()->away($url);
    }
}
