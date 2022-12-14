<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContactRequest;


class ContactController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth')->except('index');
    // }

    public function index()
    {
        // $companies = Company::select('id','name')->prepend('','All Company')->get();
        $user = Auth::user();
        $companies = $this->userCompanies();
        // Company::userCompanies();

        // DB::enableQueryLog();
        $contacts = $user->contacts()->with('company')->latestFirst()->paginate(10);
        // dd(DB::getQueryLog());

        // dd($contacts);
        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create()
    {
        // $user = Auth::user();
        $contact = new Contact();
        $companies = $this->userCompanies();

        return view('contacts.create', compact('companies', 'contact'));
    }
    public function store(ContactRequest $request)
    {
        $request->user()->contacts()->create($request->except('_token', '_method') + ['user_id' => Auth::id()]);
        
        // Contact::create($request->except('_token', '_method') + ['user_id' => Auth::id()]);

        // $contact = new Contact();
        // $contact->first_name = $request->first_name;
        // $contact->last_name = $request->last_name;
        // $contact->email = $request->email;
        // $contact->address = $request->address;
        // $contact->company_id = $request->company_id;

        // $contact->save();

        return redirect()->route('contacts.index')->with('message', 'Contact has been added successfully.');
    }
    public function show(Contact $contact)
    {
        // $user = Auth::user();
        // $contact =  $user->contacts()->findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        // $contact =  $user->contacts()->findOrFail($id);
        $companies = $this->userCompanies();
        return view('contacts.edit', compact('contact', 'companies'));
    }

    public function update(Contact $contact, ContactRequest $request)
    {
        // $contact = Contact::findOrFail($id);

        $contact->update($request->except('_token', '_method') + ['user_id' => Auth::id()]);

        return redirect()->route('contacts.index')->with('message', 'Contact has been updated successfully');
    }

    public function destroy(Contact $contact)
    {
        // Contact::destroy($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('message', 'Contact has been deleted successfully');
    }

    protected function userCompanies()
    {
        $user = Auth::user();
        return $user->companies()->orderBy('name')->pluck('name', 'id')->prepend('All Company', '');
    }
    protected function validationRules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'company_id' => 'required|exists:companies,id'
        ];
    }
}
