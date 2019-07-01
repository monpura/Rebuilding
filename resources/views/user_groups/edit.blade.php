@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit User Group') }}</div>
                <div class="card-body">
                    {{ Form::open(['action' => ['UserGroupsController@update', $usergroup->id], 'method' => 'PSOT', 'enctype' => 'multipart/form-data']) }}
                        @csrf
                        <div class="form-group row">
                            <label for="group_name" class="col-md-4 col-form-label text-md-right">{{ __('Group Name') }}</label>

                            <div class="col-md-6">
                                <input id="group_name" type="text" class="form-control{{ $errors->has('group_name') ? ' is-invalid' : '' }}" name="group_name" value="{{ $usergroup->group_name }}" required autofocus>

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
                                {{$usergroup->group_access_link}}
                                @php 
                                    $group_access = explode(',', $usergroup->group_access_link);
                                    // view result using var_dump
                                    //print_r($group_access);
                                @endphp

                                @foreach($group_access as $access)
                                    <!--{{ $access }}<br>-->
                                    @if($access == 1)
                                        {{ Form::checkbox('group_access_link[]', $access, old('group_access_link[]', true)) }}
                                        {{ Form::hidden('group_access_link[]', 0) }}
                                        {{ Form::hidden('group_access_link[]', 1) }}
                                    @else
                                        {{ Form::hidden('group_access_link[]', 0) }}
                                        {{ Form::checkbox('group_access_link[]', 1) }}     
                                    @endif
                                    @if($access == 2)
                                        {{ Form::checkbox('group_access_link[]', $access, old('group_access_link[]', true)) }}
                                        {{ Form::hidden('group_access_link[]', 0) }}
                                        {{ Form::hidden('group_access_link[]', 1) }}
                                    @else
                                        {{ Form::hidden('group_access_link[]', 0) }}
                                        {{ Form::checkbox('group_access_link[]', 1) }}     
                                    @endif                                    
                                @endforeach
                                <!--<input type="checkbox" name="group_access_link[]" value="1" />
                                <label for="group_access_link[]" class="col-md-4 col-form-label">{{ __('Access 1') }}</label><br>
                                <input type="checkbox" name="group_access_link[]" value="2" />
                                <label for="group_access_link[]" class="col-md-4 col-form-label">{{ __('Access 2') }}</label><br>
                                <input type="checkbox" name="group_access_link[]" value="3" />
                                <label for="group_access_link[]" class="col-md-4 col-form-label">{{ __('Access 3') }}</label>-->
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('published', 'Published', ['class' => 'col-md-4 col-form-label text-md-right']) }}

                            <div class="col-md-6">
                                @if($usergroup->published == 1)
                                    {{ Form::checkbox('published', $usergroup->published, old('published', true)) }}
                                    {{ Form::hidden('published', 0) }}
                                    {{ Form::hidden('published', 1) }}
                                @else
                                    {{ Form::hidden('published', 0) }}
                                    {{ Form::checkbox('published', 1) }}         
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">     
                                {{ Form::hidden('_method', 'PUT') }}
                                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }} <a href="/user_groups" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>                                
                    {{ Form::close() }}
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection