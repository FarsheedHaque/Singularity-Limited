@extends('layout')


@section('content')

    <div>
        <h4 style="text-align: center;">User </h4>

        <h5><a href="/new-registration" >Add User</a></h5>
    </div>


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                @if(Session::has('data-retrieval-error'))
                    <p class="alert alert-danger">{{session('data-retrieval-error')}}</p>
                @endif

                    @if(Session::has('data-retrieval'))
                        <p class="alert alert-success">{{session('data-retrieval')}}</p>
                    @endif

                    @if(Session::has('user-added'))
                        <p class="alert alert-success">{{session('user-added')}}</p>
                    @endif

                    @if(Session::has('single-user-remaining-error'))
                        <p class="alert alert-danger">{{session('single-user-remaining-error')}}</p>
                    @endif

                @if($users)
                    <style>
                        table {
                            font-family: arial, sans-serif;
                            border-collapse: collapse;
                            width: 100%;
                        }

                        td, th {
                            border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;
                        }

                        tr:nth-child(even) {
                            background-color: #dddddd;
                        }
                    </style>
                    <body>
                    <table>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>


                        @php $i = 1 @endphp
                        @foreach($users as $user)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$user['name']}}</td>
                                <td>{{$user['email']}}</td>
                                @if($user['role'] != 'admin')
                                <td><a href="{{url('/single-user', $user['id'])}}">Edit</a></td>
                                <td><a style="color: red;" href="{{url('/delete-user', $user['id'])}}">Delete</a></td>
                                @else
                                    <td>Admin Can Not Be Edited Or Deleted</td>
                                    <td></td>
                                    @endif
                            </tr>

                            @endforeach
                            </tbody>

                    </table>
                    @else
                        <h5 class="card-title"> No User</h5>
                @endif

            </div>
        </div>
    </div>


@endsection
