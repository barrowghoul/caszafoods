@extends('layouts.master')

@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon"><i class="pe-7s-user"></i></div>
            <div class="header-title">
                <h1>{{ __('Families') }}</h1>
                <small>{{ __('Family´s Information') }}</small>
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                    <li><a href="{{ route('families.index') }}">{{ __('Families') }}</a></li>
                    <li class="active">{{ $unit->name }}</li>
                </ol>
            </div>
        </div> <!-- /. Content Header (Page header) -->
        <div class="row">
            <div class="panel-body">
                <form action="{{ route('units.update', $unit->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <label>{{ __('Name') }}</label>
                            <input type="text" class="form-control" name="name" value="{{ $unit->name }}">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <label for="">{{ __('Symbol') }}</label>
                            <input type="text" class="form-control" name="symbol" value="{{ $unit->symbol }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
