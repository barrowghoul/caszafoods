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
                    <li><a href="{{ route('items.index') }}">{{ __('Items') }}</a></li>
                    <li class="active">{{ __('New Item') }}</li>
                </ol>
            </div>
        </div> <!-- /. Content Header (Page header) -->
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">{{ __('General Information') }}</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1">
                    <div class="panel-body">
                        <form action="{{ route('items.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <label>{{ __('Name') }}</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <label for="">{{ __('Code') }}</label>
                                    <input type="text" class="form-control" name="code" value="{{ old('code') }}">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <label>{{ __('Is Service') }}</label>
                                    <select name="is_service" id="is_service" class="testselect1">
                                        <option value="" disabled selected>{{ __('Select an option') }}</option>
                                        <option value="0" {{ old('is_service') == 'No' ? 'selected' : '' }}>{{ __('No') }}</option>
                                        <option value="1" {{ old('is_service') == 'Si' ? 'selected' : '' }}>{{ __('Yes') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <label for="">{{ __('Tax') }}</label>
                                    <select name="tax_id" class="testselect1">
                                        <option value="" disabled selected>{{ __('Select a tax') }}</option>
                                        @foreach($taxes as $tax)
                                            <option value="{{ $tax->id }}">{{ $tax->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <label for="">{{ __('IEPS') }}</label>
                                    <input type="number" class="form-control" name="ieps" value="{{ old('ieps') }}">
                                </div>
                            </div>
                            <div class="form-group row" id="cost_div">
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <label>{{ __('Cost') }}</label>
                                    <input type="number" class="form-control" name="cost" value="{{ old('cost') }}" {{ auth()->user()->hasRole('Administrador') ? '' : 'disabled' }}>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <label for="on_hand" id="on_hand-label">{{ __('On Hand') }}</label>
                                    <input type="number" class="form-control" name="on_hand" id="on_hand" value="{{ old('on_hand') }}" {{ auth()->user()->hasRole('Administrador') ? '' : 'disabled' }}/>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3" >
                                    <label for="min" id="min-label">{{ __('Min') }}</label>
                                    <input type="number" class="form-control" name="min" id="min" value="{{ old('min') }}">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <label for="max" id="max-label">{{ __('Max') }}</label>
                                    <input type="number" class="form-control" name="max" id="max" value="{{ old('max') }}">
                                </div>
                            </div>
                            <div class="form-group row" id="family_div">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <label for="family_id" id="family_id-label">{{ __('Family') }}</label>
                                    <select name="family_id" id="family_id" class="testselect1">
                                        <option value="" disabled>{{ __('Select a family') }}</option>
                                        @foreach ($families as $family)
                                            <option value="{{ $family->id }}">{{ $family->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <label for="unit_id" id="unit_id-label">{{ __('Unit') }}</label>
                                    <select name="unit_id" id="unit_id" class="testselect1">
                                        <option value="" disabled>{{ __('Select a unit') }}</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/plugins/jquery.sumoselect/jquery.sumoselect.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.sumoselect/sumoselect-active.js') }}"></script>
    <script>
        var $selectBox = $('#is_service');
        $selectBox.on('change', function() {
            if ($selectBox.val() == 1) {
                $('#cost_div').hide();
                $('#family_div').hide();

            } else {
                $('#cost_div').show();
                $('#family_div').show();
            }
        });
    </script>
@endpush
