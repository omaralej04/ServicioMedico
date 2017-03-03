<!DOCTYPE html>

<html lang="{{ config('app.locale') }}">
<head>
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css"
          integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
            background-color: #fff;
            background: -moz-linear-gradient(top,  #d6f9ff 0%, #9ee8fa 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(top,  #d6f9ff 0%,#9ee8fa 100%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom,  #d6f9ff 0%,#9ee8fa 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d6f9ff', endColorstr='#9ee8fa',GradientType=0 ); /* IE6-9 */
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
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">Inicio</a>
            @else
                <a href="{{ url('/login') }}"><i class="fa fa-user-circle-o fa-2x"></i>&#8195; Iniciar</a>
                <a href="{{ url('/register') }}"><i class="fa fa-vcard-o fa-2x"></i>&#8195; Registrarse</a>
            @endif
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            ServiciosMedicos
        </div>
        <div class="flex-center">
            <i class="fa fa-quote-left fa-1 fa-pull-left" style="margin-bottom: 33px;"></i><h1>Soluciones Medicas en Laravel Framework</h1>
            <i class="fa fa-quote-right fa-1 fa-pull-right" style="margin-bottom: 33px;"></i>
        </div>
    </div>
</div>
</body>
</html>
