<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Qrs;
use Illuminate\Support\Facades\Storage;
use Zxing\QrReader;

class UploadQrController extends Controller
{
    public function upload(Request $request)
    {
        // return $request;

        $validated = $request->validate([
            'upload_file' => 'required|mimes:jpeg,jpg,png,pdf,PNG',
        ]);

        // if($validated){

        // }

        $upload_file = $request->upload_file;

        return $this->readerQR($upload_file);
    }

    private function readerQR($upload_file)
    {
        $filename = time();


        try {
            $file_extension = strtolower($upload_file->getClientOriginalExtension());

            if ($file_extension == ('png' || 'jpeg' || 'png')) {

                $file_filename = $filename . '.' . $file_extension;

                $upload_file->storeAs('public/qr/images', $file_filename);

                $file_image_path = Storage::disk('local')->path("/public/qr/images/" . $file_filename);

                $qrcode = new QrReader($file_image_path);
                $content = $qrcode->text();

                $qrs = new Qrs();
                $qrs->fileName = $file_filename;
                $qrs->fileExtension = $file_extension;
                $qrs->content = $content;
                $qrs->status = "Submitted";

                $qrs->save();

                return response()->json([
                    'status' => 'success',
                    'message' => 'QR file upload successfully',
                    'data' => [
                        'content' => $content
                    ]
                ], 200);
            } else if ($file_extension == ('pdf')) {

                $file_filename = $filename . '.' . $file_extension;
                $new_file_filename = $filename . '.png';
                $upload_file->storeAs('public/qr/pdfs', $file_filename);

                $file_pdf_path = Storage::disk('local')->path("public/qr/pdfs/" . $file_filename);
                $file_image_path = Storage::disk('local')->path("public/qr/images/" . $new_file_filename);

                // create Imagick object
                $imagick = new Imagick();
                // Reads image from PDF
                $imagick->readImage($file_pdf_path);
                // Writes an image
                $imagick->writeImages($file_image_path, false);

                $qrcode = new QrReader($file_image_path);
                $content = $qrcode->text();


                $qrs = new Qrs();
                $qrs->fileName = $file_filename;
                $qrs->fileExtension = $file_extension;
                $qrs->content = $content;
                $qrs->status = "Submitted";


                return response()->json([
                    'status' => 'success',
                    'message' => 'QR file upload successfully',
                    'data' => [
                        'content' => $content
                    ]
                ], 200);
            } else {

                return response()->json([
                    'status' => 'failure',
                    'message' => 'File not a valid qr file',
                    'data' => null
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failure',
                'message' => $e->getMessage(),
                'data' => null
            ], 200);
        }
    }
}