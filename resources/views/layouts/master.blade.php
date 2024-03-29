<!DOCTYPE html>
<html lang=en>

<head>
    <meta charset=utf-8><!--  -->
    <meta http-equiv=X-UA-Compatible content="IE=edge">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link href="{{ asset('assets/plugins/jquery.sumoselect/sumoselect.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/modals/modal-component.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/bootstrap-toggle/bootstrap-toggle.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

    <link id=defaultTheme href="{{ asset('assets/dist/css/skins/skin-dark-1.min.css') }}" rel=stylesheet
        type="text/css" />
    <link href="{{ asset('assets/dist/css/custom.css') }}" rel=stylesheet type="text/css" />
    <!--[if lt IE 9]>
                    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                <![endif]-->
    <script>
        var pusherKey = "{{ config('settings.pusher_app_key') }}"
        var pusherCluster = "{{ config('settings.pusher_app') }}"

    </script>

    @vite(['resources/js/app.js'])
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

    <script>
        // Set CSRF at ajax header
        //$.ajaxSetup({
            //headers: {
                //'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //}
        //});

        //Sweet Alert Implementation
        $(document).ready(function() {
            $('body').on('click', '.delete-item', function(e) {
                e.preventDefault()
                let url = $(this).attr('href');
                Swal.fire({
                    title: "¿Desea borrar el registro?",
                    text: "No podra revertir esta accion!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            data: {_token: "{{ csrf_token() }}"},
                            success: function(response){
                                if(response.status === 'success'){
                                    toastr.success(response.message)
                                    //$('#vendor-table').DataTable().draw();
                                    window.location.reload();
                                }else if(response.status === 'error'){
                                    toastr.error(response.message)
                                }
                            },
                            error: function(error){
                                console.log(error);
                            }
                        })
                    }
                });
            })
        })
    </script>
    @auth
        <script>
            document.addEventListener('DOMContentLoaded', function(){
                Echo.private('App.Models.User.' + {{ auth()->user()->id }})
                .notification((notification) => {
                    console.log(notification);
                    let html = `<li>
                            <a class="rad-content" href="${notification.url}">
                                <!--<div class="pull-left"><i class="fa fa-html5 fa-2x color-red"></i>
                                </div>-->
                                <div class="rad-notification-body">
                                    <div class="lg-text">${notification.title}</div>
                                    <div class="sm-text">${notification.message}</div>
                                    <div class="sm-text"></div>
                                </div>
                            </a>
                        </li>`;
                    $('.rt_notifications').prepend(html);
                    toastr.info(notification.message, notification.title, {
                        closeButton: true,
                        progressBar: true,
                    });
                });
            });
        </script>
    @endauth
    @stack('scripts')
</body>

</html>
