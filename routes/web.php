<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Home\DashboardController;
use App\Http\Controllers\pages\HomePage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

$controller_path = 'App\Http\Controllers';

// Main Page Route

Route::get('/', function () {
  return redirect()->route('auth.login');
});

// Dashboard route

Route::group([
  'namespace' => 'App\Http\Controllers\Home',
  'middleware' => ['auth'],
], function ($router) {
  Route::get('home', [DashboardController::class, 'index'])->name('home');
//  Route::get('getDashboardProjectData', 'ListController@getDashboardProjectData');
//  Route::get('getDashboardTaskData', 'ListController@getDashboardTaskData');
});


//Route::middleware(['auth'])->group(function () {
//  Route::get('/home', [HomePage::class, 'index'])->name('home');
//});


Route::get('/page-2', $controller_path . '\pages\Page2@index')->name('pages-page-2');

// pages
Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');

// authentication
Route::get('/login', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic');
Route::get('/register', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');

//Route::get('/login',[AuthController::class,'login'])->name('auth.login');

/**
 * Auth
 */

Route::get('/login', [LoginController::class, 'getForm'])->name('auth.login');
Route::post('/login', [LoginController::class, 'postForm']);
route::post('logout', [LogoutController::class, 'logout'])->name('logout');



