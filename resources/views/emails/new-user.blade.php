<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
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

        <style>
            .col-sm-12{
                padding-right: 10px;
                padding-left: 10px;
                position: relative;
                min-height: 1px;
            }
            @media(min-width:768px){
                .col-sm-12{
                    width: 100%;
                    float: left;
                }
            }
            #page-wrapper{
                position: inherit;
                margin: 70px 0 0 250px;
                padding: 0 30px 30px;
            }
            div{
                display: block;
            }
            .panel-body{
                padding:15px;
            }
            .panel-bd{
                border: 1px solid #e1e6ef;
                box-shadow: 0 1px 15px 1px rgb(113,106,202,.08);
            }
            .panel{
                border-radius: 0;
                margin-bottom: 20px;
                background-color: #fff
            }
            .row{
                margin-right: -10px;
                margin-left: -10px;
            }
            .m-t-0{
                margin-top: 0!important;
            }
            .h1, h1{
                font-size: 36px;
            }
            ::selection{
                color: #fff;
                background: #55882F;
                text-shadow: none
            }
            body{
                color: #00044C;
                font-weight: 500;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <div id="wrapper" class="wrapper animsition">
            <!-- Page Content -->
            <div id="page-wrapper">
                <!-- main content -->
                <div class="content">
                    <!-- Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <img src="assets/dist/img/dark-logo.png" class="img-responsive" alt="">
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <h1 class="m-t-0">Su cuenta de usuario se ha creado</h1>
                                        </div>
                                    </div> <hr>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <p>Tu cuenta para ingresar al sistema ha sido creada con exito. A continuacion, encontras tus credenciales</p>
                                            <p><strong>Te recomendamos cambiar tu contraseña al entrar al sistema por primera vez.</strong></p>
                                            <img src="assets/dist/img/credit/AM_mc_vs_ms_ae_UK.png" class="img-responsive" alt="">

                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="list-unstyled text-left">
                                                <li>
                                                    <strong>Nombre de usuario:</strong> {{ $data['email'] }} </li>
                                                <li>
                                                    <strong>Contraseña:</strong> {{ $data['password'] }} </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer text-left">
                                    <p>Si necesitas ayudar con tu cuenta favor de contactar a soporte@seikosolucioens.com.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.main content -->
            </div><!-- /#page-wrapper -->
        </div><!-- /#wrapper -->
        <!-- START CORE PLUGINS -->
        <script src="assets/plugins/jQuery/jquery-1.12.4.min.js"></script>
        <script src="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/metisMenu/metisMenu.min.js"></script>
        <script src="assets/plugins/lobipanel/lobipanel.min.js"></script>
        <script src="assets/plugins/animsition/js/animsition.min.js"></script>
        <script src="assets/plugins/fastclick/fastclick.min.js"></script>
        <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- START THEME LABEL SCRIPT -->
        <script src="assets/dist/js/app.min.js"></script>
        <script src="assets/dist/js/jQuery.style.switcher.min.js"></script>
    </body>
</html>
