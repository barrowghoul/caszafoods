@extends('layouts.master')

@section('content')
<div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="header-icon"><i class="pe-7s-user"></i></div>
        <div class="header-title">
            <h1>{{ __('Item´s Import') }}</h1>
            <small>{{ __('Import Items into system´s data base') }}</small>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                <li>{{ __('Import') }}</li>
                <li class="active">{{ __('Items') }}</li>
            </ol>
        </div>
    </div> <!-- /. Content Header (Page header) -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ __('Please upload item´s file:') }}</h4>
                        <form action="{{ route('import.items') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="form-control">
                            <br>
                            <button class="btn btn-primary">Import Articulos</button>
                        </form>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{ route('items.edit', $item->id) }}" class='btn btn-primary'><i class='material-icons'>mode_edit</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
