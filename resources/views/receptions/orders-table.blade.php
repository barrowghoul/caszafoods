<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <th>{{ __('Order') }}</th>
            <th>{{ __('Vendor') }}</th>
            <th>{{ __('Total') }}</th>
            <th>{{ __('Add') }}</th>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->vendor->name }}</td>
                    <td>{{ $order->total }}</td>
                    <td><a href='{{ route('reception.details.store', $order->id) }}' class='btn btn-primary add-order'><i class='material-icons'>playlist_add</i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
