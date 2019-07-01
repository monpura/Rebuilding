@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Client') }}</div>
                <div class="card-body">
                    {{ Form::open(['action' => ['PartyListsController@update', $party_list->id], 'method' => 'PSOT', 'enctype' => 'multipart/form-data']) }}
                        @csrf
                        <div class="form-group row">
                            <label for="party_name" class="col-md-4 col-form-label text-md-right">{{ __('Party Name') }}</label>

                            <div class="col-md-6">
                                <input id="party_name" type="text" class="form-control{{ $errors->has('party_name') ? ' is-invalid' : '' }}" name="party_name" value="{{ $party_list->party_name }}" required autofocus>

                                @if ($errors->has('party_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('party_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="party_email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="party_email" type="text" class="form-control{{ $errors->has('party_email') ? ' is-invalid' : '' }}" name="party_email" value="{{ $party_list->party_email }}" required autofocus>

                                @if ($errors->has('party_email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('party_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="party_contact_person" class="col-md-4 col-form-label text-md-right">{{ __('Contact Person') }}</label>

                            <div class="col-md-6">
                                <input id="party_contact_person" type="text" class="form-control{{ $errors->has('party_contact_person') ? ' is-invalid' : '' }}" name="party_contact_person" value="{{ $party_list->party_contact_person }}" required autofocus>

                                @if ($errors->has('party_contact_person'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('party_contact_person') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="party_contact_number" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                            <div class="col-md-6">
                                <input id="party_contact_number" type="text" class="form-control{{ $errors->has('party_contact_number') ? ' is-invalid' : '' }}" name="party_contact_number" value="{{ $party_list->party_contact_number }}" required autofocus>

                                @if ($errors->has('party_contact_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('party_contact_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="party_code" class="col-md-4 col-form-label text-md-right">{{ __('Code Number') }}</label>

                            <div class="col-md-6">
                                <input id="party_code" type="text" class="form-control{{ $errors->has('party_code') ? ' is-invalid' : '' }}" name="party_code" value="{{ $party_list->party_code }}" required autofocus>

                                @if ($errors->has('party_code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('party_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="party_address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="party_address" type="text" class="form-control{{ $errors->has('party_address') ? ' is-invalid' : '' }}" name="party_address" value="{{ $party_list->party_address }}" required autofocus>

                                @if ($errors->has('party_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('party_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="party_trade_licence_no" class="col-md-4 col-form-label text-md-right">{{ __('Trade Licence no.') }}</label>

                            <div class="col-md-6">
                                <input id="party_trade_licence_no" type="text" class="form-control{{ $errors->has('party_trade_licence_no') ? ' is-invalid' : '' }}" name="party_trade_licence_no" value="{{ $party_list->party_trade_licence_no }}" required autofocus>

                                @if ($errors->has('party_trade_licence_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('party_trade_licence_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="party_vat_no" class="col-md-4 col-form-label text-md-right">{{ __('VAT no.') }}</label>

                            <div class="col-md-6">
                                <input id="party_vat_no" type="text" class="form-control{{ $errors->has('party_vat_no') ? ' is-invalid' : '' }}" name="party_vat_no" value="{{ $party_list->party_vat_no }}" required autofocus>

                                @if ($errors->has('party_vat_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('party_vat_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="party_tin_no" class="col-md-4 col-form-label text-md-right">{{ __('TIN no.') }}</label>

                            <div class="col-md-6">
                                <input id="party_tin_no" type="text" class="form-control{{ $errors->has('party_tin_no') ? ' is-invalid' : '' }}" name="party_tin_no" value="{{ $party_list->party_tin_no }}" required autofocus>

                                @if ($errors->has('party_tin_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('party_tin_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="party_bank_name" class="col-md-4 col-form-label text-md-right">{{ __('Bank Name') }}</label>

                            <div class="col-md-6">
                                <input id="party_bank_name" type="text" class="form-control{{ $errors->has('party_bank_name') ? ' is-invalid' : '' }}" name="party_bank_name" value="{{ $party_list->party_bank_name }}" required autofocus>

                                @if ($errors->has('party_bank_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('party_bank_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="party_bank_ac_no" class="col-md-4 col-form-label text-md-right">{{ __('Bank Account no.') }}</label>

                            <div class="col-md-6">
                                <input id="party_bank_ac_no" type="text" class="form-control{{ $errors->has('party_bank_ac_no') ? ' is-invalid' : '' }}" name="party_bank_ac_no" value="{{ $party_list->party_bank_ac_no }}" required autofocus>

                                @if ($errors->has('party_bank_ac_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('party_bank_ac_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="party_cheque_routing_no" class="col-md-4 col-form-label text-md-right">{{ __('Cheque Routing no.') }}</label>

                            <div class="col-md-6">
                                <input id="party_cheque_routing_no" type="text" class="form-control{{ $errors->has('party_cheque_routing_no') ? ' is-invalid' : '' }}" name="party_cheque_routing_no" value="{{ $party_list->party_cheque_routing_no }}" required autofocus>

                                @if ($errors->has('party_cheque_routing_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('party_cheque_routing_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="party_type" class="col-md-4 col-form-label text-md-right">{{ __('Party Type') }}</label>

                            <div class="col-md-6">
                                <input id="party_type" type="text" class="form-control{{ $errors->has('party_type') ? ' is-invalid' : '' }}" name="party_type" value="{{ $party_list->party_type }}" required autofocus>

                                @if ($errors->has('party_type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('party_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('published', 'Published', ['class' => 'col-md-4 col-form-label text-md-right']) }}

                            <div class="col-md-6">
                                @if($party_list->published == 1)
                                    {{ Form::checkbox('published', 1, old('published', true)) }}
                                @else
                                    {{ Form::checkbox('published', 1, old('published', false)) }}        
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">     
                                {{ Form::hidden('_method', 'PUT') }}
                                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }} <a href="/party_lists" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>                                
                    {{ Form::close() }}
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection