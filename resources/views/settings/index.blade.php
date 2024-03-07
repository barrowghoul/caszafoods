@extends('layouts.master')
@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon"><i class="pe-7s-user"></i></div>
            <div class="header-title">
                <h1>{{ __('Items') }}</h1>
                <small>{{ __('Item´s Information') }}</small>
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                    <li class="active">{{ __('Settings') }}</li>
                </ol>
            </div>
        </div> <!-- /. Content Header (Page header) -->
        <div class="row">
            <div class="col-xs-12 cols-sm-6 col-md-1 col lg-1">
                <div class="social-media-inner">
                    <ul class="social-media clearfix">
                        <li>
                            <a href="{{ route('roles.index') }}">
                                <i class="fa fa-gear"></i>
                                <p>{{ __('General') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 cols-sm-6 col-md-1 col lg-1">
                <div class="social-media-inner">
                    <ul class="social-media clearfix">
                        <li>
                            <a href="{{ route('roles.index') }}">
                                <i class="fa fa-vcard-o"></i>
                                <p>{{ __('Roles') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 cols-sm-6 col-md-1 col lg-1">
                <div class="social-media-inner">
                    <ul class="social-media clearfix">
                        <li>
                            <a href="{{ route('roles.index') }}">
                                <i class="fa fa-group"></i>
                                <p>{{ __('Users') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 cols-sm-6 col-md-1 col lg-1">
                <div class="social-media-inner">
                    <ul class="social-media clearfix">
                        <li>
                            <a href="{{ route('settings.notifications') }}">
                                <i class="fa fa-bell"></i>
                                <p>{{ __('Notifications') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
