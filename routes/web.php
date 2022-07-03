<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Livewire\Company\Company;
use App\Http\Livewire\Employee\Employee;
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
    return view('auth.login');
});

Route::controller(LoginController::class)->group(function(){
    Route::get('login', 'showLoginForm')->name('login');
    Route::post('login', 'login');
    Route::post('logout', 'logout')->name('logout');
});

Route::get('/company',Company::class)->middleware('auth')->name('company');
Route::get('/employee',Employee::class)->middleware('auth')->name('employee');
