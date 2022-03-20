@extends('master')

@section('title', 'Admin Login')



@section('content')

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">


            <br> <br>
            <h1 class="text-primary">QR MS Dashboard


                <a href="{{ url('logout') }}">
                    <button class="btn btn-sm btn-danger float-end mr-2" style="margin-left: 20px;">Logout</button>
                </a>

                &nbsp;
                &nbsp;

                <a href="{{ url('upload') }}">
                    <button class="btn btn-sm btn-primary float-end mr-2">Upload QR</button>
                </a>
                &nbsp;

            </h1>
            <br>

            <table class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>File Name</th>
                        <th>Content</th>
                        <th>status</th>
                        <th>Time</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($qrs as $qr)
                        {{-- <livewire:admin.qr-table-row-display-livewire /> --}}

                        @livewire('admin.qr-table-row-display-livewire', ['qr' => $qr, 'count' => $count])

                        {{-- <tr>
                            <th>{{ $count }}</th>
                            <td>{{ $qr->fileName }}</td>
                            <td>{{ $qr->content }}</td>
                            <td> {{ $qr->status }} </td>
                            <td> {{ $qr->created_at }} </td>
                            <td class="text-center">
                                <div class="dropdown ">
                                    <a class="btn btn-sm btn-warning dropdown-toggle" href="#" role="button"
                                        id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <b> >>> </b>
                                    </a>

                                    <a href="{{ url('document-viewer', ['document_id' => $qr->uuid]) }}" target="_blank">
                                        <button class="btn btn-sm btn-primary">View</button>
                                    </a>


                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="#">Submitted </a></li>
                                        <li><a class="dropdown-item" href="#">onProcessing</a></li>
                                        <li><a class="dropdown-item" href="#">Processed</a></li>
                                    </ul>
                                </div>


                            </td>
                        </tr> --}}

                        @php
                            $count++;
                        @endphp
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="col-md-1"></div>
    </div>


    {{-- <livewire:admin.upload-qr-livewire /> --}}

@endsection
