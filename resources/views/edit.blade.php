@extends('layouts.app')
    @section('content')
    <body>
        @csrf
        <edit-post-component :post="{{ $article }}"></edit-post-component>
    </body>   

    @endsection
</html>
