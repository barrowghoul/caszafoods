@extends('layouts.master')

@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon"><i class="pe-7s-user"></i></div>
            <div class="header-title">
                <h1>{{ __('Vendor') }}</h1>
                <small>{{ __('Edit vendor´s information') }}</small>
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                    <li><a href="{{ route('vendors.index') }}">{{ __('Vendors') }}</a></li>
                    <li class="active">{{ $vendor->name }}</li>
                </ol>
            </div>
        </div> <!-- /. Content Header (Page header) -->
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">{{ __('General Information') }}</a></li>
                <li><a href="#tab2" data-toggle="tab">{{ __('Purchase Information') }}</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1">
                    <div class="panel-body">
                        <form action="{{ route('vendors.update', $vendor) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <label>{{ __('Name') }}</label>
                                    <input type="text" class="form-control" name="name" value="{{ $vendor->name }}">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <label for="">{{ __('RFC') }}</label>
                                    <input type="text" class="form-control" name="tax_id" value="{{ $vendor->tax_id }}">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <label>{{ __('Phone') }}</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $vendor->phone }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <label for="">{{ __('Contact') }}</label>
                                    <input type="text" class="form-control" name="contact" value="{{ $vendor->contact }}">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <label for="">{{ __('Email') }}</label>
                                    <input type="email" class="form-control" name="email" value="{{ $vendor->email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <label for="">{{ __('Delivery Date') }}</label>
                                    <input type="number" class="form-control" name="delivery_time" value="{{ $vendor->delivery_time }}">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <label for="">{{ __('Pay Date') }}</label>
                                    <input type="number" class="form-control" name="pay_days" value="{{ $vendor->pay_days }}">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <label for="">{{ __('Balance') }}</label>
                                    <input type="number" class="form-control" name="balance" value="{{ $vendor->balance }}">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <label for="">{{ __('Total Purchases') }}</label>
                                    <input type="number" class="form-control" name="total" value="{{ $vendor->total }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <label for="">{{ __('Address') }}</label>
                                    <textarea class="form-control" name="address" rows="3">{{ $vendor->address }}</textarea>
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
