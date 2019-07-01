@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product Category Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-default" href="/dashboard">Go Back</a><br>
                    <a class="btn btn-primary" href="/categories/create">Add Product Category</a>
                    <h3>All Product Category</h3>
                    @if(count($product_categories) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>                            
                            </tr>
                            @foreach($product_categories as $product_category)
                                <tr>
                                    <td>{{ $product_category->category_name }}</a></td>
                                    <td>
                                        @if($product_category->published == 1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td><a href="/categories/{{ $product_category->id }}/edit" class="btn btn-default">Edit</td>
                                    <td>
                                        {!! Form::open(['action' => ['CategoriesController@destroy', $product_category->id], 'method' => 'PSOT', 'class' => 'pull-right']) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>                            
                            @endforeach
                        </table>
                        {{ $product_categories->links() }}
                    @else
                        <p>You have no Product Category</p>

                    @endif                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
