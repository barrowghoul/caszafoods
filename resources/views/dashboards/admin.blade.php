<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="statistic-box statistic-filled-2 outline">
            <h2>${{ $vendor_invoice_total }}<span class="count-number"></span></h2>
            <div class="small">{{ __('Pending Invoice Total') }}</div>
            <i class="ti-money statistic_icon"></i>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="panel panel-bd lobidrag">
            <div class=panel-heading>
                <div class=panel-title>
                    <i class=ti-truck></i>
                    <h4>{{ __('Delay PO') }}</h4>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('PO') }}</th>
                                <th>{{ __('Vendor') }}</th>
                                <th>{{ __('Created') }}</th>
                                <th>{{ __('Estimated Delivery') }}</th>
                                <th>{{ __('Delay Days') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($due_pos as $po)
                                <tr data-href="{{ route('purchase-orders.edit', $po->id) }}">
                                    <td>{{ $po->id }}</td>
                                    <td>{{ $po->vendor->name }}</td>
                                    <td>{{ $po->updated_at->diffForHumans() }}</td>
                                    <td>{{ $po->delivery_date }}</td>
                                    <td>{{ \Carbon\Carbon::now()->diffInDays($po->delivery_date) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="panel panel-bd lobidrag">
            <div class=panel-heading>
                <div class=panel-title>
                    <i class=ti-money></i>
                    <h4>{{ __('Due Invoices') }}</h4>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('Invoice') }}</th>
                                <th>{{ __('Vendor') }}</th>
                                <th>{{ __('Total') }}</th>
                                <th>{{ __('Created') }}</th>
                                <th>{{ __('Estimated Pay Date') }}</th>
                                <th>{{ __('Delay Days') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($due_invoices as $invoice)
                                <tr class="data2" data-href="{{ route('vendor-invoices.edit', $invoice->id) }}">
                                    <td>{{ $invoice->id }}</td>
                                    <td>{{ $invoice->vendor->name }}</td>
                                    <td>{{ $invoice->total }}</td>
                                    <td>{{ $invoice->updated_at->diffForHumans() }}</td>
                                    <td>{{ $invoice->pay_date }}</td>
                                    <td>{{ \Carbon\Carbon::now()->diffInDays($invoice->pay_date) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('tr[data-href]').on("click", function() {
            window.location = $(this).data('href')
        })
        $('.class2').on("click", function() {
            window.location = $(this).data('href')
        })
    })
</script>
