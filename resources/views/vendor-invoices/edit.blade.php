@extends('layouts.master')
@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon"><i class="pe-7s-news-paper"></i></div>
            <div class="header-title">
                <h1>{{ __('Invoice') }}</h1>
                <small>{{ __('Vendor´s Invoice') }}</small>
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                    <li><a href="{{ route('vendor-invoices.index') }}">{{ __('Invoices') }}</a></li>
                    <li class="active">{{ __('Invoice') . " " . $invoice->id }}</li>
                </ol>
            </div>
        </div> <!-- /. Content Header (Page header) -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="assets/dist/img/dark-logo.png" class="img-responsive" alt="">
                                <br>
                                <address>
                                    <strong>{{ $invoice->vendor->name }}</strong><br>
                                    {{ $invoice->vendor->address }}<br>
                                    <abbr title="Phone">P:</abbr> {{ $invoice->vendor->phone }}<br>
                                </address>
                                <address>
                                    <strong>{{ $invoice->vendor->contact }}</strong><br>
                                    <a href="mailto:#">{{ $invoice->vendor->email }}</a>
                                </address>
                            </div>
                            <div class="col-sm-6 text-right">
                                <h1 class="m-t-0">{{ __('Invoice') }} {{ $invoice->invoice }}</h1>
                                <div>{{ __('Issued') }} {{ $invoice->created_at }}</div>
                                <div class="text-danger m-b-15">{{ __('Payment due') }} {{ $invoice->pay_date }}</div>
                            </div>
                        </div> <hr>
                        <div class="table-responsive m-b-20">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ __('Item') }}</th>
                                        <th>{{ __('Quantity') }}</th>
                                        <th>{{ __('Unit') }}</th>
                                        <th>{{ __('Unit Price') }}</th>
                                        <th>{{ __('Tax') }}</th>
                                        <th>{{ __('IEPS') }}</th>
                                        <th>{{ __('Total') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoice->details as $detail)
                                        <tr>
                                            <td><div><strong>{{ $detail->item->name }}</strong></div></td>
                                            <td>{{ $detail->quantity }}</td>
                                            <td>{{ $detail->item->unit->name }}</td>
                                            <td>${{ $detail->unit_price }}</td>
                                            <td>${{ $detail->tax_amount }}</td>
                                            <td>${{ $detail->ieps_amount }}</td>
                                            <td>${{ $detail->total }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6" class="text-right">{{ __('Subtotal') }}:</td>
                                        <td>${{ $invoice->subtotal }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="text-right">{{ __('Tax') }}:</td>
                                        <td>{{ $invoice->tax }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="text-right">{{ __('IEPS') }}:</td>
                                        <td>{{ $invoice->ieps }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="text-right">{{ __('Total') }}:</td>
                                        <td>{{ $invoice->total }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer text-left">
                        <button type="button" id="pay" class="btn btn-success"><i class="fa fa-dollar"></i> {{ __('Pay') }}</bu>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#pay').click(function() {
                Swal.fire({
                    title: "{{ __('Enter Bank Reference') }}",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "{{ __('Pay')}}",
                    cancelButtonText: "{{ __('Cancel')}}",
                    input: "text",
                    inputValidator: (value) => {
                        if(!value){
                            return "{{ __('You need to write the bank reference') }}"
                        }
                    }
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('vendor-invoices.pay', $invoice->id) }}",
                            method: 'PUT',
                            data: {
                                _token: "{{ csrf_token() }}",
                                reference: result.value
                            },
                            success: function(response) {
                                if(response.status === 'success'){
                                    toastr.success(response.message);
                                }else if(response.status === 'error'){
                                    toastr.error(response.message);
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
