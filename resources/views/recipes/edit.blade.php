@extends('layouts.master')
@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon"><i class="pe-7s-notebook"></i></div>
            <div class="header-title">
                <h1>{{ __('Recipes') }}</h1>
                <small>{{ __('Recipe´s Information') }}</small>
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                    <li><a href="{{ route('recipes.index') }}">{{ __('Recipes') }}</a></li>
                    <li class="active">{{ $recipe->name }}</li>
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
                                    @if($recipe->status == 'draft')
                                        <button id="add" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">{{ __('Add Item') }}</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('recipes.update', $recipe->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                            
                                <div class="col-sm-4">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $recipe->name }}" {{ $recipe->status != 'draft' ? 'disabled' : ''}}>
                                </div>
                                <div class="col-sm-4">
                                    <label for="status">{{ __('Status') }}</label>
                                    <select name="status" id="status" class="search_test">
                                        <option value="" selected disabled>{{ __('Select a status') }}</option>
                                        <option value="draft" {{ $recipe->status == 'draft' ? 'selected' : '' }}>{{ __('Draft') }}</option>
                                        <option value="active" {{ $recipe->status == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        <option value="inactive" {{ $recipe->status == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-success">{{ __('Save') }}</a>
                                </div>
                            
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="description">{{ __('Description') }}</label>
                                    <input type="text" class="form-control" id="description" name="description" rows="3" {{ $recipe->status != 'draft' ? 'disabled' : ''}} value="{{ $recipe->description }}"></input>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-sm-12 ">

                            </div>
                        </div>
                        <div class="row">

                        </div>
                        <div class="row">
                            <div class="load_detail">

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
        $(document).ready(function(){
            loadItems();
            loadDetails();
            $('#search').change(function(){
                var searchValue = $(this).val();
                loadItems(searchValue);
            });
            $('body').on('click', '.add-detail', function(e){
                e.preventDefault();
                let url = $(this).attr('href');
                $.ajax({
                    url: url,
                    method: 'PUT',
                    data: {
                        _token: "{{ csrf_token() }}",
                        recipe_id: "{{ $recipe->id }}"
                    },
                    success: function(response){
                        if(response.status === 'success'){
                            setTimeout(function(){
                                //loadItems();
                                loadDetails();
                            }, 1000)
                        }else if(response.status === 'error'){
                            toastr.error(response.message);
                        }
                    }
                })
            })
            $('body').on('click', '.delete-detail', function(e){
                e.preventDefault();
                let url = $(this).attr('href');
                //console.log(url);
                $.ajax({
                    url: url,
                    method: 'DELETE',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response){
                        if(response.status === 'success'){
                            loadDetails();
                        }else if(response.status === 'error'){
                            toastr.error(response.message);
                        }
                    }
                })
            })
        });

        function loadItems(searchValue = null){
            $.ajax({
                method: 'GET',
                url: '{{ route("recipes.list.items", $recipe->id) }}',
                data: {
                    search: searchValue
                },
                success: function(response){
                    $('.load_item_modal_body').html(response);
                }
            });
        }

        function loadDetails(){
            $.ajax({
                method: 'GET',
                url: "{{ route('recipes.details', $recipe->id) }}",
                data: {
                    recipe_id: "{{ $recipe->id }}"
                },
                success: function(response){
                    $('.load_detail').html(response);
                }
            })
        }
    </script>
@endpush
