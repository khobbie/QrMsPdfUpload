<?php

namespace App\Http\Livewire\Admin;

use App\Models\Qrs;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Zxing\QrReader;


class UploadQrLivewire extends Component
{

    use WithFileUploads;

    public $upload_file;

    public function save()
    {
        $this->validate([
            'upload_file' => 'mimes:jpeg,jpg,png,pdf,PNG', // 1MB Max
        ]);

        // if ($upload_file->store('photos')) {

        //     session()->flash('success', "File uploaded successfully");
        // } else {
        //     session()->flash('error', "Failed to upload file");
        // }

        return $this->readerQR($this->upload_file);
    }

    public function readerQR($upload_file)
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

                $this->reset();
                $this->upload_file = null;
                session()->flash('success', "QR File uploaded successfully");
                return;
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

                $this->reset();
                $this->upload_file = null;
                session()->flash('success', "QR File uploaded successfully");
                return;
            } else {
                session()->flash('success', "No Image");
                return;
            }
        } catch (\Exception $e) {
            //throw $th;
            session()->flash('error', $e->getMessage());
            return;
        }
    }


    public function render()
    {
        return view('livewire.admin.upload-qr-livewire');
    }
}