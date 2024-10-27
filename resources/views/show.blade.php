@extends('layouts.app')

@section('title', $task->title)


@section('content')
<p>{{$task->description}}</p>

@if($task ->long_description)
    <p>{{$task->long_description}}</p>
@endif

<p>{{$task->created_at}}</p>
<p>{{$task->updated_at}}</p>

<div>
    <form action="{{ route('tasks.toggle-complete', ['task' => $task->id])}}">
        @csrf
        @method('PUT')
    </form>
</div>

<div>
    <label for="editTask">
        Edit Task:
    </label>
    <a href="{{ route('task.edit', ['task' => $task->id] ) }}" name="editTask">{{$task->title}}</a>
</div>

<div>
    <form action ="{{ route('tasks.destroy', ['task' => $task->id] ) }}" method ="POST">
        @method('DELETE')
        @csrf
       <button type = "submit">DELETE</button>
    </form>
   </div>
@endsection
