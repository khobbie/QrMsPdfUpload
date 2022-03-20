@extends('master')

@section('title', 'Admin Login')



@section('content')


    {{-- <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">


            <br> <br>
            <h4 class="text-primary">Login into QR MS</h4>
            <br> <br>
            <form action="" autocomplete="off" aria-autocomplete="off" class="mt-10">


                <div class="input input-group-lg mb-3">

                    <label for="exampleFormControlInput1" class="form-label"> <b>Email</b> </label>
                    <br>
                    <input type="email" class="form-control" id="email" placeholder="">

                </div>



                <div class="input input-group-lg mb-3">
                    <label for="exampleFormControlInput1" class="form-label"> <b>Password</b> </label>
                    <br>
                    <input type="password" class="form-control" id="password" placeholder="">
                </div>



                <div class="mb-3">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg float-end">Login QR MS</button>
                    </div>


                </div>

            </form>
        </div>
        <div class="col-md-4"></div>
    </div> --}}


    <livewire:admin.login-livewire />

@endsection
