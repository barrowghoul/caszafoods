@extends('layouts.master')

@section('content')
    <div class="conten">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon"><i class="pe-7s-news-paper"></i></div>
            <div class="header-title">
                <h1>{{ __('Requisitions') }}</h1>
                <small>{{ __('Material´s Requisition') }}</small>
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                    <li><a href="{{ route('requisitions.index') }}">{{ __('Requisitions') }}</a></li>
                    <li class="active">{{ __('Requisition') . " " . $requisition->id }}</li>
                </ol>
            </div>
        </div> <!-- /. Content Header (Page header) -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <div class="row">
                                <div class="col-md-12">
                                    @if($requisition->status == 'abierta')
                                        <button id="send" class="btn btn-primary" {{ $requisition->details->count() > 0 ? '' : 'disabled' }}>{{ __('Send') }}</button>
                                    @else
                                        <div class="alert alert-info">
                                            {{ __('Status:') . " " . strtoupper($requisition->status) }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group row" {{ $requisition->status <> 'abierta' ? 'hidden' : '' }}>
                            <label>{{ __('Select an item') }}</label>
                            <select name="item" id="item" class="search_test">
                                <option value="" selected disabled>{{ __('Select an item') }}</option>
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            @if($requisition->details->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Item') }}</th>
                                                <th>{{ __('Quantity') }}</th>
                                                <th>{{ __('Unit') }}</th>
                                                @if($requisition->status == 'abierta')
                                                    <th>{{ __('Delete') }}</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($requisition->details as $detail)
                                                <tr>
                                                    <td>{{ $detail->item->name }}</td>
                                                    <td>
                                                        <input type="number" name="{{ $detail->id }}" id="{{ $detail->id }}" class="form-control" value="{{ $detail->quantity }}" {{ $requisition->status <> 'abierta' ? 'disabled' : '' }}>
                                                    </td>
                                                    <td>{{ $detail->item->unit->name }}</td>
                                                    @if($requisition->status == 'abierta')
                                                        <td>
                                                            <a href="{{ route('requisition.details.destroy', $detail) }}" class="btn btn-danger btn-xs delete-detail"><i class="fa fa-trash-o"></i></a>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-info">
                                    {{ __('No items added yet') }}
                                </div>
                            @endif
                        </div>
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
        $(document).ready(function() {
            $('#item').change(function(){
                var selectedValue = $(this).val();
                console.log('Selected value: ' + selectedValue);
                $.ajax({
                    url: "{{ route('requisition.details.store') }}",
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        item_id: selectedValue,
                        requisition_id: "{{ $requisition->id }}"
                    },
                    success: function(response){
                        if(response.status ==='success'){
                            window.location.reload();
                        }else if(response.status === 'error'){
                            toastr.error(response.message);
                        }
                    }
                })
            });
            $('body').on('click', '.delete-detail', function(e){
                e.preventDefault();
                let url = $(this).attr('href');
                $.ajax({
                    url: url,
                    method: 'DELETE',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response){
                        if(response.status === 'success'){
                            window.location.reload();
                        }else if(response.status === 'error'){
                            toastr.error(response.message);
                        }
                    }
                })
            })
            $('#send').on('click', function(e){
                e.preventDefault();
                console.log({{ $requisition->id }});
                $.ajax({
                    url: "{{ route('requisitions.update', $requisition->id) }}",
                    method: 'PUT',
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response){
                        if(response.status === 'success'){
                            toastr.success(response.message);
                            window.location.reload();
                        }else if(response.status === 'error'){
                            toastr.error(response.message);
                        }
                    }
                })
            })
            $('input[type="number"]').change(function(){
                var newValue = $(this).val();
                var inputId = $(this).attr('id');
                $.ajax({
                    url: "{{ route('requisition.details.update') }}",
                    method: 'PUT',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: inputId,
                        quantity: newValue
                    },
                    success: function(response){
                        if(response.status === 'error'){
                            toastr.error(response.message);
                        }
                    }
                })

            })
        });
    </script>
@endpush
