@extends('layout')

@section('content')
    <h1 class="title">Edit Project</h1>


    <form method="POST" action="/{{ $project->id }}" style="margin-bottom: 1em ;">

    {{ method_field('PATCH') }}
        {{ csrf_field() }}

    <div class="field">   
        <label class="label" for="title">Title</label>

        <div class="control">
            <input type="text" class="input" name="title" placeholder ="Title" value="{{ $project->title }}">
        </div>
    </div>


    <div class="field">   
        <label class="label" for="description">Description</label>

        <div class="control">
            <textarea class="input" name="description" placeholder ="description">{{ $project->description }}</textarea>
        </div>
    </div>
    

    <div class="field">   
        <button type="submit" class="button is-link">update project</button>
    </div>

    </form>


    <form method="POST" action="/{{ $project->id }}">
        @method('delete')
        @csrf
        <div class="field">
            <button type="submit" class="button">delete project</button>
        </div>
    </form>
@endsection
