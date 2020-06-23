<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="top-right links">
                <a href="{{route('create')}}">Create</a>
            </div>


            <div class="container">

                {{ Form::open(["class" => "form-inline", "method" => "get"]) }}
                <div class="form-group">
                    {{ Form::text("zip_code", null, ["class" => "form-control"]) }}
                </div>
                <div class="form-group">
                    {{ Form::select("city", $cities, null, ["class" => "form-control", "placeholder" => "Select city"]) }}
                </div>

                <div class="form-group">
                    {{ Form::select("export",
                            ['xml'=>"XML",'csv'=>"CSV"], null, ["class" => "form-control", "placeholder" => "Select Export Format"]) }}
                </div>
                {{ Form::submit("search") }}

                @if($data)
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Street</th>
                            <th>Zipcode</th>
                            <th>City</th>
                            <th>Action</th>
                        </tr>

                        @foreach($data as $address)
                            <tr>
                                <td>1</td>
                                <td><img src="{{ asset("storage/{$address->profile_pic}") }}" height="150" width="150"></td>
                                <td>{{ $address->first_name }}</td>
                                <td>{{ $address->last_name }}</td>
                                <td>{{ $address->email }}</td>
                                <td>{{ $address->phone }}</td>
                                <td>{{ $address->street }}</td>
                                <td>{{ $address->zip_code }}</td>
                                <td>{{ $address->cityData->name }}</td>
                                <td>
                                    <a href="edit/{{ $address->id }}" class="btn btn-primary">Edit</a>
                                    <a href="delete/{{ $address->id }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                        @endforeach

                    </table>


                @else
                    <div class="alert alert-warning">No records found.</div>
                @endif
               @forelse($data as $address)

               @empty

               @endforelse
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </body>
</html>
