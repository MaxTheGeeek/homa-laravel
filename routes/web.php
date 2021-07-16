<?php

use App\Http\Controllers\Admin\ConversationController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PdfController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [\App\Http\Controllers\App\HomeController::class, 'index'])->name('app.home');


Auth::routes();



Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware('auth')->group(function () {

    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('setting',[SettingController::class, 'index'])->name('setting');

    /* **************    PDF Routing*/

    Route::prefix('pdf')->name('pdf.')->group(function () {
    Route::get('board',[PdfController::class, 'index'])->name('board');
    Route::get('create',[PdfController::class, 'create'])->name('create');
    Route::post('store',[PdfController::class, 'store'])->name('store');
    });

/* *************    User Routing*/

    Route::prefix('user')->name('user.')->group(function () {

    Route::get('list',[UserController::class, 'index'])->name('list'); //    user list

    Route::get('newUser',[UserController::class, 'create'])->name('newUser'); //    Add new user

    Route::post('store',[UserController::class, 'store'])->name('store'); //    Save new user

    Route::post('setrole',[UserController::class, 'setRoles'])->name('setrole'); //   Set user role

    Route::post('setStatus',[UserController::class, 'status'])->name('setStatus'); // active or deactivated user
    });


/* ************   Tciket Routing*/

    Route::prefix('ticket')->name('ticket.')->group(function () {

        Route::get('create',[TicketController::class, 'create'])->name('create');

        Route::post('store',[TicketController::class, 'store'])->name('store');

        Route::get('list',[TicketController::class, 'index'])->name('list');

        Route::get('show/{ticket}',[TicketController::class, 'show'])->name('show');

    });

    Route::prefix('conversation')->name('conversation.')->group(function (){
        Route::post('store',[ConversationController::class ,'store'])->name('store');
    });


});


