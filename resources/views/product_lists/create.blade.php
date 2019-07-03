@extends('layouts.app')
@php
    use App\Category;
    use App\PartyList;
    $product_categories = array();
    $product_categories = Category::where('deleted', 0)->get(['id', 'category_name']);
    $party_lists = array();
    $party_lists = PartyList::where('deleted', 0)->get(['id', 'party_name']);
    //var_dump($party_lists);
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Product') }}</div>
                <div class="card-body">
                    {{ Form::open(['action' => 'ProductListsController@store', 'method' => 'PSOT', 'enctype' => 'multipart/form-data']) }}
                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category ID') }}</label>

                            <div class="col-md-6">
                                <select id="category_id" type="text" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" value="{{ old('category_id') }}" required autofocus>
                                    @foreach($product_categories as $product_category)
                                            <option value="{{$product_category['id']}}">{{$product_category['category_name']}}</option>
                                    @endForeach
                                </select>  

                                @if ($errors->has('category_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control{{ $errors->has('product_name') ? ' is-invalid' : '' }}" name="product_name" value="{{ old('product_name') }}" required>

                                @if ($errors->has('product_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('product_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label for="product_number" class="col-md-4 col-form-label text-md-right">{{ __('Product Number') }}</label>

                            <div class="col-md-6">
                                <input id="product_number" type="text" class="form-control{{ $errors->has('product_number') ? ' is-invalid' : '' }}" name="product_number" value="{{ old('product_number') }}" required>

                                @if ($errors->has('product_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('product_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label for="party_id" class="col-md-4 col-form-label text-md-right">{{ __('Party ID') }}</label>

                            <div class="col-md-6">
                                <select id="party_id" type="text" class="form-control{{ $errors->has('party_id') ? ' is-invalid' : '' }}" name="party_id" value="{{ old('party_id') }}" required>
                                    @foreach($party_lists as $party_list)
                                            <option value="{{$party_list['id']}}">{{$party_list['party_name']}}</option>
                                    @endForeach
                                </select>                                

                                @if ($errors->has('party_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('party_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label for="barcode" class="col-md-4 col-form-label text-md-right">{{ __('Barcode') }}</label>

                            <div class="col-md-6">
                                <input id="barcode" type="text" class="form-control{{ $errors->has('barcode') ? ' is-invalid' : '' }}" name="barcode" value="{{ old('barcode') }}" required>

                                @if ($errors->has('barcode'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('barcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label for="sale_price" class="col-md-4 col-form-label text-md-right">{{ __('Group Name') }}</label>

                            <div class="col-md-6">
                                <input id="sale_price" type="text" class="form-control{{ $errors->has('sale_price') ? ' is-invalid' : '' }}" name="sale_price" value="{{ old('sale_price') }}" required>

                                @if ($errors->has('sale_price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sale_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  
  
                        <div class="form-group row">
                            <label for="print_quantity" class="col-md-4 col-form-label text-md-right">{{ __('Print Quantity') }}</label>

                            <div class="col-md-6">
                                <input id="print_quantity" type="text" class="form-control{{ $errors->has('print_quantity') ? ' is-invalid' : '' }}" name="print_quantity" value="{{ old('print_quantity') }}" required>

                                @if ($errors->has('print_quantity'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('print_quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                
                        <div class="form-group row">
                            {{ Form::label('published', 'Published', ['class' => 'col-md-4 col-form-label text-md-right']) }}

                            <div class="col-md-6">
                                {{ Form::checkbox('published', 1) }}
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">        
                                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }} <a href="/product_lists" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>                                
                    {{ Form::close() }}
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection