<?php

use App\Http\Controllers\Admin\DocumentViewerController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use Zxing\QrReader;
use ImalH\PDFLib\PDFLib;
use Intervention\Image\Image;

include 'WideImage/lib/WideImage.php';

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


Route::get('/', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/upload', [HomeController::class, 'upload']);
Route::get('/home', [HomeController::class, 'home']);
Route::get('/document-viewer/{document_id}', [DocumentViewerController::class, 'viewDocument']);

