
@extends('layout')

@section('content')
    <h1>Create Projects</h1>

    <form method="POST" action="/projects/">


        {{ csrf_field() }}
    
        <div>
            <label for="title" > </label>
            <input class="input {{ $errors->has('title')? 'is-danger' : '' }}" type="text"  name="title"  placeholder="Project title" value="{{ old('title') }}">
        </div>

        <div>
            <label for="description"></label>
            <textarea  class="textarea {{ $errors->has('description')? 'is-danger' : '' }}" name="description" placeholder="Project Description" value="{{ old('description') }}" ></textarea>
        </div>

        <div>
            <button type="submit">Create Project</button>
        </div>


    @include('errors')
    </form>

@endsection
