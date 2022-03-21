<?php

namespace App\Http\Livewire\Admin;

use App\Models\Qrs;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class QrTableRowDisplayLivewire extends Component
{
    public $count;
    public $fileName;
    public $content;
    public $status;
    public $created_at;
    public $uuid;
    public $_id;
    public $hidden = 'block';



    public function mount($qr, $count)
    {
        $this->count = $count;
        $this->fileName = $qr->fileName;
        $this->content = $qr->content;
        $this->status = $qr->status;
        $this->created_at = $qr->created_at;
        $this->uuid = $qr->uuid;
        $this->_id = $qr->id;
    }

    public function updateStatus($status, $uuid)
    {
        // $this->status = $status;
        $qr = Qrs::find($uuid);
        $qr->status = $status;

        $qr->save();

        // $update_query = Qrs::where('uuid', $uuid)->update(['status', $status]);
        $this->status = $status;
    }

    public function deleteQr($uuid)
    {
        $qr = Qrs::find($uuid);
        $qr->delete();

        /*
        if ($qr->extension == ('png' || 'jpeg' || 'png')) {
            $file_image_path = Storage::disk('local')->path("/public/qr/images/" . $qr->filename);
            if (file_exists($file_image_path)) {
                unlink($file_image_path); // so you never get here
            }
        } else {
            $file_image_path = Storage::disk('local')->path("/public/qr/images/" . $qr->filename);
            if (file_exists($file_image_path)) {
                unlink($file_image_path); // so you never get here
            }

            $file_pdf_path = Storage::disk('local')->path("/public/qr/pdf/" . $qr->filename);
            if (file_exists($file_pdf_path)) {
                unlink($file_pdf_path); // so you never get here
            }
        }

        */

        $this->hidden = 'none';
    }

    public function render()
    {
        return view('livewire.admin.qr-table-row-display-livewire');
    }
}