@extends('layouts.master')

@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon"><i class="pe-7s-user"></i></div>
            <div class="header-title">
                <h1>{{ __('Vendor') }}</h1>
                <small>{{ __('Create new vendor') }}</small>
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                    <li><a href="{{ route('vendors.index') }}">{{ __('Vendors') }}</a></li>
                    <li class="active">{{ __('New') }}</li>
                </ol>
            </div>
        </div> <!-- /. Content Header (Page header) -->
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">{{ __('General Information') }}</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1">
                    <div class="panel-body">
                        <form action="{{ route('vendors.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <label>{{ __('Name') }}</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <label for="">{{ __('RFC') }}</label>
                                    <input type="text" class="form-control" name="tax_id" value="{{ old('tax_id') }}">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <label>{{ __('Phone') }}</label>
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <label for="">{{ __('Contact') }}</label>
                                    <input type="text" class="form-control" name="contact" value="{{ old('contact') }}">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <label for="">{{ __('Email') }}</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <label for="">{{ __('Delivery Date') }}</label>
                                    <input type="number" class="form-control" name="delivery_time" value="{{ old('delivery_time') }}">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <label for="">{{ __('Pay Date') }}</label>
                                    <input type="number" class="form-control" name="pay_days" value="{{ old('pay_days') }}">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <label for="">{{ __('Balance') }}</label>
                                    <input type="number" class="form-control" name="balance" value="0" disabled>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <label for="">{{ __('Total Purchases') }}</label>
                                    <input type="number" class="form-control" name="total" value="0" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <label for="">{{ __('Address') }}</label>
                                    <textarea class="form-control" name="address" rows="3">{{ old('address') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
