@extends('layouts.master')
@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon"><i class="pe-7s-note2"></i></div>
            <div class="header-title">
                <h1>{{ __('Reception') }}</h1>
                <small>{{ __('Reception') }}</small>
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                    <li><a href="{{ route('receptions.index') }}">{{ __('Receptions') }}</a></li>
                    <li class="active">{{ __('Reception') . " " . $reception->id }}</li>
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
                                    @if($reception->status == 'abierta')
                                        <button id="receive" class="btn btn-primary">{{ __('Receive') }}</button>
                                        @else
                                        <div class="alert alert-info">
                                            {{ __('Status:') . " " . strtoupper($reception->status) }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group flex-row">
                            @if($reception->purchase_order_id == NULL)
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-orders">{{ __('Select Order') }}</button>
                            @else
                                <span>{{ $reception->vendor->name }}  {{ __('Order') }} : {{ $reception->purchase_order_id }}</span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="load_details">

                            </div>
                            <div class="modal fade" id="modal-orders" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3>{{ __('Select an Order') }}</h3>
                                            <input type="text" id="search_order" class="form-control" placeholder="Ingrese Proveedor">
                                        </div>
                                        <div class="modal-body load_order_modal_body">

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
    <script>
        $(document).ready(function(){
            loadOrders();
            loadDetail();

            $('#search_order').change(function(){
                var search_value = $(this).val();
                loadOrders(search_value);
            })

            $('body').on('click', '.add-order', function(e){
                e.preventDefault();
                let url = $(this).attr('href');
                $.ajax({
                    method: 'PUT',
                    url: url,
                    data: {
                        _token: '{{ csrf_token() }}',
                        reception_id: '{{ $reception->id }}'
                    },
                    success: function(response){
                        if(response.status === 'success'){
                            loadDetail();
                        }else if(response.status === 'error'){
                            toastr.error(response.message);
                        }
                    }
                })
            })

            $('body').on('click', '#receive', function(e){
                e.preventDefault();
                Swal.fire({
                    title: "Ingrese el numero de factura",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Recibir",
                    input: "text",
                    inputValidator: (value) => {
                        if(!value){
                            return "Debe ingresar el numero de factura"
                        }
                    }
                }).then((result) => {
                    if(result.isConfirmed){
                        $.ajax({
                            method: 'PUT',
                            url: '{{ route("receptions.send", $reception->id) }}',
                            data: {
                                _token: '{{ csrf_token() }}',
                                invoice_number: result.value
                            },
                            success: function(response){
                                if(response.status === 'success'){
                                    toastr.success(response.message);
                                    loadDetail();
                                }else if(response.status === 'error'){
                                    toastr.error(response.message);
                                }
                            }
                        })
                    }
                })
            })
        })

        function loadOrders(search_value = null){
            $.ajax({
                method: 'GET',
                url: '{{ route("receptions.orders", $reception->id) }}',
                data: {
                    search_value: search_value
                },
                success: function(response){
                    $('.load_order_modal_body').html(response)
                }
            })
        }

        function loadDetail(){
            $.ajax({
                method: 'GET',
                url: "{{ route('reception.details', $reception->id) }}",
                success: function(response){
                    $('.load_details').html(response);
                }
            })
        }
    </script>
@endpush
