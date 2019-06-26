@extends('layouts.app')

@section('content')
	<a class="btn btn-default" href="/product_lists">Go Back</a>
    <h1>{{ $product->product_name }}</h1>
    <div>
    	Product ID: {!! $product->id !!}
    </div>
    <div>
    	Category ID: {!! $product->category_id !!}
    </div>
    <div>
    	Product Number: {!! $product->product_number !!}
    </div>
    <div>
    	Party ID: {!! $product->party_id !!}
    </div>
    <div>
    	Barcode: {!! $product->barcode !!}
    </div>
    <div>
    	Sale Price: {!! $product->sale_price !!}
    </div>
    <div>
    	Print Quantity: {!! $product->print_quantity !!}
    </div>
    <div>
    	Status: 
    		@if($product->published == 1)
    			Yes
    		@else
    			No
    		@endif	
    </div>                
    <hr/>
	<small>Product added on {{ $product->created_at }}</small>
	<hr/>

	@if(!Auth::guest())
		@if(Auth::user()->id == $product->user_id)
			<a class="btn btn-default" href="/products/{{ $product->id }}/edit">Edit</a>
			{!! Form::open(['action' => ['productsController@destroy', $product->id], 'method' => 'PSOT', 'class' => 'pull-right']) !!}
				{{ Form::hidden('_method', 'DELETE') }}
				{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
			{!! Form::close() !!}
		@endif
	@endif
@endsection