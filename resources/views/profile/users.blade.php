@extends('layouts.master')

@section('content')
    <div class="content">
        <div class="content-header">
            <div class="header-icon"><i class="pe-7s-user"></i></div>
            <div class="header-title">
                <h1>{{ __('Users') }}</h1>
                <small>{{ __('User´s Management') }}</small>
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                    <li class="active">{{ __('Users') }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-outline">{{ __('New User') }}</a>
                        </div>
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
