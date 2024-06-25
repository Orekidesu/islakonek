<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Island;

class ContactController extends Controller
{
    public function index()
    {
        // $contacts = Contact::with('island')->get();
        $contacts = Contact::with('island')->simplePaginate(5);
        $islands = Island::all();

        return view('pages.contacts.index', compact('contacts', 'islands'));
    }

    public function create()
    {
        $islands = Island::all();
        return view('pages.contacts.partials.create-contact-form', compact('islands'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:contacts',
    //         'phone' => 'required',
    //         'island_id' => 'required|exists:islands,id',

    //     ]);

    //     Contact::create($request->all());
    //     return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts',
            'phone' => 'required',
            'island_id' => 'required|exists:islands,id',
            'notes' => 'nullable',
        ]);

        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'island_id' => $request->input('island_id'),
            'notes' => $request->input('notes', null),
        ]);

        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }

    public function show(Contact $contact)
    {
        return view('pages.contacts.partials.show-contact', compact('contact'));
    }

    // public function edit(Contact $contact)
    // {
    //     $islands = Island::all();
    //     return view('pages.contacts.partials.update-contact-form', compact('contact'));
    // }

    public function edit(Contact $contact)
    {
        $islands = Island::all();
        return response()->json([
            'contact' => $contact,
            'islands' => $islands
        ]);
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
            'phone' => 'required',
            'island_id' => 'required',
        ]);

        $contact->update($request->all());
        // return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }


    public function search(Request $request)
    {
        $query = $request->input('query');
        $contacts = Contact::with('island')
            ->where('name', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->paginate(5); // Paginate the results, 10 items per page

        return view('contacts.index', compact('contacts'));
    }
}
