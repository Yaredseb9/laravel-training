<?php

use App\Models\Contact;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Settings\ProfileController;

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
Route::middleware('auth')->group(function(){
    // Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    // Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
    // Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    // // Route::get('/contacts/{contact:first_name}', [ContactController::class, 'show'])->name('contacts.show');
    // Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    // Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    // Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
    // Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    // Route::resource('/contacts', ContactController::class);

    // Route::resource('/contacts', ContactController::class)->names([
    //     'index'=>'contacts.all',
    //     'show'=>'contacts.view'
    // ])->parameters([
    //     'contacts'=>'kontak'
    // ]);
    // Route::resource('/contacts', ContactController::class);
    
    Route::resources([
        '/contacts' => ContactController::class,
        '/companies' => CompanyController::class
    ]);

    // Route::resource('/companies.contacts', ContactController::class);
    // Route::resource('/contacts',ContactController::class)->except(['delete','show']);

    Route::get('/setting/profile', [ProfileController::class, 'edit'])->name('setting.profile.edit');
    Route::put('/setting/profile', [ProfileController::class, 'update'])->name('setting.profile.update');
});
// Route::get('/contacts/create',function(){
//     return view('contacts.create');
// })->name('contacts.create');

// Route::get('/contacts/{id}', function($id){
//     $contact =  Contact::find($id);
//     return view('contacts.show', compact('contact'));
// })->name('contacts.show');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
