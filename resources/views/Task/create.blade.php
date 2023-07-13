@extends('layout.app')

@section('title', 'Add Task')

@section('content')
   
    <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        <div class="mb-4">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title')}}"
            @class(['border-red-500' => $errors->has('title')])>
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="desc">Description</label>
            <textarea type="text" name="description" id="desc" rows="5"  @class(['border-red-500' => $errors->has('description')])>{{ old('description')}}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>    
            @enderror
        </div>  
        <div class="mb-4">
            <label for="long_desc">Long Description</label>
            <textarea type="text" name="long_description" id="long_desc" rows="7" @class(['border-red-500' => $errors->has('long_description')])>{{ old('long_description')}}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex gap-2">
            <button type="submit" class="btn">➕Add Task</button>
        
            <a href="{{ route('tasks.index') }}" class="btn">❌Cancel</a>
        </div>
    </form>
@endsection
    
