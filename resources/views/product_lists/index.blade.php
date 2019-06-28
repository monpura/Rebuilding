@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-primary" href="/product_lists/create">Add Product</a>
                    <h3>All Products</h3>
                    @if(count($products) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Product Name</th>
                                <th>Product Number</th>
                                <th>Barcode</th>
                                <th>Category</th>
                                <th>Sale Price</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>                            
                            </tr>
                            @foreach($products as $product)
                                <tr>
                                    <td><a href="/product_lists/{{ $product->id }}"> {{ $product->product_name }}</a></td>
                                    <td>{!! $product->product_number !!}</td>
                                    <td>{!! $product->barcode !!}</td>
                                    <td>{!! $product->category_id !!}</td>
                                    <td>{!! $product->sale_price !!}</td>
                                    <td>
                                        @if($product->published == 1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td><a href="/product_lists/{{ $product->id }}/edit" class="btn btn-default">Edit</td>
                                    <td>
                                        {!! Form::open(['action' => ['ProductListsController@destroy', $product->id], 'method' => 'PSOT', 'class' => 'pull-right']) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>                            
                            @endforeach
                        </table>
                    @else
                        <p>You have no product</p>

                    @endif                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
