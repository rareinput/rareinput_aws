<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSequenceRequest;
use App\Http\Requests\Admin\UpdateSequenceRequest;
use App\Models\Sequence;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SequenceController extends Controller
{
    public function index(): View
    {
        $sequences = Sequence::withCount(['emails', 'subscriberSequences'])->latest()->paginate(20);

        return view('admin.sequences.index', compact('sequences'));
    }

    public function create(): View
    {
        return view('admin.sequences.create');
    }

    public function store(StoreSequenceRequest $request): RedirectResponse
    {
        $sequence = Sequence::create($request->only('name', 'description', 'interval_days'));

        foreach ($request->emails as $index => $emailData) {
            $sequence->emails()->create([
                'sort_order' => $index + 1,
                'subject'    => $emailData['subject'],
                'body'       => $emailData['body'],
            ]);
        }

        return redirect()->route('admin.sequences.index')->with('success', 'Sequence created.');
    }

    public function show(Sequence $sequence): View
    {
        $sequence->load(['emails', 'subscriberSequences.subscriber']);

        return view('admin.sequences.show', compact('sequence'));
    }

    public function edit(Sequence $sequence): View
    {
        $sequence->load('emails');

        return view('admin.sequences.edit', compact('sequence'));
    }

    public function update(UpdateSequenceRequest $request, Sequence $sequence): RedirectResponse
    {
        $sequence->update([
            'name'          => $request->name,
            'description'   => $request->description,
            'interval_days' => $request->interval_days,
            'is_active'     => $request->boolean('is_active'),
        ]);

        $existingIds = [];

        foreach ($request->emails as $index => $emailData) {
            if (! empty($emailData['id'])) {
                $email = $sequence->emails()->find($emailData['id']);
                if ($email) {
                    $email->update([
                        'sort_order' => $index + 1,
                        'subject'    => $emailData['subject'],
                        'body'       => $emailData['body'],
                    ]);
                    $existingIds[] = $email->id;
                }
            } else {
                $email = $sequence->emails()->create([
                    'sort_order' => $index + 1,
                    'subject'    => $emailData['subject'],
                    'body'       => $emailData['body'],
                ]);
                $existingIds[] = $email->id;
            }
        }

        $sequence->emails()->whereNotIn('id', $existingIds)->delete();

        return redirect()->route('admin.sequences.index')->with('success', 'Sequence updated.');
    }

    public function destroy(Sequence $sequence): RedirectResponse
    {
        $sequence->delete();

        return redirect()->route('admin.sequences.index')->with('success', 'Sequence deleted.');
    }
}
