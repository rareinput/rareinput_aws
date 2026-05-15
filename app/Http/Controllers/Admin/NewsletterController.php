<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendNewsletterJob;
use App\Models\Newsletter;
use App\Models\Subscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsletterController extends Controller
{
    public function index(): View
    {
        $newsletters = Newsletter::latest()->paginate(20);
        $subscriberCount = Subscriber::where('status', 'active')->count();

        return view('admin.newsletters.index', compact('newsletters', 'subscriberCount'));
    }

    public function create(): View
    {
        return view('admin.newsletters.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'schedule_type' => ['required', 'in:draft,now,scheduled'],
            'scheduled_at' => ['required_if:schedule_type,scheduled', 'nullable', 'date', 'after:now'],
        ]);

        $newsletter = Newsletter::create([
            'subject' => $data['subject'],
            'body' => $data['body'],
            'status' => 'draft',
            'scheduled_at' => $data['schedule_type'] === 'scheduled' ? $data['scheduled_at'] : null,
        ]);

        if ($data['schedule_type'] === 'now') {
            SendNewsletterJob::dispatch($newsletter);
            $newsletter->update(['status' => 'sending']);

            return redirect()->route('admin.newsletters.index')->with('success', 'Newsletter is being sent now.');
        }

        if ($data['schedule_type'] === 'scheduled') {
            $newsletter->update(['status' => 'scheduled']);

            return redirect()->route('admin.newsletters.index')->with('success', 'Newsletter scheduled for '.$newsletter->scheduled_at->format('M d, Y g:i A').'.');
        }

        return redirect()->route('admin.newsletters.index')->with('success', 'Newsletter saved as draft.');
    }

    public function show(Newsletter $newsletter): View
    {
        $events = $newsletter->events()->with('subscriber')->latest()->get();

        $stats = [
            'sent' => $newsletter->sent_count,
            'opens' => $events->where('type', 'open')->unique('subscriber_id')->count(),
            'clicks' => $events->where('type', 'click')->count(),
            'unique_clicks' => $events->where('type', 'click')->unique('subscriber_id')->count(),
            'unsubscribes' => $events->where('type', 'unsubscribe')->count(),
        ];

        $stats['open_rate'] = $stats['sent'] > 0 ? round(($stats['opens'] / $stats['sent']) * 100, 1) : 0;
        $stats['click_rate'] = $stats['sent'] > 0 ? round(($stats['unique_clicks'] / $stats['sent']) * 100, 1) : 0;

        $topLinks = $events->where('type', 'click')
            ->groupBy('url')
            ->map(fn ($group) => ['url' => $group->first()->url, 'count' => $group->count()])
            ->sortByDesc('count')
            ->values()
            ->take(10);

        return view('admin.newsletters.show', compact('newsletter', 'stats', 'topLinks', 'events'));
    }

    public function edit(Newsletter $newsletter): View
    {
        return view('admin.newsletters.edit', compact('newsletter'));
    }

    public function update(Request $request, Newsletter $newsletter): RedirectResponse
    {
        if ($newsletter->isSent()) {
            return back()->with('error', 'Sent newsletters cannot be edited.');
        }

        $data = $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'schedule_type' => ['required', 'in:draft,now,scheduled'],
            'scheduled_at' => ['required_if:schedule_type,scheduled', 'nullable', 'date', 'after:now'],
        ]);

        $newsletter->update([
            'subject' => $data['subject'],
            'body' => $data['body'],
            'scheduled_at' => $data['schedule_type'] === 'scheduled' ? $data['scheduled_at'] : null,
        ]);

        if ($data['schedule_type'] === 'now') {
            SendNewsletterJob::dispatch($newsletter);
            $newsletter->update(['status' => 'sending']);

            return redirect()->route('admin.newsletters.index')->with('success', 'Newsletter is being sent now.');
        }

        if ($data['schedule_type'] === 'scheduled') {
            $newsletter->update(['status' => 'scheduled']);

            return redirect()->route('admin.newsletters.index')->with('success', 'Newsletter scheduled for '.$newsletter->scheduled_at->format('M d, Y g:i A').'.');
        }

        $newsletter->update(['status' => 'draft']);

        return redirect()->route('admin.newsletters.index')->with('success', 'Newsletter saved as draft.');
    }

    public function destroy(Newsletter $newsletter): RedirectResponse
    {
        $newsletter->delete();

        return back()->with('success', 'Newsletter deleted.');
    }
}
