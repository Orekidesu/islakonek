<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateContactCreateRequest;
use App\Http\Requests\ValidateContactUpdateRequest;
use App\Models\Contact;
use App\Models\Island;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index()
    {
        try {
            return view('pages.contacts.index');
        } catch (\Exception $e) {
            Log::error('Error in index method: ' . $e->getMessage());
            return redirect()->route('contacts.index')->with('error', 'An error occurred while loading the contacts.');
        }
    }

    public function create()
    {
        try {
            $islands = Island::all();
            return view('pages.contacts.partials.create-contact-form', compact('islands'));
        } catch (\Exception $e) {
            Log::error('Error in create method: ' . $e->getMessage());
            return redirect()->route('contacts.index')->with('error', 'An error occurred while loading the create contact form.');
        }
    }

    public function store(ValidateContactCreateRequest $request)
    {
        try {
            Contact::create($request->validated());
            return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
        } catch (\Exception $e) {
            Log::error('Error in store method: ' . $e->getMessage());
            return redirect()->route('contacts.index')->with('error', 'An error occurred while creating the contact.');
        }
    }

    public function show(Contact $contact)
    {
        try {
            return view('pages.contacts.partials.show-contact', compact('contact'));
        } catch (\Exception $e) {
            Log::error('Error in show method: ' . $e->getMessage());
            return redirect()->route('contacts.index')->with('error', 'An error occurred while showing the contact.');
        }
    }

    public function edit(Contact $contact)
    {
        try {
            $islands = Island::all();
            return response()->json([
                'contact' => $contact,
                'islands' => $islands
            ]);
        } catch (\Exception $e) {
            Log::error('Error in edit method: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while editing the contact.'], 500);
        }
    }

    public function update(ValidateContactUpdateRequest $request, Contact $contact)
    {
        try {
            $contact->update($request->validated());
            return redirect()->route('contacts.index')->with('success', 'Contact updated successfully');
        } catch (\Exception $e) {
            Log::error('Error in update method: ' . $e->getMessage());
            return redirect()->route('contacts.index')->with('error', 'An error occurred while updating the contact.');
        }
    }

    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();
            return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error in destroy method: ' . $e->getMessage());
            return redirect()->route('contacts.index')->with('error', 'An error occurred while deleting the contact.');
        }
    }
}
