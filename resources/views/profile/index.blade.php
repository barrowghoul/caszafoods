@extends('layouts.master')

@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon"><i class="pe-7s-user"></i></div>
            <div class="header-title">
                <h1>{{ __('My Profile') }}</h1>
                <small>{{ __('Update your profile information') }}</small>
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                    <li class="active">{{ __('Profile') }}</li>
                </ol>
            </div>
        </div> <!-- /. Content Header (Page header) -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>{{ __('Update General Information') }}</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">{{ __('Choose File') }}</label>
                                    <input type="file" name="avatar" id="image-upload" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('Name') }}</label>
                                <input type="text" class="form-control" name="name" placeholder="{{ __('Enter your name') }}" value="{{ auth()->user()->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('Email address') }}</label>
                                <input type="email" class="form-control" name="email" placeholder="{{ __('Enter email') }}" value="{{ auth()->user()->email }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>{{ __('Update your password') }}</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('profile.password.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('Current Password') }}</label>
                                <input type="password" class="form-control" name="current_password" value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('New Password') }}</label>
                                <input type="password" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('Confirm Password') }}</label>
                                <input type="password" class="form-control" name="password_confirmation" value="{{ old('email') }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $('.image-preview').css({
                'background-image': 'url({{ asset(auth()->user()->avatar) }})',
                'background-size' : 'cover',
                'background-position': 'center center'
            })
        })
    </script>
@endpush
