<?php

namespace App\Http\Controllers\Admin;

use App\Enums\SubscriberStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSubscriberRequest;
use App\Http\Requests\Admin\UpdateSubscriberRequest;
use App\Models\Sequence;
use App\Models\Subscriber;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubscriberController extends Controller
{
    public function index(Request $request): View
    {
        $subscribers = Subscriber::query()
            ->with('tags')
            ->when($request->filled('tag'), fn ($q) => $q->whereHas('tags', fn ($q) => $q->where('tags.id', $request->tag)))
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->status))
            ->latest()
            ->paginate(30)
            ->withQueryString();

        $tags     = Tag::orderBy('name')->get();
        $statuses = SubscriberStatus::cases();

        return view('admin.subscribers.index', compact('subscribers', 'tags', 'statuses'));
    }

    public function create(): View
    {
        $tags      = Tag::orderBy('name')->get();
        $sequences = Sequence::where('is_active', true)->orderBy('name')->get();

        return view('admin.subscribers.create', compact('tags', 'sequences'));
    }

    public function store(StoreSubscriberRequest $request): RedirectResponse
    {
        $subscriber = Subscriber::create($request->only('email', 'name'));

        if ($request->filled('tags')) {
            $subscriber->tags()->sync($request->tags);
        }

        if ($request->filled('sequence_id')) {
            $subscriber->subscriberSequences()->create([
                'sequence_id' => $request->sequence_id,
                'started_at'  => now(),
            ]);
        }

        return redirect()->route('admin.subscribers.index')->with('success', 'Subscriber added.');
    }

    public function edit(Subscriber $subscriber): View
    {
        $tags      = Tag::orderBy('name')->get();
        $sequences = Sequence::where('is_active', true)->orderBy('name')->get();
        $subscriber->load('tags', 'subscriberSequences.sequence');

        return view('admin.subscribers.edit', compact('subscriber', 'tags', 'sequences'));
    }

    public function update(UpdateSubscriberRequest $request, Subscriber $subscriber): RedirectResponse
    {
        $subscriber->update($request->only('email', 'name'));
        $subscriber->tags()->sync($request->tags ?? []);

        return redirect()->route('admin.subscribers.index')->with('success', 'Subscriber updated.');
    }

    public function destroy(Subscriber $subscriber): RedirectResponse
    {
        $subscriber->delete();

        return redirect()->route('admin.subscribers.index')->with('success', 'Subscriber deleted.');
    }
}
