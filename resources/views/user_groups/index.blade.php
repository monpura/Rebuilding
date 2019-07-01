@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Access Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-default" href="/dashboard">Go Back</a><br>
                    <a class="btn btn-primary" href="/user_groups/create">Add User Group</a>
                    <h3>All User Groups</h3>
                    @if(count($usergroups) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Group Name</th>
                                <th>Group Access</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>                            
                            </tr>
                            @foreach($usergroups as $usergroup)
                                <tr>
                                    <td>{{ $usergroup->group_name }}</a></td>
                                    <td>{{ $usergroup->group_access_link }}</td>
                                    <td>
                                        @if($usergroup->published == 1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td><a href="/user_groups/{{ $usergroup->id }}/edit" class="btn btn-default">Edit</td>
                                    <td>
                                        {!! Form::open(['action' => ['UserGroupsController@destroy', $usergroup->id], 'method' => 'PSOT', 'class' => 'pull-right']) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>                            
                            @endforeach
                        </table>
                        {{ $usergroups->links() }}
                    @else
                        <p>You have no usergroup</p>

                    @endif                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
