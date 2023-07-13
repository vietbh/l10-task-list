@extends('layout.app')

@section('title', $tasks ->title)

@section('content')
<div class="mb-4">
    <a href="{{ route('tasks.index') }}" class="link">⬅️Go back Task list</a>
</div>
<label class="text-red-800" for="description">Description:</label>
<p class="mb-4 text-slate-700" id="description">{{$tasks->description}}</p>

@if ($tasks->long_description)
    <label class="text-red-800" for="long_description">Long-description:</label>
    <p class="mb-4 text-slate-700" id="long_description">{{$tasks->long_description}}</p>
@endif

<p class="mb-4 text-sm text-slate-500">{{$tasks->created_at->diffForHumans()}}↔️{{$tasks->updated_at->diffForHumans()}}</p>
<p class="mb-4">
    @if ($tasks->completed)
        <span class="font-medium text-green-700">Completed</span>
    @else
        <span class="font-medium text-red-700">Not Completed</span>
    @endif
</p>

<div class="flex gap-2">
    <a href="{{ route('tasks.edit', ['task'=>$tasks]) }}" class="btn">Edit</a>

    <form method="post" action="{{ route('tasks.toggle-complete', ['task'=>$tasks]) }}">
    @csrf
    @method('put')
        <button type="submit" class="btn btn-primary">
                Mark as {{$tasks->completed ? 'not completed' : 'completed'}}
        </button>
    </form>

    <form action="{{ route( 'tasks.destroy', ['task'=> $tasks]) }}" method="post">
    @csrf
        @method('delete')
        <button type="submit" class="btn">Delete</button>
    </form>
</div>
@endsection
