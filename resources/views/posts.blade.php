@extends('layouts.app')
    @section('content')
    <body>
        <div id="app">
            <posts-component :post='{!! json_encode($post) !!}' :tags='{!! json_encode($tags) !!}'></posts-component>
        </div>
    </body>   

    @endsection
        <script src="../js/app.js"></script>
</html>