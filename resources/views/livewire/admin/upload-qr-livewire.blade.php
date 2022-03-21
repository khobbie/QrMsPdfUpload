<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">


        <br> <br>
        <h1 class="text-primary">QR MS</h1>
        <br> <br>

        <form wire:submit.prevent="save">


            @if (session()->has('error'))
                <div class="row">
                    <div class="col-md-12">

                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('error') }} !</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>

                    </div>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="row">
                    <div class="col-md-12">

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }} ! <a href="{{ url('home') }}">View File</a> </strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>


                    </div>
                </div>
            @endif


            <div class="input input-group-lg mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <b>Upload PDF</b> </label>
                <br>
                <input type="file" class="form-control" wire:model="upload_file">

                @error('upload_file')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror

            </div>


            <div class="mb-3">
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg float-end">Upload QR</button>
                </div>


            </div>

            <a href="{{ url('home') }}" class="float-end">Dashboard</a>

        </form>

    </div>
    <div class="col-md-4"></div>
</div>
