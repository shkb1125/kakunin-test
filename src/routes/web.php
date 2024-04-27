<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\CsvDownloadController;

// 問い合わせフォーム入力ページ
Route::get('/', [ContactController::class, 'index']);

// 問い合わせフォーム確認ページ
Route::post('/confirm', [ContactController::class, 'confirm']);

// 問い合わせフォーム登録→サンクスページの表示
Route::post('/thanks', [ContactController::class, 'store']);

// 管理画面
Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin', [AdminController::class, 'search']);

// ユーザー登録画面
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/modal', [ModalController::class, 'modal']);

// エクスポート機能
Route::post('/csv-download', [CsvDownloadController::class, 'csvExport']);