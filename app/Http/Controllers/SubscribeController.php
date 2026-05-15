<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Mail\WelcomeSubscriberMail;
use App\Models\NewsletterEvent;
use App\Models\Subscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class SubscribeController extends Controller
{
    public function store(SubscribeRequest $request): RedirectResponse
    {
        $subscriber = Subscriber::firstOrCreate(
            ['email' => $request->email],
            ['name' => $request->name],
        );

        if ($subscriber->wasRecentlyCreated) {
            Mail::to($subscriber->email)->send(new WelcomeSubscriberMail($subscriber));
        }

        session(['subscriber_id' => $subscriber->id]);

        return redirect()->route('subscribe.thankyou');
    }

    public function thankyou(Request $request): View|RedirectResponse
    {
        $subscriber = Subscriber::find(session('subscriber_id'));

        if (! $subscriber) {
            return redirect()->route('blog.index');
        }

        $named = $request->query('named', false);

        return view('subscribe.thankyou', compact('subscriber', 'named'));
    }

    public function saveName(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $subscriber = Subscriber::find(session('subscriber_id'));

        if ($subscriber) {
            $subscriber->update(['name' => $request->name]);
        }

        return redirect()->route('subscribe.thankyou', ['named' => '1']);
    }

    public function unsubscribe(Request $request, string $token): View
    {
        $subscriber = Subscriber::where('unsubscribe_token', $token)->firstOrFail();

        $subscriber->update([
            'status' => 'unsubscribed',
            'unsubscribed_at' => now(),
        ]);

        if ($request->query('nl')) {
            NewsletterEvent::firstOrCreate([
                'newsletter_id' => (int) $request->query('nl'),
                'subscriber_id' => $subscriber->id,
                'type' => 'unsubscribe',
            ]);
        }

        return view('unsubscribe');
    }
}
