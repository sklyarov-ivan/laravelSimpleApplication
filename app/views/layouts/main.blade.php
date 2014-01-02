<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
        @yield('styles')
    </head>

    <body>

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="{{ route('home') }}">Habr Offers</a>
                    <ul class="nav">
                        <li><a href="{{ route('home') }}">Home</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">

            @if (Session::has('message'))
                <div class="flash alert">
                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif

            @yield('main')
        </div>

        <script type="text/javascript" src="//code.jquery.com/jquery.min.js"></script>
        <script type="text/javascript" src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
        @yield('scripts')

    </body>

</html>
