<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Students;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
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

Route::get('/login',Login::class)->middleware(['guest'])->middleware(['XFrame'])->name('login');
Route::get('/register',Register::class)->middleware(['guest'])->middleware(['XFrame'])->name('Register');
Route::get('/admin',Students::class)->middleware(['auth'])->middleware(['XFrame'])->middleware(['isadmin']);
