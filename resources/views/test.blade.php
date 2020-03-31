@extends('layouts.app')
    @section('content')
    <body>
        <div id="test-component">
            <test-component message="{{ $message }}"></test-component>
        </div>
    </body>   
    <script src="../js/app.js"></script>
    @endsection
</html>