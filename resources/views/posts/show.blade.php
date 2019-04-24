@extends('layouts.app')

@section('content')
	<a class="btn btn-default" href="/posts">Go Back</a>
    <h1>{{ $post->title }}</h1>
    <div>
    	{!! $post->body !!}
    </div>
    <hr/>
	<small>Written on {{ $post->created_at }} by {{ $post->user->name }}</small>
	<hr/>
	<a class="btn btn-default" href="/posts/{{ $post->id }}/edit">Edit</a>

	{!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'PSOT', 'class' => 'pull-right']) !!}
		{{ Form::hidden('_method', 'DELETE') }}
		{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
	{!! Form::close() !!}
@endsection