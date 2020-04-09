@extends('layouts.app')
    @section('content')
    <body>
        @csrf
        <create-post-component></create-post-component>
        @if($errors -> has('name'))
        <div class="help is-danger">
            {{ $errors->first('name') }}
        </div>
        @endif
        <p>{{ old('name') }}</p>
        <!-- @error('title')
        <div class="help is-danger">
            {{ $errors->first('name') }}
        </div>
        @enderror -->
        @if($errors -> has('body'))
        <div class="help is-danger">
            {{ $errors->first('body') }}
        </div>
        @endif
        <p>{{ old('body') }}</p>
    </body>   

    @endsection
</html>
