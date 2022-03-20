<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Qrs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentViewerController extends Controller
{
    public function viewDocument($document_id)
    {
        $qr = Qrs::where('uuid', $document_id)->first();
        if (is_null($qr)) {
            return "No data found";
        }

        $base64_data = base64_encode(Storage::disk('local')->get("/public/qr/images/" . $qr->fileName));
        // return $base64_data;

        $qr->base64_data = $base64_data;

        return view('admin.document', [
            'qr' => $qr
        ]);
    }
}