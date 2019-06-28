@extends('layouts.app')

@section('content')
    <h1>Add Product</h1>
    {{ Form::open(['action' => 'ProductListsController@store', 'method' => 'PSOT', 'enctype' => 'multipart/form-data']) }}
        <div class="form-group">
            {{ Form::label('category_id', 'Category ID') }}
            {{ Form::select('category_id', array(
                '' => '- Select -',
                0 => 'ctg1',
                1 => 'ctg2',
                2 => 'ctg3',
                )) }}
        </div>
        <div class="form-group">
            {{ Form::label('product_name', 'Product Name') }}
            {{ Form::text('product_name', '', ['class' => 'form-control', 'placeholder' => 'Product Name']) }}
        </div>
        <div class="form-group">
            {{ Form::label('product_number', 'Product Number') }}
            {{ Form::text('product_number', '', ['class' => 'form-control', 'placeholder' => 'Product Number']) }}
        </div>
        <div class="form-group">
            {{ Form::label('party_id', 'Party ID') }}
            {{ Form::select('party_id', array(
                '' => '- Select -',
                0 => 'ctg1',
                1 => 'ctg2',
                2 => 'ctg3',
                )) }}
        </div>
        <div class="form-group">
            {{ Form::label('barcode', 'Barcode') }}
            {{ Form::text('barcode', '', ['class' => 'form-control', 'placeholder' => 'Place Barcode']) }}
        </div>    
        <div class="form-group">
            {{ Form::label('sale_price', 'Sale Price') }}
            {{ Form::text('sale_price', '', ['class' => 'form-control', 'placeholder' => 'Sale Price']) }}
        </div>  
        <div class="form-group">
            {{ Form::label('print_quantity', 'Print Quantity') }}
            {{ Form::number('print_quantity', '', ['class' => 'form-control', 'placeholder' => 'Print Quantity']) }}
        </div>                 
        <div class="form-group">
            {{ Form::label('published', 'Published') }}
            {{ Form::hidden('published', 0) }}
            {{ Form::checkbox('published', 1) }}
        </div>
          {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection