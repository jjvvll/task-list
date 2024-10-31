@extends('layouts.app')

@section('title', 'The list of tasks')


@section('content')

    <nav class ="mb-4">
        <a href="{{route('task.create')}}" class="link">Add task</a>
    </nav>
     {{-- @if(count($tasks)) --}}
        @forelse ( $tasks as  $task)
            <div class="mb-2">
                <a href="{{ route('task.show', ['task' => $task->id] ) }}"
                    @class(['line-through font-bold font-bold text-red-500' => $task->completed])>{{$task->title}}</a>
            </div>
        @empty
            <div>Bokya</div>
        @endforelse

    {{-- @endif --}}

        @if ($tasks->count())
            <nav class="mt-4">
                {{$tasks->links()}}
            </nav>
        @endif
@endsection
