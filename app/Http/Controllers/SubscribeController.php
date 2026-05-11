<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Mail\WelcomeSubscriberMail;
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
            ['name'  => $request->name],
        );

        if ($subscriber->wasRecentlyCreated) {
            Mail::to($subscriber->email)->send(new WelcomeSubscriberMail($subscriber));
        }

        return back()->with('success', 'You\'re subscribed! Check your inbox for a welcome email.');
    }

    public function unsubscribe(string $token): View
    {
        $subscriber = Subscriber::where('unsubscribe_token', $token)->firstOrFail();

        $subscriber->update([
            'status'          => 'unsubscribed',
            'unsubscribed_at' => now(),
        ]);

        return view('unsubscribe');
    }
}
