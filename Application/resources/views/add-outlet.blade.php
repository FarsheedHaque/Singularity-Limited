@extends('layout')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Create Outlet</div>
                        <div class="card-body">

                            <form action="{{ url('create-outlet-request') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="name" class="form-control" name="name" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                                    <div class="col-md-6">
                                        <input type="number" id="phone" class="form-control" name="phone">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="address" class="form-control" name="address">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="latitude" class="col-md-4 col-form-label text-md-right">Latitude</label>
                                    <div class="col-md-6">
                                        <input type="number" step="0.00000000001" id="latitude" class="form-control" name="latitude">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="longitude" class="col-md-4 col-form-label text-md-right">Longitude</label>
                                    <div class="col-md-6">
                                        <input type="number" step="0.00000000001" id="longitude" class="form-control" name="longitude">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="image" class="col-md-4 col-form-label text-md-right">Upload Image</label>
                                    <div class="col-md-6">
                                        <input type="file" name="image[]" id="image" multiple="multiple">
                                        <br>(Format: JPG, JPEG)
                                    </div>

                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
