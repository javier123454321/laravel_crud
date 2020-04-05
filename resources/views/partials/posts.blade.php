@extends('layouts.app')
    @section('content')
    <body>
        <div id="app">
            <posts-component :post='{!! json_encode($post) !!}'></posts-component>
        </div>
    </body>   

    @endsection
</html>