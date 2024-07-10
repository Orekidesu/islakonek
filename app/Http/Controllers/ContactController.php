<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateContactCreateRequest;
use App\Http\Requests\ValidateContactUpdateRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Island;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{


    public function index()
    {

        return view('pages.contacts.index');
    }

    public function create()
    {
        $islands = Island::all();
        return view('pages.contacts.partials.create-contact-form', compact('islands'));
    }


    public function store(ValidateContactCreateRequest $request)
    {

        Contact::create($request->validated());
        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }

    public function show(Contact $contact)
    {
        return view('pages.contacts.partials.show-contact', compact('contact'));
    }


    public function edit(Contact $contact)
    {
        $islands = Island::all();
        return response()->json([
            'contact' => $contact,
            'islands' => $islands
        ]);
    }

    public function update(ValidateContactUpdateRequest $request, Contact $contact)
    {

        // Log::debug('Contact ID in controller:', ['contact_id' => $contact->id]);
        $contact->update($request->validated());
        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
