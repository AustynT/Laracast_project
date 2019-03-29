@extends('layout')

    @section('content')
    <ul>
    @foreach($projects as $project)

        <li>
            <a href="/projects/{{ $project->id  }}">{{ $project->title }} </a>


        </li>

    </ul>
    @endforeach
    @endsection
