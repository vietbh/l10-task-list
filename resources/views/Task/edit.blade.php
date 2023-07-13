@extends('layout.app')

@section('title', 'Edit Task')

@section('content')
    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="link">⬅️Go back Task list</a>
    </div>
    <form action="{{ route('tasks.update', ['task' => $tasks->id]) }}" method="post">
        @csrf
        @method('put')
        <div class="mb-4">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{$tasks->title}}"
            @class(['border-red-500' => $errors->has('title')]) >
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="desc">Description</label>
            <textarea name="description" id="desc" rows="5" @class(['border-red-500' => $errors->has('description')]) >{{$tasks->description}}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>    
            @enderror
        </div>  
        <div class="mb-4">
            <label for="long_desc">Long Description</label>
            <textarea type="text" name="long_description" id="long_desc" rows="7" @class(['border-red-500' => $errors->has('long_description')])>{{$tasks->long_description}}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-2">
            <button type="submit" class="btn">Edit Task</button>
        </div>
    </form>
@endsection
    
