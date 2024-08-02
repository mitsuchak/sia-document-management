<?php

use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\UserController;

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

//Route::get('/home', function () {
//    return view('index');
//})->middleware('auth')->name('home');

//Route::get('/test', function () {
//    return view('test');
//});

require __DIR__ . '/auth.php';

Route::group(['prefix' => '/', 'middleware'=>'auth'], function () {
    Route::get('', [RoutingController::class, 'index'])->name('root');
    // Route::get('/home', fn()=>view('index'))->name('home');
    // Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    // Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    // Route::get('{any}', [RoutingController::class, 'root'])->name('any');

    Route::get('/home', [DocumentController::class, 'index'])->name('home');

    Route::get('documents/index', [DocumentController::class, 'index'])->name('document.index');
    Route::get('documents/create', [DocumentController::class, 'create'])->name('document.create');
    Route::post('documents/store', [DocumentController::class, 'store'])->name('document.store');
    Route::get('documents/edit/{id}', [DocumentController::class, 'edit'])->name('document.edit');
    Route::post('documents/update/{id}', [DocumentController::class, 'update'])->name('document.update');
    Route::get('documents/delete/{id}', [DocumentController::class, 'destroy'])->name('document.delete');
    Route::get('/documents/{id}/download', [DocumentController::class, 'download'])->name('documents.download');

   
    Route::get('/users',[UserController::class, 'index'])->name('users.index');
    Route::get('/users/create',[UserController::class, 'create'])->name('users.create');
    Route::post('/users/store',[UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}',[UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/update/{id}',[UserController::class, 'update'])->name('users.update');
    Route::get('/users/delete/{id}',[UserController::class, 'delete'])->name('users.delete');

    Route::get('/user-details', [UserController::class, 'userDetails'])->name('user.details');

    Route::get('/requested-users',[UserController::class, 'requestedUsers'])->name('requested.user');
    Route::get('/requested-users/{id}', [UserController::class, 'editUserPermission'])->name('requested.user.edit');
    Route::post('/requested-users/{id}', [UserController::class, 'updateUserPermission'])->name('requested.user.update');
});
