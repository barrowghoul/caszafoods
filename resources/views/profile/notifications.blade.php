@extends('layouts.master')
@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon"><i class="pe-7s-mail-open"></i></div>
            <div class="header-title">
                <h1>{{ __('My Notifications') }}</h1>
                <small>{{ __('See all your latest notifications') }}</small>
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                    <li class="active">{{ __('Notifications') }}</li>
                </ol>
            </div>
        </div> <!-- /. Content Header (Page header) -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel pane-bd">
                    <div class="panel-heading">
                        <a href="{{ route('notifications.read.all') }}" class="btn btn-primary">{{ __('Mark all as read') }}</a>
                    </div>
                    <div class="panel-body">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    
@endpush
