<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
 
    </head>
    <body>
        <div class="flex-center position-ref full-height">
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
        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>
            <div id="app">
                <latest-post-component :latest='{!! json_encode($latest) !!}'></latest-post-component>
            </div>
            <div class="mainMenuNav">
                <a class="navlink" href="/posts">See All</a>
                <a class="navlink" href="/addpost">Add New</a>
            </div>
        </div>
        </div>
    </body>
    <script src="../js/app.js"></script>
    <style>
        .mainMenuNav > *{
            padding: 6px;
            border: solid 1px #636b6f;
            border-radius: 5px;
            margin: 5px;
        }
        .navLink{
            width: 90px;
        }
        a, a:active, a:visited{
            color: #636b6f;
        }
    </style>
</html>
