@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Party Profile') }}</div>
                <div class="card-body">
                    {{ Form::open(['action' => 'PartyListsController@store', 'method' => 'PSOT', 'enctype' => 'multipart/form-data']) }}
                        @csrf
                        <div class="form-group row">
                            <label for="party_name" class="col-md-4 col-form-label text-md-right">{{ __('Party Name') }}</label>

                            <div class="col-md-6">
                                <input id="party_name" type="text" class="form-control{{ $errors->has('party_name') ? ' is-invalid' : '' }}" name="party_name" value="{{ old('party_name') }}" required autofocus>

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
                                <input id="party_email" type="text" class="form-control{{ $errors->has('party_email') ? ' is-invalid' : '' }}" name="party_email" value="{{ old('party_email') }}" required>

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
                                <input id="party_contact_person" type="text" class="form-control{{ $errors->has('party_contact_person') ? ' is-invalid' : '' }}" name="party_contact_person" value="{{ old('party_contact_person') }}" required>

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
                                <input id="party_contact_number" type="text" class="form-control{{ $errors->has('party_contact_number') ? ' is-invalid' : '' }}" name="party_contact_number" value="{{ old('party_contact_number') }}" required>

                                @if ($errors->has('party_contact_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('party_contact_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="party_code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>

                            <div class="col-md-6">
                                <input id="party_code" type="text" class="form-control{{ $errors->has('party_code') ? ' is-invalid' : '' }}" name="party_code" value="{{ old('party_code') }}" required autofocus>

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
                                <input id="party_address" type="text" class="form-control{{ $errors->has('party_address') ? ' is-invalid' : '' }}" name="party_address" value="{{ old('party_address') }}" required>

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
                                <input id="party_trade_licence_no" type="text" class="form-control{{ $errors->has('party_trade_licence_no') ? ' is-invalid' : '' }}" name="party_trade_licence_no" value="{{ old('party_trade_licence_no') }}" required>

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
                                <input id="party_vat_no" type="text" class="form-control{{ $errors->has('party_vat_no') ? ' is-invalid' : '' }}" name="party_vat_no" value="{{ old('party_vat_no') }}" required>

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
                                <input id="party_tin_no" type="text" class="form-control{{ $errors->has('party_tin_no') ? ' is-invalid' : '' }}" name="party_tin_no" value="{{ old('party_tin_no') }}" required>

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
                                <input id="party_bank_name" type="text" class="form-control{{ $errors->has('party_bank_name') ? ' is-invalid' : '' }}" name="party_bank_name" value="{{ old('party_bank_name') }}" required>

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
                                <input id="party_bank_ac_no" type="text" class="form-control{{ $errors->has('party_bank_ac_no') ? ' is-invalid' : '' }}" name="party_bank_ac_no" value="{{ old('party_bank_ac_no') }}" required>

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
                                <input id="party_cheque_routing_no" type="text" class="form-control{{ $errors->has('party_cheque_routing_no') ? ' is-invalid' : '' }}" name="party_cheque_routing_no" value="{{ old('party_cheque_routing_no') }}" required>

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
                                <input id="party_type" type="text" class="form-control{{ $errors->has('party_type') ? ' is-invalid' : '' }}" name="party_type" value="{{ old('party_type') }}" required autofocus>

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
                                {{ Form::checkbox('published', 1) }} <br>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">     
                                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }} <a href="/party_lists" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>                                
                    {{ Form::close() }}
                 </div>
            </div>
        </div>
    </div>
</div>    
@endsection