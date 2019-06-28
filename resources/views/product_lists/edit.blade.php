@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    {{ Form::open(['action' => ['ProductListsController@update', $product->id], 'method' => 'PSOT', 'enctype' => 'multipart/form-data']) }}
        <div class="form-group">
            {{ Form::label('category_id', 'Category ID') }}
            {{ Form::select('category_id', [$product->category_id, 0, 1, 2]) }}
        </div>
        <div class="form-group">
            {{ Form::label('product_name', 'Product Name') }}
            {{ Form::text('product_name', $product->product_name, ['class' => 'form-control', 'placeholder' => 'Product Name']) }}
        </div>
        <div class="form-group">
            {{ Form::label('product_number', 'Product Number') }}
            {{ Form::text('product_number', $product->product_number, ['class' => 'form-control', 'placeholder' => 'Product Number']) }}
        </div>
        <div class="form-group">
            {{ Form::label('party_id', 'Party ID') }}
            {{ Form::select('party_id', [$product->party_id, 0, 1, 2]) }}
        </div>
        <div class="form-group">
            {{ Form::label('barcode', 'Barcode') }}
            {{ Form::text('barcode', $product->barcode, ['class' => 'form-control', 'placeholder' => 'Place Barcode']) }}
        </div>    
        <div class="form-group">
            {{ Form::label('sale_price', 'Sale Price') }}
            {{ Form::text('sale_price', $product->sale_price, ['class' => 'form-control', 'placeholder' => 'Sale Price']) }}
        </div>  
        <div class="form-group">
            {{ Form::label('print_quantity', 'Print Quantity') }}
            {{ Form::number('print_quantity', $product->print_quantity, ['class' => 'form-control', 'placeholder' => 'Print Quantity']) }}
        </div>                 
        <div class="form-group">
                    
            @if($product->published == 1)
                Yes
            @else
                No
            @endif

            {{ Form::label('published', 'Published') }}
            {{ Form::select('published', [$product->published, 'Yes', 'No']) }}
        </div>
        {{ Form::hidden('_method', 'PUT') }}
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection