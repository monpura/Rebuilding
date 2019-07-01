@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Business Parties Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-default" href="/dashboard">Go Back</a><br>
                    <a class="btn btn-primary" href="/party_lists/create">Add New Party</a>
                    <h3>{{ $party_list->party_name }}</h3>
                        <table class="table table-striped">
                            <tr>
                                <th>Category Name</th>
                                <th>Contact Person</th>
                                <th>Contact Number</th>
                                <th>Party Type</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>                            
                            </tr>
                            <tr>
                                <td><a href="/party_lists/{{ $party_list->id }}"> {{ $party_list->party_name }}</a></td>
                                <td>{{ $party_list->party_contact_person }}</td>
                                <td>{{ $party_list->party_contact_number }}</td>
                                <td>{{ $party_list->party_type }}</td>                                                                        
                                <td>
                                    @if($party_list->published == 1)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                                <td><a href="/party_lists/{{ $party_list->id }}/edit" class="btn btn-default">Edit</td>
                                <td>
                                    {!! Form::open(['action' => ['PartyListsController@destroy', $party_list->id], 'method' => 'PSOT', 'class' => 'pull-right']) !!}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                   {!! Form::close() !!}
                                    </td>
                            </tr>                            
                         </table>
    <h1>{{ $party_list->party_name }}</h1>
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
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection