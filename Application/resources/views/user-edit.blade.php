@extends('layout')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">User Information</div>
                        <div class="card-body">

                            @if(Session::has('data-retrieval-error'))
                                <p class="alert alert-danger">{{session('data-retrieval-error')}}</p>
                            @endif

                            @if(Session::has('update-success'))
                                <p class="alert alert-success">{{session('update-success')}}</p>
                            @endif

                            @if(Session::has('update-failure'))
                                <p class="alert alert-danger">{{session('update-failure')}}</p>
                            @endif

                            @if($user)
                                <form action="{{ url('update-user') }}" method="POST">
                                    @csrf
                                    <input type="hidden" id="id" class="form-control" name="id" value="{{$user['id']}}">
                                    <input type="hidden" id="email" class="form-control" name="email" value="{{$user['email']}}">

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                        <div class="col-md-6">
                                            <input type="text" id="name" class="form-control" name="name" value="{{$user['name']}}" required autofocus>
                                            {{--                                        @if ($errors->has('name'))--}}
                                            {{--                                            <span class="text-danger">{{ $errors->first('name') }}</span>--}}
                                            {{--                                        @endif--}}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                        <div class="col-md-6">
                                            <input type="email" id="email_new" class="form-control" name="email_new" value="{{$user['email']}}" required autofocus>
                                            {{--                                        @if ($errors->has('email'))--}}
                                            {{--                                            <span class="text-danger">{{ $errors->first('email') }}</span>--}}
                                            {{--                                        @endif--}}
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                        <div class="col-md-6">
                                            <input type="password" id="password_new" class="form-control" name="password_new">
                                            {{--                                        @if ($errors->has('password'))--}}
                                            {{--                                            <span class="text-danger">{{ $errors->first('password') }}</span>--}}
                                            {{--                                        @endif--}}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
                                        <div class="col-md-6">
                                            <input type="password" id="password" class="form-control" name="password" placeholder="Type current password to make any change" required>
                                            {{--                                        @if ($errors->has('password'))--}}
                                            {{--                                            <span class="text-danger">{{ $errors->first('password') }}</span>--}}
                                            {{--                                        @endif--}}
                                        </div>
                                    </div>



                                    @if(Session::has('update-failure1'))
                                        <p class="alert alert-danger">{{session('update-failure1')}}</p>
                                    @endif

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
                                            Edit
                                        </button>
                                    </div>
                                </form>

                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
