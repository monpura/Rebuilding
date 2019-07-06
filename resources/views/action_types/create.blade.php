@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Action Type') }}</div>
                <div class="card-body">
                    {{ Form::open(['action' => 'ActionTypesController@store', 'method' => 'PSOT', 'enctype' => 'multipart/form-data']) }}
                        @csrf
                        <div class="form-group row">
                            <label for="action_type" class="col-md-4 col-form-label text-md-right">{{ __('Action Type') }}</label>

                            <div class="col-md-6">
                                <input id="action_type" type="text" class="form-control{{ $errors->has('action_type') ? ' is-invalid' : '' }}" name="action_type" value="{{ old('action_type') }}" required>

                                @if ($errors->has('action_type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('action_type') }}</strong>
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
                                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }} <a href="/action_types" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>                                
                    {{ Form::close() }}
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection