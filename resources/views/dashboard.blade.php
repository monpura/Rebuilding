@extends('layouts.app')

@section('content')
<div class="container" ng-controller="TaskController">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-primary" href="/posts/create">Create Post</a> <a class="btn btn-primary" href="/product_lists">Product Manager</a> <a class="btn btn-primary" href="/user_groups">User Manager</a> <a class="btn btn-primary" href="/categories">Product Category</a> <a class="btn btn-primary" href="/party_lists">Party Manager</a><br><br>
                    <a class="btn btn-primary" href="/action-types">Action Types Manager</a>
                    <h3>Your Blog Posts</h3>
                    @if(count($posts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td><a href="/posts/{{ $post->id }}/edit" class="btn btn-default">Edit</td>
                                    <td>
                                        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'PSOT', 'class' => 'pull-right']) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>                            
                            @endforeach
                        </table>
                    @else
                        <p>You have no Post</p>

                    @endif                    
                </div>
            </div>
        </div>
    </div>



<!-- Test Angular -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="card-header">Task Dashboard</div>                    
                    <div class="panel-heading">
                        <a class="btn btn-default" href="/dashboard">Go Back</a><br>
                        <button class="btn btn-primary btn-xs pull-right" ng-click="initTask()">Add Task</button>                    
                        <h3>All Action Type</h3>
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

<div class="container" ng-controller="ActionTypeController">
<!-- Action Type Angular -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="card-header">Action Type Dashboard</div>                    
                    <div class="panel-heading">
                        <a class="btn btn-default" href="/dashboard">Go Back</a><br>
                        <button class="btn btn-primary btn-xs pull-right" ng-click="initActionType()">Add Action Type</button>                    
                        <h3>All Action Type</h3>
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif


                        <table class="table table-bordered table-striped" ng-if="action_types.length > 0">
                            <tr>
                                <th>Action Type</th>
                                <th>Status</th>
                                <th>Operations</th>
                            </tr>
                            <tr ng-repeat="(index, action_type) in action_types">
                                <td>@{{ action_type.action_type }}</td>
                                <td ng-if="action_type.published == 1">Yes</td>
                                <td ng-if="action_type.published == 0">No</td>
                                <td>
                                    <button class="btn btn-success btn-xs" ng-click="initEditActionType(index)">Edit</button>
                                    <button class="btn btn-danger btn-xs" ng-click="deleteActionType(index)" >Delete</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<!-- Create modal -->
          <div class="modal fade" tabindex="-1" role="dialog" id="add_new_action_type">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Action Type</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger" ng-if="errors.length > 0">
                            <ul>
                                <li ng-repeat="error in errors">@{{ error }}</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label for="action_type">Action Type</label>
                            <input type="text" name="action_type" class="form-control" ng-model="action_type.action_type">
                        </div>
                        <div class="form-group">
                            <label for="published">Published</label>
                            <input type="checkbox" name="published" class="form-control" ng-model="action_type.published" value="1" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" ng-click="addActionType()">Submit</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->        
<!-- end of create modal -->
<!-- Edit modal -->
         <div class="modal fade" tabindex="-1" role="dialog" id="edit_action_type">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update Action Type</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger" ng-if="errors.length > 0">
                            <ul>
                                <li ng-repeat="error in errors">@{{ error }}</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label for="action_type">Action Type</label>
                            <input type="text" name="action_type" class="form-control" ng-model="edit_action_type.action_type">
                        </div>
                        <div class="form-group">
                            <label for="published">Published</label>
                            <input type="checkbox" name="published" class="form-control" ng-model="edit_action_type.published" value="@{{ edit_action_type.published }}" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" ng-click="updateActionType()">Submit</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
<!-- end of edit modal -->
<!--End Angular -->

</div>

@endsection
