@extends('layouts.master')
@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon"><i class="pe-7s-wallet"></i></div>
            <div class="header-title">
                <h1>{{ __('Accounts Payable') }}</h1>
                <small>{{ __('Accounts Payable Module') }}</small>
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                    <li class="active">{{ __('Accounts Payable Module') }}</li>
                </ol>
            </div>
        </div> <!-- /. Content Header (Page header) -->
        <div class="row">
            <div class="col-xs-12 cols-sm-6 col-md-1 col lg-1">
                <div class="social-media-inner">
                    <ul class="social-media clearfix">
                        <li>
                            <a href="{{ route('vendor-invoices.index') }}">
                                <i class="fa fa-file-text-o"></i>
                                <p>{{ __('Invoices') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 cols-sm-6 col-md-1 col lg-1">
                <div class="social-media-inner">
                    <ul class="social-media clearfix">
                        <li>
                            <a href="{{ route('vendors.index') }}">
                                <i class="fa fa-vcard-o"></i>
                                <p>{{ __('Vendors') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
