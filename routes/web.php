<?php

use App\Http\Controllers\CompanyController;
use App\Http\Middleware\IsAdmin;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([IsAdmin::class])->group(function () {

    Route::prefix('companies')->group(function () {
        Route::resource('/', CompanyController::class,['names'=> [
            'create'=>'companies.create',
            'store'=>'companies.store',
        ]]);
        Route::get('/attach', [CompanyController::class, 'attach'])->name('companies.attach');
        Route::put('/attachment', [CompanyController::class, 'attachment'])->name('companies.attachment');
    });

    Route::prefix('users')->group(function () {
        Route::resource('/', App\Http\Controllers\UserController::class,['names'=> [
            'create'=>'users.create',
            'store'=>'users.store',
        ]]);
    });

});


