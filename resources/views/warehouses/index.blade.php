@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="content-header">
            <div class="header-icon"><i class="pe-7s-culture"></i></div>
            <div class="header-title">
                <h1>{{ __('Warehouses') }}</h1>
                <small>{{ __("warehouse's Information") }}</small>
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                    <li class="active">{{ __('Warehouses') }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a href="{{ route('warehouses.create') }}" class="btn btn-primary">{{ __('New Warehouse') }}</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        {{  $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
