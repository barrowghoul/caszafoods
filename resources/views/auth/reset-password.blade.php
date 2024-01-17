<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Adminpage - Responsive Bootstrap Admin Template Dashboard</title>
        <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
            WebFont.load({
                google: {
                    families: ['Alegreya+Sans:100,100i,300,300i,400,400i,500,500i,700,700i,800,800i,900,900i', 'Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i', 'Open Sans']
                }
            });
        </script>
        <!-- Bootstrap -->
        <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap rtl -->
        <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
        <!-- Pe-icon-7-stroke -->
        <link href="{{ asset('assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
        <!-- Theme style -->
        <link href="{{ asset('assets/dist/css/component_ui.min.css') }}" rel="stylesheet" type="text/css"/>
        <!-- Theme style rtl -->
        <!--<link href="assets/dist/css/component_ui_rtl.css" rel="stylesheet" type="text/css"/>-->
        <!-- Custom css -->
        <link href="{{ asset('assets/plugins/toastr/toastr.min.css') }}" rel=stylesheet type="text/css"/>
        <link href="{{ asset('assets/dist/css/custom.css') }}" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <!-- Content Wrapper -->
        <div class="register-wrapper">
            <div class="container-center lg">
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-pen"></i>
                            </div>
                            <div class="header-title">
                                <h3>Recuperar Contraseña</h3>
                                <small><strong>Please enter your data<br> to register.</strong></small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('password.store') }}" method="POST">
                            @csrf
                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" name="email" value="{{ old('email', $request->email) }}" placeholder="{{ __('Please enter you email adress') }}" autofocus autocomplete="username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" class="form-control" name="password" placeholder="******" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{ __('confirm Password') }}</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input id="rpass" type="password" class="form-control" name="password_confirmation" placeholder="******" required>
                                </div>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary pull-right">{{ __('Reset Password') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jQuery/jquery-1.12.4.min.js') }}"></script>
        <!-- bootstrap js -->
        <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>

        <script>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    toastr.error('{{ $error }}');
                @endforeach
            @endif
        </script>
    </body>
</html>
