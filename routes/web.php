<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

 Auth::routes();

 Route::redirect('/register','/login');
 Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Auth::routes(['register' => false]);

Route::resource('employees', 'EmployeeController')->middleware('auth');
Route::resource('companies', 'CompanyController')->middleware('auth');
