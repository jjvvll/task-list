@extends('layouts.app')

@section('title', 'The list of tasks')


@section('content')

    <div>
        <a href="{{route('task.create')}}">Add task</a>
    </div>
     {{-- @if(count($tasks)) --}}
        <h2>Uy may laman!</h2>
        @forelse ( $tasks as  $task)
            <div>
                <a href="{{ route('task.show', ['task' => $task->id] ) }}">{{$task->title}}</a>
            </div>
        @empty
            <div>Bokya</div>
        @endforelse

    {{-- @endif --}}

        @if ($tasks->count())
            <nav>
                {{$tasks->links()}}
            </nav>
        @endif
@endsection
