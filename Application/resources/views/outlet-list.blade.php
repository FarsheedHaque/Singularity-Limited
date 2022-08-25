@extends('layout')


@section('content')

    <div>
        <h4 style="text-align: center;">Outlet </h4>

        @if($role == 'admin')
        <h5><a href="/new-outlet" >Add Outlet</a></h5>
        @endif
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

{{--                    @if(Session::has('outlet-added'))--}}
{{--                        <p class="alert alert-success">{{session('outlet-added')}}</p>--}}
{{--                    @endif--}}


                @if($outlets)
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
                            <th>Phone</th>
                        </tr>

                        @php $i = 1 @endphp
                        @foreach($outlets as $outlet)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$outlet['name']}}</td>
                                <td>{{$outlet['phone']}}</td>
                                <td><a href="{{url('/single-outlet', $outlet['id'])}}">Open</a></td>
                                @if($role == 'admin')
                                <td><a style="color: red;" href="{{url('/delete-outlet', $outlet['id'])}}">Delete</a></td>
                                @endif
                            </tr>

                            @endforeach
                            </tbody>

                    </table>
                    @else
                        <h5 class="card-title"> No Outlet</h5>
                @endif

            </div>
        </div>
    </div>


@endsection
