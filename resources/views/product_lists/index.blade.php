@extends('layouts.app')

@section('content')
    <h1>Products</h1>
    @if(count($products) > 0)
    	@foreach($products as $product)
    		<div class="well">
                <div class="col-md-8 col-sm-8">
                    <h3><a href="/product_lists/{{ $product->id }}"> {{ $product->product_name }}</a></h3>
                    <small>Product added on {{ $product->created_at }}</small>                    
                </div>
    		</div>  		
    	@endforeach
    @else
    	<p>No product Found</p>
    @endif
@endsection