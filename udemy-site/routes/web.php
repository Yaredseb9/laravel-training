<?php

use App\Http\Controllers\ContactController;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/contacts',function(){
//     return view('contacts.index');
// })->name('contacts.index');

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');

// Route::get('/contacts/create',function(){
//     return view('contacts.create');
// })->name('contacts.create');

// Route::get('/contacts/{id}', function($id){
//     $contact =  Contact::find($id);
//     return view('contacts.show', compact('contact'));
// })->name('contacts.show');
