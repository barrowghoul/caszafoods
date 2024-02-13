<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <th>{{ __('Requisition') }}</th>
            <th>{{ __('Line') }}</th>
            <th>{{ __('Item') }}</th>
            <th>{{ __('Quantity') }}</th>
            <th>{{ __('Add') }}</th>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->requisition_id }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td><a href='{{ route('purchase-orders.details.store', $item->id) }}' class='btn btn-primary add-detail'><i class='material-icons'>playlist_add</i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
