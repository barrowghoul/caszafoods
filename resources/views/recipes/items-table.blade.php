<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <th>{{ __('Code') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Add') }}</th>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->name }}</td>
                    <td><a href='{{ route('recipes.details.store', $item->id) }}' class='btn btn-primary add-detail'><i class='material-icons'>playlist_add</i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
