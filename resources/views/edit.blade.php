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
                    <a href="#">Login</a>
                    <a href="#">Register</a>
            </div>

            <div class="container">
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="alert alert-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{ Form::model($data, ["files" => true]) }}
                    <div class="form-group">
                        <label> First Name</label>
                        {{ Form::text("first_name", null, ["class" => "form-control", "required" => true]) }}
                    </div>
                    <div class="form-group">
                        <label> Last Name</label>
                        {{ Form::text("last_name", null, ["class" => "form-control", "required" => true]) }}
                    </div>
                    <div class="form-group">
                        <label> Email</label>
                        {{ Form::text("email", null, ["class" => "form-control", "required" => true]) }}
                    </div>
                    <div class="form-group">
                        <label> Phone No</label>
                        {{ Form::text("phone", null, ["class" => "form-control", "required" => true]) }}
                    </div>
                    <div class="form-group">
                        <label> Street</label>
                        {{ Form::text("street", null, ["class" => "form-control", "required" => true]) }}
                    </div>
                    <div class="form-group">
                        <label> Zip code</label>
                        {{ Form::text("zip_code", null, ["class" => "form-control", "required" => true]) }}
                    </div>
                    <div class="form-group">
                        <label> City</label>
                        {{ Form::select("city", $cities,  null, ["class" => "form-control", "required" => true, "placeholder" => "Select City"]) }}
                    </div>

                    <div class="form-group">
                        <label> Profile Image</label>
                        {{ Form::file("profile_pic", ["class" => "form-control"]) }}
                        <img src="{{ asset("storage/{$data->profile_pic}") }}" height="150" width="150">
                        <input type="hidden" value="{{ $data->profile_pic }}" name="old_pic">
                    </div>

                    {{ Form::submit("Submit", ["class" => "btn btn-primary"]) }}
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </body>
</html>
