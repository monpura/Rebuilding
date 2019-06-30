@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Group Access') }}</div>
                <div class="card-body">
                    {{ Form::open(['action' => 'UserGroupsController@store', 'method' => 'PSOT', 'enctype' => 'multipart/form-data']) }}
                        @csrf
                        <div class="form-group row">
                            <label for="group_name" class="col-md-4 col-form-label text-md-right">{{ __('Group Name') }}</label>

                            <div class="col-md-6">
                                <input id="group_name" type="text" class="form-control{{ $errors->has('group_name') ? ' is-invalid' : '' }}" name="group_name" value="{{ old('group_name') }}" required autofocus>

                                @if ($errors->has('group_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('group_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="group_access_link" class="col-md-4 col-form-label text-md-right">{{ __('Group Access') }}</label>

                            <div class="col-md-6">
                                <input type="checkbox" name="group_access_link[]" value="1" />
                                <label for="group_access_link[]" class="col-md-4 col-form-label">{{ __('Access 1') }}</label><br>
                                <input type="checkbox" name="group_access_link[]" value="2" />
                                <label for="group_access_link[]" class="col-md-4 col-form-label">{{ __('Access 2') }}</label><br>
                                <input type="checkbox" name="group_access_link[]" value="3" />
                                <label for="group_access_link[]" class="col-md-4 col-form-label">{{ __('Access 3') }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('published', 'Published', ['class' => 'col-md-4 col-form-label text-md-right']) }}

                            <div class="col-md-6">
                                {{ Form::hidden('published', 0) }}
                                {{ Form::checkbox('published', 1) }} <br>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">     
                                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }} <a href="/user_groups" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>                                
                    {{ Form::close() }}
                 </div>
            </div>
        </div>
    </div>
</div>    
@endsection