@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $party_list->party_name }}</div>
                <div class="card-body">
                    <a class="btn btn-default" href="/party_lists">Go Back</a>
                    <hr/>
                        <div class="row">
                            <div class="col-md-4 text-md-right"> Email ID: </div>
                            <div class="col-md-6"> {{ $party_list->party_email }} </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 text-md-right"> Contact Person: </div>
                            <div class="col-md-6"> {{ $party_list->party_contact_person }} </div>
                        </div>    

                        <div class="row">
                            <div class="col-md-4 text-md-right"> Contact Number: </div>
                            <div class="col-md-6"> {{ $party_list->party_contact_number }} </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 text-md-right"> Code Number: </div>
                            <div class="col-md-6"> {{ $party_list->party_code }} </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 text-md-right"> Address: </div>
                            <div class="col-md-6"> {{ $party_list->party_address }} </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 text-md-right"> Trade Licence no.: </div>
                            <div class="col-md-6"> {{ $party_list->party_trade_licence_no }} </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 text-md-right"> VAT no.: </div>
                            <div class="col-md-6"> {{ $party_list->party_vat_no }} </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 text-md-right"> TIN no.: </div>
                            <div class="col-md-6"> {{ $party_list->party_tin_no }} </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 text-md-right"> Bank Name: </div>
                            <div class="col-md-6"> {{ $party_list->party_bank_name }} </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 text-md-right"> Bank Account no.: </div>
                            <div class="col-md-6"> {{ $party_list->party_bank_ac_no }} </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 text-md-right"> Cheque Routing no.: </div>
                            <div class="col-md-6"> {{ $party_list->party_cheque_routing_no }} </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 text-md-right"> Party Type: </div>
                            <div class="col-md-6"> {{ $party_list->party_type }} </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 text-md-right"> Status: </div>
                            <div class="col-md-6">
                                @if($party_list->published == 1)
                                    Yes
                                @else
                                    No
                                @endif
                            </div>
                        </div>
                    <hr/>
                    <small>Client From {{ $party_list->created_at }}</small>
                    <hr/>

                    @if(!Auth::guest())
                        @if(Auth::user()->id == $party_list->user_id)
                            <a class="btn btn-default" href="/party_lists/{{ $party_list->id }}/edit">Edit</a>
                            {!! Form::open(['action' => ['party_listsController@destroy', $party_list->id], 'method' => 'PSOT', 'class' => 'pull-right']) !!}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                            {!! Form::close() !!}
                        @endif
                    @endif
                 </div>
            </div>
        </div>
    </div>
</div>    
@endsection