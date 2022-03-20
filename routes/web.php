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


Route::get('/m', function () {

    // create Imagick object
    $imagick = new Imagick();
    // Reads image from PDF
    $imagick->readImage(public_path('qr-code.pdf'));
    // Writes an image
    $imagick->writeImages(public_path('converted.jpg'), false);

    return;



    // $file_path = public_path('Capture.PNG');


    $pdf_file_path = public_path('qr-code.pdf');
    $image = new Imagick($pdf_file_path);
    return $image;
    // // $folder_path_for_images = public_path('qr_images/');

    $qrcode = new QrReader($image);
    $text = $qrcode->text(); //return decoded text from QR Code
    return $text;



    $file_path = public_path('Capture.PNG');

    $qrcode = new QrReader($file_path);
    $text = $qrcode->text(); //return decoded text from QR Code
    return $text;
    // return view('welcome');
});



// usage inside a laravel route
Route::get('/image', function () {
    $img = Image::make('2.png')->resize(300, 200);
    return $img->response('jpg');
});


// usage inside a laravel route
Route::get('/WideImage', function () {
    WideImage::loadFromFile(public_path('2.png'))->resize(50, 30)->saveToFile(public_path('small.jpg'));
    return "hello";

    $img = Image::make('Capture.PNG')->resize(300, 200);
    return $img->response('jpg');
});