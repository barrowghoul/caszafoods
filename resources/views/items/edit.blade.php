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
                    <li class="active">{{ $item->code }}</li>
                </ol>
            </div>
        </div> <!-- /. Content Header (Page header) -->
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">{{ __('General Information') }}</a></li>
                <li><a href="#tab2" data-toggle="tab">{{ __('Purchase Information') }}</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1">
                    <div class="panel-body">
                        <form action="{{ route('items.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <label>{{ __('Name') }}</label>
                                    <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <label for="">{{ __('Code') }}</label>
                                    <input type="text" class="form-control" name="code" value="{{ $item->code }}">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <label>{{ __('Is Service') }}</label>
                                    <select name="is_service" id="is_service" class="testselect1">
                                        <option value="0" @if($item->is_service == 0) selected @endif>{{ __('No') }}</option>
                                        <option value="1" @if($item->is_service == 1) selected @endif>{{ __('Yes') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <label for="">{{ __('Tax') }}</label>
                                    <select name="tax_id" class="testselect1">
                                        <option value="" disabled selected>{{ __('Select a tax') }}</option>
                                        @foreach($taxes as $tax)
                                            <option value="{{ $tax->id }}" @if($item->tax_id == $tax->id) selected @endif>{{ $tax->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <label for="">{{ __('IEPS') }}</label>
                                    <input type="number" class="form-control" name="ieps" value="{{ $item->ieps }}">
                                </div>
                            </div>
                            <div class="form-group row" id="cost_div" @if($item->is_service == 1) hidden @endif>
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <label>{{ __('Cost') }}</label>
                                    <input type="number" class="form-control" name="cost" value="{{ $item->cost }}">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <label for="on_hand" id="on_hand-label">{{ __('On Hand') }}</label>
                                    <input type="number" class="form-control" name="on_hand" id="on_hand" value="{{ $item->on_hand }}"/>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3" >
                                    <label for="min" id="min-label">{{ __('Min') }}</label>
                                    <input type="number" class="form-control" name="min" id="min" value="{{ $item->min }}">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <label for="max" id="max-label">{{ __('Max') }}</label>
                                    <input type="number" class="form-control" name="max" id="max" value="{{ $item->max }}">
                                </div>
                            </div>
                            <div class="form-group row" id="family_div" @if($item->is_service == 1) hidden @endif>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <label for="family_id" id="family_id-label">{{ __('Family') }}</label>
                                    <select name="family_id" id="family_id" class="testselect1">
                                        <option value="" disabled>{{ __('Select a family') }}</option>
                                        @foreach ($families as $family)
                                            <option value="{{ $family->id }}" @if($item->family_id == $family->id) selected @endif>{{ $family->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <label for="unit_id" id="unit_id-label">{{ __('Unit') }}</label>
                                    <select name="unit_id" id="unit_id" class="testselect1">
                                        <option value="" disabled>{{ __('Select a unit') }}</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}" @if($item->unit_id == $unit->id) selected @endif>{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <label for="unit_id" id="unit_id-label">{{ __('Warehouse') }}</label>
                                    <select name="warehouse_id" id="warehouse_id" class="testselect1">
                                        <option value="" disabled>{{ __('Select a unit') }}</option>
                                        @foreach ($warehouses as $warehouse)
                                            <option value="{{ $warehouse->id }}" @if($item->warehouse_id == $warehouse->id) selected @endif>{{ $warehouse->name }}</option>
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
                <div class="tab-pane fade" id="tab2">
                    <div class="panel-body">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/plugins/jquery.sumoselect/jquery.sumoselect.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.sumoselect/sumoselect-active.js') }}"></script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
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
