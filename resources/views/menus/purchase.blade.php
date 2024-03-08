@extends('layouts.master')
@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon"><i class="pe-7s-shopbag"></i></div>
            <div class="header-title">
                <h1>{{ __('Purchases') }}</h1>
                <small>{{ __('Purchase´s Module') }}</small>
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                    <li class="active">{{ __('Pruchase Module') }}</li>
                </ol>
            </div>
        </div> <!-- /. Content Header (Page header) -->
        <div class="row">
            <div class="col-xs-12 cols-sm-6 col-md-1 col lg-1">
                <div class="social-media-inner">
                    <ul class="social-media clearfix">
                        <li>
                            <a href="{{ route('purchase-orders.index') }}">
                                <i class="fa fa-shopping-basket"></i>
                                <p>{{ __('P.O.') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 cols-sm-6 col-md-1 col lg-1">
                <div class="social-media-inner">
                    <ul class="social-media clearfix">
                        <li>
                            <a href="{{ route('receptions.index') }}">
                                <i class="fa fa-sign-in"></i>
                                <p>{{ __('Receptions') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
