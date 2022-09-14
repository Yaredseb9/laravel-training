<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // $companies = Company::select('id','name')->prepend('','All Company')->get();
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Company', '');
        $contacts = Contact::latestFirst()->paginate(10);


        // dd($contacts);
        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create()
    {
        $contact = new Contact();
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Company', '');
        return view('contacts.create', compact('companies', 'contact'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'company_id' => 'required|exists:companies,id'
        ]);


        Contact::create($request->except('_token', '_method'));

        // $contact = new Contact();
        // $contact->first_name = $request->first_name;
        // $contact->last_name = $request->last_name;
        // $contact->email = $request->email;
        // $contact->address = $request->address;
        // $contact->company_id = $request->company_id;

        // $contact->save();

        return redirect()->route('contacts.index')->with('message', 'Contact has been added successfully.');
    }
    public function show($id)
    {
        $contact =  Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    public function edit($id)
    {
        $contact =  Contact::findOrFail($id);
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Company', '');

        return view('contacts.edit', compact('contact', 'companies'));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'company_id' => 'required|exists:companies,id'
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($request->except('_token', '_method'));

        return redirect()->route('contacts.index')->with('message', 'Contact has been updated successfully');
    }

    public function destroy($id)
    {
        Contact::destroy($id);

        return redirect()->route('contacts.index')->with('message', 'Contact has been deleted successfully');
    }
}
