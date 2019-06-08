@extends('layout')

@section('content')
<h1 class="title">  {{ $project->title }}</h1>

<p>
    <a href="{{ $project->id  }}/edit">Edit</a>
</p>
    <div class="content">
        {{ $project->description }}
    </div>



    @if($project->tasks->count())
        <div class="box">

            @foreach($project->tasks as $task)
                <div>
                    <form method="POST" action="/tasks/{{ $task->id }}">
                    @method('PATCH')
                    @csrf
                    <li>
                        <label class="checkbox {{ $task->completed ? 'is-complete' : ''  }}" for="completed">
                            <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : ''  }}>
                            {{ $task->description }}
                        </label>
                    </li>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
    <div class="box">
    <form action="/projects/{{ $project->id }}/tasks" method="POST">
        @csrf


        <div class="field">
            <label for="description">New Task</label>


            <div class="control">
                <input type="text" class="input" name="description" placeholder="New Task" required>
            </div>

            <button type="submit" class="button is-link">Add Task</button>
        </div>
    </form>
    </div>

    @include('errors')
@endsection
