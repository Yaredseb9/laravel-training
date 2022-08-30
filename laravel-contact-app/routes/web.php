<?php

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

Route::resources([
    '/contacts' => 'ContactController',
    '/companies' => 'CompanyController',
]);

Auth::routes(['verify' => true]);

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::get('/settings/account', 'Settings\AccountController@index');

Route::get('/settings/profile', 'Settings\ProfileController@edit')->name('settings.profile.edit');
Route::put('/settings/profile', 'Settings\ProfileController@update')->name('settings.profile.update');