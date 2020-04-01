@extends('layouts.app')
    @section('content')
    <body>
        <div id="app">
            <all-posts-component :posts="{{ $posts }}"></all-posts-component>
        </div>
    </body>   

    @endsection
        <script src="../js/app.js"></script>
</html>