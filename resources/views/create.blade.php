@extends('layouts.app')
    @section('content')
    <body>
        @csrf
        <create-post-component></create-post-component>
    </body>   

    @endsection
</html>
