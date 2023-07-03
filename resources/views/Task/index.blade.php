@extends('layout.app')

@section('title', 'The List Tasks')

@section('content')
<div>
    @forelse ($tasks as $item)
        <a href="{{ route('tasks.show', ['id' => $item->id]) }}">
            <div>{{ $item->title }}</div>
        </a>
    @empty
        <div class="">Three are no tasks###</div>
    @endforelse
</div>
@endsection
