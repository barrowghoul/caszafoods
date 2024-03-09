@extends('layouts.master')
@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon"><i class="pe-7s-notebook"></i></div>
            <div class="header-title">
                <h1>{{ __('Inventory') }}</h1>
                <small>{{ __('Inventorie´s Module') }}</small>
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                    <li class="active">{{ __('Inventory Module') }}</li>
                </ol>
            </div>
        </div> <!-- /. Content Header (Page header) -->
        <div class="row">
            <div class="col-xs-12 cols-sm-6 col-md-1 col lg-1">
                <div class="social-media-inner">
                    <ul class="social-media clearfix">
                        <li>
                            <a href="{{ route('warehouses.index') }}">
                                <i class="fa fa-building"></i>
                                <p>{{ __('Warehouses') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 cols-sm-6 col-md-1 col lg-1">
                <div class="social-media-inner">
                    <ul class="social-media clearfix">
                        <li>
                            <a href="{{ route('items.index') }}">
                                <i class="fa fa-th-large"></i>
                                <p>{{ __('Items') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 cols-sm-6 col-md-1 col lg-1">
                <div class="social-media-inner">
                    <ul class="social-media clearfix">
                        <li>
                            <a href="{{ route('requisitions.index') }}">
                                <i class="fa fa-cart-arrow-down"></i>
                                <p>{{ __('Requisitions') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 cols-sm-6 col-md-1 col lg-1">
                <div class="social-media-inner">
                    <ul class="social-media clearfix">
                        <li>
                            <a href="{{ route('families.index') }}">
                                <i class="fa fa-th"></i>
                                <p>{{ __('Families') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 cols-sm-6 col-md-1 col lg-1">
                <div class="social-media-inner">
                    <ul class="social-media clearfix">
                        <li>
                            <a href="{{ route('units.index') }}">
                                <i class="fa fa-superscript"></i>
                                <p>{{ __('Units') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
