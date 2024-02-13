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
                    @if(Auth::user()->unreadNotifications->count() > 0)
                        <div class="notify"> <span class="heartbit"></span> <span class="label label-pill label-danger">{{ Auth::user()->unreadNotifications->count() }}</span> </div>
                    @endif
                    <!--<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>-->
                    <!--<i class="ti-announcement"></i>-->
                    <!--<i class="ti-angle-down"></i>-->
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <!--<li class="ui_popover_tooltip"></li>-->
                    <li class="rad-dropmenu-header"><a href="#">{{ __('Your Notifications') }}</a></li>
                    @forelse (Auth::user()->notifications as $notification)
                        <li>
                            <a class="rad-content" href="{{ $notification->data['url'] }}">
                                <!--<div class="pull-left"><i class="fa fa-html5 fa-2x color-red"></i>
                                </div>-->
                                <div class="rad-notification-body">
                                    <div class="lg-text">{{ $notification->data['title'] }}</div>
                                    <div class="sm-text">{{ $notification->data['message'] }}</div>
                                    <div class="sm-text">{{ $notification->created_at->diffForHumans() }}</div>
                                </div>
                            </a>
                        </li>
                    @empty
                        <li>
                            <a class="rad-content" href="#">
                                <!--<div class="pull-left"><i class="fa fa-html5 fa-2x color-red"></i>
                                </div>-->
                                <div class="rad-notification-body">
                                    <div class="lg-text">{{ __('No notifications') }}</div>
                                </div>
                            </a>
                        </li>
                    @endforelse
                    <li class="rad-dropmenu-footer"><a href="{{ route('notifications') }}">See all notifications</a></li>
                </ul>  <!-- /.dropdown-alerts -->
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.Dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="material-icons">person_add</i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{ route('profile') }}"><i class="ti-user"></i>&nbsp; Profile</a></li>
                    <li><a href="lockscreen.html"><i class="ti-lock"></i>&nbsp; Lock Screen</a></li>
                    @if(Auth::user()->hasRole('Administrador'))
                        <li><a href="{{ route('settings') }}"><i class="ti-settings"></i>&nbsp; {{ __('Settings') }}</a></li>
                    @endif
                    @if(Auth::user()->hasRole('Administrador'))
                        <li><a href="{{ route('users') }}"><i class="ti-user"></i>&nbsp; {{ __('Users') }}</a></li>
                    @endif
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="ti-layout-sidebar-left"></i>&nbsp; {{ __('Logout') }}
                            </a>
                        </form>
                    </li>
                </ul><!-- /.dropdown-user -->
            </li><!-- /.Dropdown -->
            <li class="log_out">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="material-icons">power_settings_new</i>
                    </a>
                </form>
            </li><!-- /.Log out -->
        </ul> <!-- /.navbar-top-links -->
    </div>
</nav>
