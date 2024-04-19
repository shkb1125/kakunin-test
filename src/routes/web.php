<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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

// お問い合わせフォーム入力ページ:/
// お問い合わせフォーム確認ページ:/confirm
// サンクスページ:/thanks
// 管理画面:/admin
// ユーザ登録ページ:/register
// ログインページ:/login

// 問い合わせフォーム入力ページ
Route::get('/', [ContactController::class, 'index']);

// 問い合わせフォーム確認ページ
Route::post('/confirm', [ContactController::class, 'confirm']);

// 問い合わせフォーム登録→サンクスページの表示
Route::post('/thanks', [ContactController::class, 'store']);

// 管理画面
Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin', [AdminController::class, 'search']);

// ユーザ登録ページ
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

// ログインページ
Route::get('login', [LoginController::class, 'login']);