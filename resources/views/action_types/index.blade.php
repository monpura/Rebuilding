@extends('layouts.app')
@php
    $deleted_count  = 0;
    $all_count = 0;
@endphp
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
                    <a class="btn btn-default" href="/dashboard">Go Back</a><br>
                    <a class="btn btn-primary" href="/action_types/create">Add Action Type</a>
                    <h3>All Action Types</h3>
                    @if(count($action_types) > 0)
                    
                        @foreach($action_types as $del_count)
                            @if($del_count->deleted_at != null)
                                @php
                                    $deleted_count++;
                                @endphp
                            @elseif($del_count->deleted_at == null)
                                @php
                                    $all_count++;
                                @endphp                        
                            @endif    
                        @endforeach
                        <!--{{ count($action_types) }}-->
                        <a class="btn btn-default" href="/action_types">All({{ $all_count }})</a> | <a class="btn btn-default" href="/action_types/bin">Trashed({{ $deleted_count }})</a><br>
                  
                        <table class="table table-striped">
                            <tr>
                                <th>Action Type</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>                            
                            </tr>
                            @foreach($action_types as $action_type)
                                @if($action_type->deleted_at == null)

                                    <tr>
                                        <td>{{ $action_type->action_type }}</td>
                                        <td>
                                            @if($action_type->published == 1)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </td>
                                        <td><a href="/action_types/{{ $action_type->id }}/edit" class="btn btn-default">Edit</td>
                                        <td>
                                            {{ Form::open(['action' => ['ActionTypesController@destroy', $action_type->id], 'method' => 'PSOT', 'class' => 'pull-right']) }}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                            {{ Form::close() }}
                                        </td>    
                                    </tr>
                                @endif                           
                            @endforeach
                        </table>
                        {{ $action_types->links() }}
                    @else
                        <p>You have no Action Type</p>

                    @endif                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


