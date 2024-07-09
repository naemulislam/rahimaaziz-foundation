<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $data['messages'] = Contact::latest()->get();
        return view("backend.dashboard.contact.inbox",$data);
    }

    public function show(Contact $contact)
    {
        $contact->update([
            'status' => true
        ]);
        return view("backend.dashboard.contact.dtls-contact",compact('contact'));
    }
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('success', 'Message is deleted successfully!');
    }

}
