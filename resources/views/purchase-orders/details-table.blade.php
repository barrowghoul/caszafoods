<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <th>{{ __('Item') }}</th>
            <th>{{ __('Quantity') }}</th>
            <th>{{ __('Unit') }}</th>
            <th>{{ __('Price') }}</th>
            <th>{{ __('Total') }}</th>
            <th>{{ __('Delete') }}</th>
        </thead>
        <tbody>
            @foreach ($details as $detail)
                <tr>
                    <td>{{ $detail->item->name }}</td>
                    <td>
                        <input type="number" name="quantity" id="{{ $detail->id }}" class="form-control"
                            value="{{ $detail->quantity }}" {{ $po->status == 'abierta' ? '' : 'disabled' }}>
                    </td>
                    <td>{{ $detail->item->unit->name }}</td>
                    <td><input type="number" name="price" id="{{ $detail->id }}" class="form-control"
                            value="{{ $detail->unit_price }}" {{ $po->status == 'abierta' ? '' : 'disabled' }}></td>
                    <td>{{ $detail->total }}</td>
                    <td>
                        @if($po->status == 'abierta')
                            <a href='{{ route('purchase-orders.details.destroy', $detail->id) }}' class='btn btn-danger delete-detail'><i
                                class='material-icons'>clear</i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-right"><strong>{{ __('SubTotal') }}</strong></td>
                <td><strong>{{ $detail->purchase_order->subtotal }}</strong></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4" class="text-right"><strong>{{ __('Tax') }}</strong></td>
                <td><strong>{{ $detail->purchase_order->tax }}</strong></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4" class="text-right"><strong>{{ __('IEPS') }}</strong></td>
                <td><strong>{{ $detail->purchase_order->ieps }}</strong></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4" class="text-right"><strong>{{ __('Total') }}</strong></td>
                <td><strong>{{ $detail->purchase_order->total }}</strong></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('input[type="number"]').change(function() {
            var newValue = $(this).val();
            var inputId = $(this).attr('id');
            var field = $(this).attr('name');
            console.log('New value: ' + newValue + ' Input id: ' + inputId + ' Field: ' + field);
            $.ajax({
                url: "{{ route('purchase-orders.details.update') }}",
                method: 'PUT',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: inputId,
                    value: newValue,
                    field: field
                },
                success: function(response) {
                    if (response.status === 'success') {
                        loadDetails();
                    }
                    if (response.status === 'error') {
                        toastr.error(response.message);
                    }
                }
            })
        });

    });
</script>
