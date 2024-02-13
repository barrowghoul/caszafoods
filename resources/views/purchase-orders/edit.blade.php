@extends('layouts.master')

@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon"><i class="pe-7s-note2"></i></div>
            <div class="header-title">
                <h1>{{ __('Purchase Orders') }}</h1>
                <small>{{ __('Purchase Order') }}</small>
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                    <li><a href="{{ route('purchase-orders.index') }}">{{ __('Purchase Orders') }}</a></li>
                    <li class="active">{{ __('Order') . " " . $po->id }}</li>
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
                                    @if($po->status == 'abierta')
                                        <button id="send" class="btn btn-primary">{{ __('Send') }}</button>
                                    @else
                                        <div class="alert alert-info">
                                            {{ __('Status:') . " " . strtoupper($po->status) }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group flex-row" {{ $po->status <> 'abierta' ? 'hidden' : '' }}>
                            @if($po->vendor_id == NULL)
                                <label>{{ __('Vendor: ') }}</label>
                                <select name="vendor" id="vendor" class="search_test">
                                    <option value="" selected disabled>{{ __('Select a vendor') }}</option>
                                    @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                    @endforeach
                                </select>
                            @else
                                <div id="remove-vendor" class="form-group inline-block cursor">
                                    <label>{{ __('Vendor:') }}</label>
                                    <label for="">{{ $po->vendor->name }}</label>   <i class="glyphicon glyphicon-remove p-4 cursor"></i>
                                </div>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg">{{ __('Add Item') }}</button>
                            @endif
                        </div>
                        <div class="row">
                                <div class="load_details">

                                </div>
                                <div class="modal fade" id="modal-lg" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3>{{ __('Select Items') }}</h3>
                                                <input type="text" id="search" class="form-control" placeholder="Buscar">
                                            </div>
                                            <div class="modal-body load_item_modal_body">

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Close') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    <script src="{{ asset('assets/plugins/modals/classie.js') }}"></script>
    <script src="{{ asset('assets/plugins/modals/modalEffects.js') }}"></script>
    <script>
        $(document).ready(function() {
            loadItems();
            loadDetails();
            $('#vendor').change(function(){
                var selectedValue = $(this).val();
                console.log('Selected value: ' + selectedValue);
                $.ajax({
                    url: "{{ route('purchase-orders.store') }}",
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        vendor_id: selectedValue,
                        po_id: "{{ $po->id }}"
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
                            loadDetails();
                            loadItems();
                        }else if(response.status === 'error'){
                            toastr.error(response.message);
                        }
                    }
                })
            });
            $('body').on('click', '.add-detail', function(e){
                e.preventDefault();
                let url = $(this).attr('href');
                $.ajax({
                    url: url,
                    method: 'PUT',
                    data: {
                        _token: "{{ csrf_token() }}",
                        po_id: "{{ $po->id }}"
                    },
                    success: function(response){
                        if(response.status === 'success'){
                            setTimeout(function(){
                                loadItems();
                                loadDetails();
                            }, 1000)

                        }else if(response.status === 'error'){
                            toastr.error(response.message);
                        }
                    }
                })
            });
            $('body').on('click', '#remove-vendor', function(e){
                console.log('Remove vendor');
                $.ajax({
                    url: "{{ route('purchase-orders.remove.vendor', $po->id) }}",
                    method: 'PUT',
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
            });
            $('#send').on('click', function(e){
                e.preventDefault();
                console.log();
                $.ajax({
                    url: "{{ route('purchase-orders.send', $po->id) }}",
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
            });
            $('#search').change(function(){
                var searchValue = $(this).val();
                loadItems(searchValue);
            });
        });

        function loadItems(searchValue = null){
            $.ajax({
                method: 'GET',
                url:'{{ route("purchase-order.add.items", $po->id) }}',
                data: {
                    search: searchValue
                },
                success: function(response){
                    $('.load_item_modal_body').html(response);
                }
            })
        }

        function loadDetails(){
            $.ajax({
                method: 'GET',
                url: "{{ route('purchase-orders.details', $po->id) }}",
                data: {
                    po_id: "{{ $po->id }}"
                },
                success: function(response){
                    $('.load_details').html(response);
                }
            });
        }
    </script>

@endpush
