@extends('master')

@section('title', 'Admin Login')



@section('content')

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <br>
            <h1 class="text-primary">QR MS Document Viewer
                <button class="btn btn-sm btn-danger float-end" onclick="self.close()">Close QR</button>
            </h1>
            <br>

            <div style="zoom: 0.8">
                @switch($qr->fileExtension)
                    @case('pdf')
                        <iframe src="data:application/pdf;base64,{{ $qr->base64_data }}"
                            onload='javascript:(function(o){o.style.height=o.contentWindow.document.body.scrollHeight+"px";}(this));'
                            style="height:1000px;width:100%;border:none;overflow:hidden;"></iframe>
                    @break

                    @case('png')
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <img src="data:image/png;base64, {{ $qr->base64_data }}" class="img-fluid " alt="">
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    @break

                    @case('jpeg')
                    @break

                    @case('jpg')
                    @break

                    @default
                        <iframe src="data:application/pdf;base64,{{ $document }}"
                            onload='javascript:(function(o){o.style.height=o.contentWindow.document.body.scrollHeight+"px";}(this));'
                            style="height:1000px;width:100%;border:none;overflow:hidden;"></iframe>
                @endswitch


            </div>

        </div>
        <div class="col-md-1"></div>
    </div>


    {{-- <livewire:admin.upload-qr-livewire /> --}}

@endsection
