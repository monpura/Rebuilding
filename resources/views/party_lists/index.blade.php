@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Business Parties Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-default" href="/dashboard">Go Back</a><br>
                    <a class="btn btn-primary" href="/party_lists/create">Add New Party</a>
                    <h3>All Business Parties</h3>
                    @if(count($party_lists) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Category Name</th>
                                <th>Contact Person</th>
                                <th>Contact Number</th>
                                <th>Party Type</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>                            
                            </tr>
                            @foreach($party_lists as $party_list)
                                <tr>
                                    <td><a href="/party_lists/{{ $party_list->id }}"> {{ $party_list->party_name }}</a></td>
                                    <td>{{ $party_list->party_contact_person }}</td>
                                    <td>{{ $party_list->party_contact_number }}</td>
                                    <td>{{ $party_list->party_type }}</td>                                                                        
                                    <td>
                                        @if($party_list->published == 1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td><a href="/party_lists/{{ $party_list->id }}/edit" class="btn btn-default">Edit</td>
                                    <td>
                                        {!! Form::open(['action' => ['PartyListsController@destroy', $party_list->id], 'method' => 'PSOT', 'class' => 'pull-right']) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>                            
                            @endforeach
                        </table>
                        {{ $party_lists->links() }}
                    @else
                        <p>You have no Product Category</p>

                    @endif                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
