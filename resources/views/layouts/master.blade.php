<!DOCTYPE html>
<html lang=en>

<head>
    <meta charset=utf-8><!--  -->
    <meta http-equiv=X-UA-Compatible content="IE=edge">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name=description content="">
    <meta name=author content="">
    <title>Caszafoods - Seiko ERP</title>
    <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Alegreya+Sans:100,100i,300,300i,400,400i,500,500i,700,700i,800,800i,900,900i',
                    'Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i',
                    'Open Sans'
                ]
            }
        });
    </script>
    <link href="{{ asset('assets/dist/css/base.css') }}" rel=stylesheet type="text/css" />
    <link href="{{ asset('assets/plugins/toastr/toastr.min.css') }}" rel=stylesheet type="text/css" />
    <link href="{{ asset('assets/plugins/emojionearea/emojionearea.min.css') }}" rel=stylesheet type="text/css" />
    <link href="{{ asset('assets/plugins/monthly/monthly.min.css') }}" rel=stylesheet type="text/css" />
    <link href="{{ asset('assets/plugins/amcharts/export.css') }}" rel=stylesheet type="text/css" />
    <link href="{{ asset('assets/dist/css/component_ui.min.css') }}" rel=stylesheet type="text/css" />
    <link href="{{ asset('assets/plugins/jquery.sumoselect/sumoselect.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    
    <link id=defaultTheme href="{{ asset('assets/dist/css/skins/skin-dark-1.min.css') }}" rel=stylesheet
        type="text/css" />
    <link href="{{ asset('assets/dist/css/custom.css') }}" rel=stylesheet type="text/css" />
    <!--[if lt IE 9]>
                    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                <![endif]-->
</head>

<body>
    <div id=wrapper class="wrapper animsition">
        <!-- Navigation -->
        @include('components.navigation')
        <!-- /.Navigation -->
        @include('components.sidebar')
        <!-- /.Left Sidebar-->
        <div class=control-sidebar-bg></div>
        <div id=page-wrapper>
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('assets/plugins/jQuery/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/lobipanel/lobipanel.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/fastclick/fastclick.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sparkline/sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counterup/waypoints.js') }}"></script>
    <script src="{{ asset('assets/plugins/emojionearea/emojionearea.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/monthly/monthly.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/amcharts/amcharts.js') }}"></script>
    <script src="{{ asset('assets/plugins/amcharts/ammap.js') }}"></script>
    <script src="{{ asset('assets/plugins/amcharts/worldLow.js') }}"></script>
    <script src="{{ asset('assets/plugins/amcharts/serial.js') }}"></script>
    <script src="{{ asset('assets/plugins/amcharts/export.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/amcharts/light.js') }}"></script>
    <script src="{{ asset('assets/plugins/amcharts/pie.js') }}"></script>
    <script src="{{ asset('assets/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/page/dashboard.js') }}"></script>
    <script src="{{ asset('assets/dist/js/jQuery.style.switcher.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $.uploadPreview({
            input_field: "#image-upload",
            preview_box: "#image-preview",
            label_field: "#image-label",
            label_default: "Elija una imagen",
        });
    </script>
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });
            @endforeach
        @endif
    </script>
    @stack('scripts')
</body>

</html>
