<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactAcknowledgement;
use App\Mail\NewLeadNotification;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(): View
    {
        return view('contact');
    }

    public function store(StoreContactRequest $request): RedirectResponse
    {
        $contact = Contact::create($request->validated());

        Mail::to(config('contact.admin_email'))->send(new NewLeadNotification($contact));
        Mail::to($contact->email)->send(new ContactAcknowledgement($contact));

        return redirect()->route('contact')->with('success', 'Thanks! We\'ll be in touch soon.');
    }
}
