@extends('layouts.app')

@section('content')
    @include('form')
@endsection()



{{-- @section('title', 'Add Task')

@section('styles')
    <style>
        .error-message{
            color: red;
            font-size: 0, 8rem;
        }
    </style>
@endsection --}}

{{-- {{$errors}}
<form  method="POST" action="{{route("tasks.store")}}">
    @csrf
    <div>
        <label for="title">
            Title
        </label>
        <input text="text" name="title" id="title" value="{{old('title')}}"/>
    </div>
    @error('title')
        <p class="error-message">{{$message}}</p>
    @enderror

    <div>
        <label for="description">
            Descripton
        </label>
        <textarea name="description" id="description" rows="5">{{old('description')}}</textarea>
    </div>
    @error('description')
        <p class="error-message">{{$message}}</p>
    @enderror

    <div>
        <label for="long_description">
            Descripton
        </label>
        <textarea name="long_description" id="long_description" rows="10">{{old('long_3description')}}</textarea>
    </div>
    @error('long_description')
        <p class="error-message">{{$message}}</p>
    @enderror

    <div>
        <button type="submit">Add Task</button>
    </div>

</form> --}}
