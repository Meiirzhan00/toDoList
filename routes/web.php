<?php

use App\Http\Controllers\HomeController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManageController;
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

//Route::get('/register',[RegisterController::class,'create'])->name('register')->middleware('guest');
//Route::post('/register',[RegisterController::class,'store'])->name('register')->middleware('guest');
//Route::get('/',[SessionController::class,'create'])->middleware('guest')->name('login');
//Route::post('/logout',[SessionController::class,'destroy'])->middleware('auth')->name('logout');


//Route::get('/home', [HomeController::class,'home'])->name('home');

Route::post('/addtask', [HomeController::class,'addTask'])->name('addtask');
Route::get('/details/{id}', [HomeController::class,'details'])->name('details');
Route::get('/details/{id}/edit', [HomeController::class,'edit'])->name('edit');

Route::get('/alltasks',[HomeController::class,'allTask'])->name('taskData');

Route::post('/details/{id}/edit', [HomeController::class,'editTask'])->name('editTask');
Route::get('/details/{id}/delete', [HomeController::class,'deleteTask'])->name('deleteTask');

Route::get('/profile/{full_name}',[ManageController::class,'profilePage'])->name('profile');
Route::get('/settings/{full_name}',[ManageController::class,'settingsPage'])->name('settings');
Route::post('/settings/{full_name}/updateprofile',[ManageController::class,'updateProfile'])->name('updateprofile');
Route::post('/settings/{full_name}/updatepassword',[ManageController::class,'updatePassword'])->name('updatepassword');
Route::post('/settings/{full_name}/updateimage',[ManageController::class,'uploadImage'])->name('uploadimage');


Route::name('user.')->group(function (){

    Route::get('/home',[HomeController::class,'home'])->middleware('auth')->name('home');

    Route::get('/',function (){
        if (Auth::check()){
            return redirect()->route('user.home');
        }
        return view('index.login');

    })->name('login');

    Route::post('/',[LoginController::class,'login']);

    Route::get('/logout',function (){
        Auth::logout();
        return redirect('/');

    })->name('logout');

    Route::get('/register',function (){
        if (Auth::check()){
            return redirect()->route('user.login');
        }
        return view('index.register');
    })->name('register');

    Route::post('/register',[RegisterController::class,'save']);
});


