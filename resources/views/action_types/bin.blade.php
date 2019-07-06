@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Action Type Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-default" href="/action_types">Go Back</a><br>
                    <h3>Deleted Action Types</h3>
                    @if(count($deleted_action_types) > 0)
                        <p>Trashed({{ count($deleted_action_types) }})</p>
                        <table class="table table-striped">
                            <tr>
                                <th>Action Type</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            @foreach($deleted_action_types as $deleted_action_type)
                                <tr>
                                    <td>{{ $deleted_action_type->action_type }}</td>
                                    <td>
                                        @if($deleted_action_type->published == 1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td>
                                        {{ Form::open(['action' => ['ActionTypesController@restore', $deleted_action_type->id], 'method' => 'PSOT', 'enctype' => 'multipart/form-data']) }}
                                            {{ Form::hidden('_method', 'GET') }}
                                            {{ Form::submit('Restore', ['class' => 'btn btn-primary']) }}
                                        {{ Form::close() }}
                                </tr>                            
                            @endforeach
                        </table>
                        {{ $deleted_action_types->links() }}
                    @else
                        <p>You have no Action Type</p>

                    @endif                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
