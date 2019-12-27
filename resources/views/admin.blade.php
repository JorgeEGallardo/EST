<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Roboto:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            min-height: 100vh;
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

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .hovereffect:hover img {
            opacity: 0.6;
            filter: alpha(opacity=60);
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        .m-b-md {}
    </style>
</head>

<body>

    @if (Route::has('login'))
    <div class="top-right links">
        @auth
        <a href="{{ url('/home') }}">Home</a>
        @else
        <a href="{{ route('login') }}">Login</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif
        @endauth
    </div>
    @endif
    <div class="title m-b-md ml-4">
        Laravel
    </div>
    <div class=" full-height" STYLE="padding-left:2rem; padding-right:3rem">

        <div class="shadow-lg full-height" style="width:100%;">
            <div class="row">
                @foreach ($worker as $userE)
                <div class="col-6" onclick="window.location.href ='/doSale/{{$id}}/{{$userE->id}}'">
                    <div style="width:90%; " class="content mx-2 my-4 shadow-lg">
                        <div class="hovereffect">

                            <div class="card" style="width: 100%;padding-left:20%;padding-right:20%;">
                                <img style=" max-height: 15rem; min-width:20rem;" src="{{$userE->photo}}" class="my-4 card-img-top" alt="...">

                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$userE->username}}</h5>
                            </div>
                        </div>
                    </div>
                </div>


                @endforeach
            </div>
        </div>
</body>

</html>
