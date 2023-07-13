@extends('layout.app')

@section('title', 'The List Tasks')


@section('content')
<nav class="mb-4">
    <a href="{{ route('tasks.create') }}" class="link">Add task!</a>
</nav>

<div>
    @forelse ($tasks as $item)
        <div class="mb-2">
            <a href="{{ route('tasks.show', ['task' => $item->id]) }}" @class(['line-through' => $item->completed]) >
                 {{ $item->title }}
            </a>
        </div>
    @empty
        <div class="">Three are no tasks###</div>
    @endforelse
</div>

@if ($tasks->count())
<nav>
    {{$tasks->links()}}
</nav>
@endif
@endsection
