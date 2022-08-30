<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('contacts.index');
    }
    
    public function create(){
        return view('contacts.create');
    }

    public function show($id){
        $contact =  Contact::find($id);
        return view('contacts.show', compact('contact'));
    }
}
