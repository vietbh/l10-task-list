@extends('layout.app')

@section('title', $tasks ->title)

@section('content')
<p>{{$tasks->description}}</p>

@if ($tasks->long_description)
<p>{{$tasks->long_description}}</p>
@endif
<p>{{$tasks->created_at}}</p>
<p>{{$tasks->updated_at}}</p>
    
@endsection
