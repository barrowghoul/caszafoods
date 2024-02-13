@extends('layouts.master')
@section('content')
<div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="header-icon"><i class="pe-7s-user"></i></div>
        <div class="header-title">
            <h1>{{ __('Vendors Invoices') }}</h1>
            <small>{{ __('List of vendors invoices') }}</small>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                <li class="active">{{ __('Vendors Invoices') }}</li>
            </ol>
        </div>
    </div> <!-- /. Content Header (Page header) -->
    <div class="row">
        {{ $dataTable->table() }}
    </div>
</div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
