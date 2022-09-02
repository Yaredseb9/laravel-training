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
        $contacts = Contact::orderBy('first_name', 'asc')->where(function ($query) {
            if ($compony_id = request('company_id')) {
                $query->where('company_id', $compony_id);
            }
        })->paginate(10);
        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create()
    {
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Company', '');
        return view('contacts.create', compact('companies'));
    }
    public function store(Request $request)
    {
        dd($request);
    }
    public function show($id)
    {
        $contact =  Contact::find($id);
        return view('contacts.show', compact('contact'));
    }
}
