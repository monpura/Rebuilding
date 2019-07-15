@extends('layouts.app')

@section('content')
	<div class="jumbotron text-center">
        @guest
			<h1>{{ $title }}</h1>
		    <p>This is home page.</p>
		    <p>
		    	<a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a  class="btn btn-success btn-lg" href="/register" role="button">Register</a>
		    </p>
        @else
   		    <p>Go back to <a href="/dashboard">dashboard</a></p>
		@endguest	    
	</div>
@endsection
