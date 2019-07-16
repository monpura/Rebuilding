@extends('layouts.app')
@php
    $deleted_count  = 0;
    $all_count = 0;
@endphp
@section('content')
<div class="container" ng-controller="ActionTypesController">
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
<!-- Test Angular -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button class="btn btn-primary btn-xs pull-right" ng-click="initTask()">Add Task</button>
                        Task
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif


                        <table class="table table-bordered table-striped" ng-if="tasks.length > 0">
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            <tr ng-repeat="(index, task) in tasks">
                                <td>
                                    @{{ index + 1 }}
                                </td>
                                <td>@{{ task.name }}</td>
                                <td>@{{ task.description }}</td>
                                <td>
                                    <button class="btn btn-success btn-xs" ng-click="initEdit(index)">Edit</button>
                                    <button class="btn btn-danger btn-xs" ng-click="deleteTask(index)" >Delete</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<!-- Create modal -->
          <div class="modal fade" tabindex="-1" role="dialog" id="add_new_task">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Task</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger" ng-if="errors.length > 0">
                            <ul>
                                <li ng-repeat="error in errors">@{{ error }}</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" ng-model="task.name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" rows="5" class="form-control"
                                      ng-model="task.description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" ng-click="addTask()">Submit</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->        
<!-- end of create modal -->
<!-- Edit modal -->
         <div class="modal fade" tabindex="-1" role="dialog" id="edit_task">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update Task</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger" ng-if="errors.length > 0">
                            <ul>
                                <li ng-repeat="error in errors">@{{ error }}</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" ng-model="edit_task.name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" rows="5" class="form-control"
                                      ng-model="edit_task.description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" ng-click="updateTask()">Submit</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
<!-- end of edit modal -->
<!--End Angular -->
    
</div>
@endsection


