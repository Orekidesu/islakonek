<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateContactCreateRequest;
use App\Http\Requests\ValidateContactUpdateRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Island;

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

    public function store(ValidateContactCreateRequest $request)
    {

        Contact::create($request->validated());
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

    public function update(ValidateContactUpdateRequest $request, Contact $contact)
    {
        // dd('asdasads');

        $contact->update($request->validated());
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
