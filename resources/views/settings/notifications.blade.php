@extends('layouts.master')
@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon"><i class="pe-7s-user"></i></div>
            <div class="header-title">
                <h1>{{ __('Notification´s Settings') }}</h1>
                <small>{{ __('Setting for notifications') }}</small>
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                    <li><a href="{{ route('settings') }}">{{ __('Settings') }}</a></li>
                    <li class="active">{{ __('Notification Settings') }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 m-b-20">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab1" data-toggle="tab">{{ __('General') }}</a>
                    </li>
                    <li>
                        <a href="#tab2" data-toggle="tab">SMTP</a>
                    </li>
                    <li>
                        <a href="#tab3" data-toggle="tab">Pusher</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab1">
                        <div class="panel-body">
                            <form action="{{ route('settings.update-notification') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <h4>{{ __('Notify Vendor') }}</h4>
                                    <h6>{{ __('Send an email to vendor when a OC has been created')}}</h6>
                                    <input type="checkbox" id="notify_vendor" name="notify_vendor"  {{ config('settings.notify_vendor') === '1' ? 'checked' : '' }} data-toggle="toggle" data-onstyle="success">
                                </div>
                                <div class="form-group row">
                                    <h4>{{ __('Notify Requisitions') }}</h4>
                                    <h6>{{ __('Send an alert when a requisition has been created or updated')}}</h6>
                                    <div class="col-xs-12 cols-sm-6 col-md-2 col lg-2">
                                        <h5>{{ __('Administrators') }}</h5>
                                        <input type="checkbox" id="notify_req_admin" name="notify_req_admin" {{ config('settings.notify_req_admin') === '1' ? 'checked' : '' }} data-toggle="toggle" data-onstyle="success">
                                    </div>
                                    <div class="col-xs-12 cols-sm-6 col-md-2 col lg-2">
                                        <h5>{{ __('Purchases') }}</h5>
                                        <input type="checkbox" id="notify_req_purchase" name="notify_req_purchase" {{ config('settings.notify_req_purchase') === '1' ? 'checked' : ''}} data-toggle="toggle" data-onstyle="success">
                                    </div>
                                    <div class="col-xs-12 cols-sm-6 col-md-2 col lg-2">
                                        <h5>{{ __('Purchases Admin') }}</h5>
                                        <input type="checkbox" id="notify_req_purchase_admin" name="notify_req_purchase_admin" {{ config('settings.notify_req_purchase_admin') === '1' ? 'checked' : '' }} data-toggle="toggle" data-onstyle="success">
                                    </div>
                                    <div class="col-xs-12 cols-sm-6 col-md-2 col lg-2">
                                        <h5>{{ __('Inventory') }}</h5>
                                        <input type="checkbox" id="notify_req_inventory" name="notify_req_inventory" {{ config('settings.notify_req_inventory') === '1' ? 'checked' : '' }} data-toggle="toggle" data-onstyle="success">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <h6>{{ __('Send an alert when a OC has been created or updated')}}</h6>
                                    <div class="col-xs-12 cols-sm-6 col-md-2 col lg-2">
                                        <h5>{{ __('Administrators') }}</h5>
                                        <input type="checkbox" id="notify_oc_admin" name="notify_oc_admin" {{ config('settings.notify_req_inventory') === '1' ? 'checked' : '' }} data-toggle="toggle" data-onstyle="success">
                                    </div>
                                    <div class="col-xs-12 cols-sm-6 col-md-2 col lg-2">
                                        <h5>{{ __('Purchases') }}</h5>
                                        <input type="checkbox" id="notify_oc_purchase" name="notify_oc_purchase" {{ config('settings.notify_oc_purchase') === '1' ? 'checked' : '' }} data-toggle="toggle" data-onstyle="success">
                                    </div>
                                    <div class="col-xs-12 cols-sm-6 col-md-2 col lg-2">
                                        <h5>{{ __('Purchases Admin') }}</h5>
                                        <input type="checkbox" id="notify_oc_purchase_admin" name="notify_oc_purchase_admin" {{ config('settings.notify_oc_purchase_admin') === '1' ? 'checked' : '' }} data-toggle="toggle" data-onstyle="success">
                                    </div>
                                    <div class="col-xs-12 cols-sm-6 col-md-2 col lg-2">
                                        <h5>{{ __('Inventory') }}</h5>
                                        <input type="checkbox" id="notify_oc_inventory" name="notify_oc_inventory" {{ config('settings.notify_oc_inventory') === '1' ? 'checked' : '' }} data-toggle="toggle" data-onstyle="success">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <h6>{{ __('Send an alert when a Reception has been created or updated')}}</h6>
                                    <div class="col-xs-12 cols-sm-6 col-md-2 col lg-2">
                                        <h5>{{ __('Administrators') }}</h5>
                                        <input type="checkbox" id="notify_reception_admin" name="notify_reception_admin" {{ config('settings.notify_reception_admin') === '1' ? 'checked': '' }} data-toggle="toggle" data-onstyle="success">
                                    </div>
                                    <div class="col-xs-12 cols-sm-6 col-md-2 col lg-2">
                                        <h5>{{ __('Purchases') }}</h5>
                                        <input type="checkbox" id="notify_reception_purchase" name="notifyreception_purchase" {{ config('settings.notifyreception_purchase') === '1' ? 'checked': '' }} data-toggle="toggle" data-onstyle="success">
                                    </div>
                                    <div class="col-xs-12 cols-sm-6 col-md-2 col lg-2">
                                        <h5>{{ __('Purchases Admin') }}</h5>
                                        <input type="checkbox" id="notify_reception_purchase_admin" name="notify_reception_purchase_admin" {{ config('settings.notify_reception_purchase_admin') === '1' ? 'checked': '' }} data-toggle="toggle" data-onstyle="success">
                                    </div>
                                    <div class="col-xs-12 cols-sm-6 col-md-2 col lg-2">
                                        <h5>{{ __('Inventory') }}</h5>
                                        <input type="checkbox" id="notify_reception_inventory" name="notify_reception_inventory" {{ config('settings.notify_reception_inventory') === '1' ? 'checked': '' }} data-toggle="toggle" data-onstyle="success">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab2">
                        <div class="panel-body">
                            <form action="{{ route('settings.update-email') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <h4>Use Email Notifications</h4>
                                <div class="form-group row">
                                    <input type="checkbox" id="use_email" name="use_email"  {{ config('settings.use_email') ? 'checked' : '' }} data-toggle="toggle" data-onstyle="success">
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <label for="">{{ __('Host') }}</label>
                                        <input type="text" class="form-control" name="email_host" value="{{ config('settings.email_host') }}">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <label for="">{{ __('Port') }}</label>
                                        <input type="text" class="form-control" name="email_port" value="{{ config('settings.email_port') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <label for="">{{ __('Username') }}</label>
                                        <input type="text" class="form-control" name="email_username" value="{{ config('settings.email_username') }}">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <label for="">{{ __('Password') }}</label>
                                        <input type="text" class="form-control" name="email_password" value="{{ config('settings.email_password') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <label for="">{{ __('Encryption') }}</label>
                                        <input type="text" class="form-control" name="email_encryption" value="{{ config('settings.email_encryption') }}">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <label for="">{{ __('Address') }}</label>
                                        <input type="email" class="form-control" name="email_address" value="{{ config('settings.email_address') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab3">
                        <div class="panel-body">
                            <form action="{{ route('settings.update-pusher') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <h4>Use Pusher Notifications</h4>
                                <div class="form-group row">
                                    <input type="checkbox" id="use_pusher" name="use_pusher" {{ config('settings.use_pusher') === '1' ? 'checked' : '' }} data-toggle="toggle" data-onstyle="success">
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <label>{{ __('App ID') }}</label>
                                        <input type="text" class="form-control" name="pusher_app_id" value="{{ config('settings.pusher_app_id') }}">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <label>{{ __('App Key') }}</label>
                                        <input type="text" class="form-control" name="pusher_app_key" value="{{ config('settings.pusher_app_key') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <label>{{ __('App Secret') }}</label>
                                        <input type="text" class="form-control" name="pusher_app_secret" value="{{ config('settings.pusher_app_secret') }}">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <label>{{ __('Cluster') }}</label>
                                        <input type="text" class="form-control" name="pusher_app_cluster" value="{{ config('settings.pusher_app_cluster') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="{{ asset('assets/plugins/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-toggle/toggle-active.js') }}"></script>
@endpush
