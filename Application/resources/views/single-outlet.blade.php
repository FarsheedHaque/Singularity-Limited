@extends('layout')

@section('content')

    <div>
        <h4 style="text-align: center;">Outlet </h4>

    </div>



    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">




                @if($outlet)
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
                                <th>Name:</th>
                                <td>{{$outlet['name']}}</td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td>{{$outlet['phone']}}</td>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <td>{{$outlet['address']}}</td>
                            </tr>
                            <tr>
                                <th>Latitude:</th>
                                <td>{{$outlet['latitude']}}</td>
                            </tr>
                            <tr>
                                <th>Longitude:</th>
                                <td>{{$outlet['longitude']}}</td>
                            </tr>
{{--                        @if($role == 'admin')--}}
{{--                            <tr>--}}
{{--                                <td><a href="{{url('/single-outlet-again', $outlet['id'])}}">Edit Information</a></td>>--}}
{{--                                <td><a style="color: red;" href="{{url('/delete-outlet', $outlet['id'])}}">Delete Outlet</a></td>--}}
{{--                            </tr>--}}
{{--                            @endif--}}

{{--                           --}}

                    </table>

                    <table>
                        @if($role == 'admin')
                            <tr>
                                <td><a href="{{url('/single-outlet-again', $outlet['id'])}}">Edit Information</a></td>
                                <td><a style="color: red;" href="{{url('/delete-outlet', $outlet['id'])}}">Delete Outlet</a></td>
                                <td>
                                    <form action="{{ url('add-more-outlet-image') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                        <input type="hidden" id="id" class="form-control" name="id" value="{{$outlet['id']}}">
                                        <input type="file" name="image[]" id="image" multiple="multiple" required>

                                        <button type="submit" class="btn btn-primary">
                                            Add More Image
                                        </button>
                                        (Format: JPG, JPEG)
                                    </form>
                                </td>
                            </tr>
                            @endif


                    </table>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(Session::has('data-retrieval'))
                        <p class="alert alert-success">{{session('data-retrieval')}}</p>
                    @endif

                    @if(Session::has('data-retrieval-error'))
                        <p class="alert alert-danger">{{session('data-retrieval-error')}}</p>
                    @endif












                    @else
                        <h5 class="card-title"> No Outlet</h5>
                @endif



            </div>
        </div>
    </div>
@if($images)
    <style>
        div.gallery {
            margin: 5px;
            border: 1px solid #ccc;
            float: left;
            width: 180px;
        }

        div.gallery:hover {
            border: 1px solid #777;
        }

        div.gallery img {
            width: 100%;
            height: auto;
        }

        div.desc {
            padding: 15px;
            text-align: center;
        }
    </style>

    @foreach($images as $image)
        <div class="gallery">
            <a target="_blank" href="/gallery/{{$image['name']}}">
                <img src="/gallery/{{$image['name']}}" alt="Cinque Terre" width="600" height="400">
            </a>

            @if($role == 'admin')
            <div class="desc"><a style="color: red;" href="{{url('/delete-image', [$image['name'], $outlet['id']])}}">Delete Image</a></div>
            @endif
        </div>
    @endforeach
@endif

    <div class="container mb-5">
        <div id="map" style="width:100%;height:500px;"></div>
    </div>


    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBY5p5e5PtJuJLl_nRpjefL0S094jdhEP8&libraries=places"></script>

    <script>
        function showMap(lat, long)
        {
            var coord = {lat:lat, lng:long};
            var map = new google.maps.Map(
                document.getElementById("map"),
                {
                    zoom: 10,
                    center: coord
                }
            );
            new google.maps.Marker({
                position:coord,
                map:map
            });
        }
        showMap({{$outlet['latitude']}}, {{$outlet['longitude']}});

    </script>

@endsection
