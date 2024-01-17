<nav class="navbar navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <i class="material-icons">apps</i>
        </button>
        <a class="navbar-brand" href="index.html">
            <img class="main-logo" src="{{ asset('images/logo.webp') }}" id="bg" alt="">
            <!--<span>AdminPage</span>-->
        </a>
    </div>
    <div class="nav-container">
        <!-- /.navbar-header -->
        <ul class="nav navbar-nav hidden-xs">
            <li><a id="fullscreen" href="#"><i class="material-icons">fullscreen</i> </a></li>
            <!-- /.Fullscreen -->
        </ul>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="material-icons">add_alert</i>
                    <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    <!--<i class="ti-announcement"></i>-->
                    <!--<i class="ti-angle-down"></i>-->
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <!--<li class="ui_popover_tooltip"></li>-->
                    <li class="rad-dropmenu-header"><a href="#">Your Notifications</a></li>
                    <li>
                        <a class="rad-content" href="#">
                            <div class="pull-left"><i class="fa fa-html5 fa-2x color-red"></i>
                            </div>
                            <div class="rad-notification-body">
                                <div class="lg-text">Introduction to fetch()</div>
                                <div class="sm-text">The fetch API</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="rad-content" href="#">
                            <div class="pull-left"><i class="fa fa-bitbucket fa-2x color-violet"></i>
                            </div>
                            <div class="rad-notification-body">
                                <div class="lg-text">Check your BitBucket</div>
                                <div class="sm-text">Last Chance</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="rad-content" href="#">
                            <div class="pull-left"><i class="fa fa-google fa-2x color-info"></i>
                            </div>
                            <div class="rad-notification-body">
                                <div class="lg-text">Google Account</div>
                                <div class="sm-text">example@gmail.com</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="rad-content" href="#">
                            <div class="pull-left"><i class="fa fa-amazon fa-2x color-green"></i>
                            </div>
                            <div class="rad-notification-body">
                                <div class="lg-text">Amazon Simple Notification ...</div>
                                <div class="sm-text">Lorem Ipsum is simply dummy text...</div>
                            </div>
                        </a>
                    </li>
                    <li class="rad-dropmenu-footer"><a href="#">See all notifications</a></li>
                </ul>  <!-- /.dropdown-alerts -->
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.Dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="material-icons">person_add</i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="profile.html"><i class="ti-user"></i>&nbsp; Profile</a></li>
                    <li><a href="mailbox.html"><i class="ti-email"></i>&nbsp; My Messages</a></li>
                    <li><a href="lockscreen.html"><i class="ti-lock"></i>&nbsp; Lock Screen</a></li>
                    <li><a href="#"><i class="ti-settings"></i>&nbsp; Settings</a></li>
                    <li><a href="login.html"><i class="ti-layout-sidebar-left"></i>&nbsp; Logout</a></li>
                </ul><!-- /.dropdown-user -->
            </li><!-- /.Dropdown -->
            <li class="log_out">
                <a href="login.html">
                    <i class="material-icons">power_settings_new</i>
                </a>
            </li><!-- /.Log out -->
        </ul> <!-- /.navbar-top-links -->
    </div>
</nav>
