@extends('layouts.master')
@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon"><i class="pe-7s-close"></i></div>
            <div class="header-title">
                <h1>Blank page</h1>
                <small>it all starts here</small>
                <ol class="breadcrumb">
                    <li>{{ __('Home') }}</li>
                    <li class="active">{{ __('Dashboard') }}</li>
                </ol>
            </div>
        </div> <!-- /. Content Header (Page header) -->
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>This is page content</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <p>You can create here any grid layout you want. And any variation layout you imagine:) Check out
                            main dashboard and other site. It use many different layout. </p>
                    </div>
                    <div class="panel-footer">
                        This is standard panel footer
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
