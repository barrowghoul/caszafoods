@extends('layouts.master')
@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon"><i class="pe-7s-home"></i></div>
            <div class="header-title">
                <h1>{{ __('My Dashboard') }}</h1>
                <small>Dashboard</small>
                <ol class="breadcrumb">
                    <li>{{ __('Home') }}</li>
                    <li class="active">{{ __('Dashboard') }}</li>
                </ol>
            </div>
        </div> <!-- /. Content Header (Page header) -->
        <div class="row load_dashboard">

        </div>
    </div>
@endsection
@push('scripts')

    <script>
        $(document).ready(function(){
            loadDashboard();
        });

        function loadDashboard(){
            $.ajax({
                method: 'GET',
                url: "{{ route('my-dashboard') }}",
                success: function(response){
                    $('.load_dashboard').html(response);
                }
            })
        }
    </script>

@endpush
