<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>{{ __('Item') }}</th>
                <th>{{ __('Description') }}</th>
                <th>{{ __('Quantity') }}</th>
                <th>{{ __('Unit') }}</th>
                @if($recipe->status == 'draft')
                    <th>{{ __('Delete') }}</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $detail)
                <tr>
                    <td>{{ $detail->item->code }}</td>
                    <td>{{ $detail->item->name }}</td>
                    <td>
                        <input type="number" name="{{ $detail->id }}" id="{{ $detail->id }}" class="form-control" value="{{ $detail->quantity }}" {{ $recipe->status != 'draft' ? 'disabled' : '' }}>
                    </td>
                    <td>{{ $detail->item->unit->name }}</td>
                    @if($detail->recipe->status == 'draft')
                        <td>
                            <a href="{{ route('recipes.details.destroy',  $detail->id) }}" class="btn btn-danger btn-xs delete-detail" title="{{ __('Delete') }}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function(){
        $('input[type="number"]').change(function(){
            var newValue = $(this).val();
            var inputId = $(this).attr('id');
            var field = $(this).attr('name');
            console.log(newValue, inputId, field);
            $.ajax({
                url: '{{ route("recipes.details.update") }}',
                method: 'PUT',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: inputId,
                    value: newValue,
                    field: field
                },
                success: function(response){
                    if(response.status === 'success'){
                        loadDetails();
                    }
                    if(response.status === 'error'){
                        toastr.error(response.message);
                    }
                }
            })
        });
    });
</script>
