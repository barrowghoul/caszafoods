<div class="sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-heading "> <span>Main Navigation&nbsp;&nbsp;&nbsp;&nbsp;------</span></li>
            <li class="active"><a href="index.html" class="material-ripple"><i class="material-icons">home</i> Dashboard</a></li>
            <li class="nav-heading "> <span>{{ __('Purchases') }}&nbsp;&nbsp;&nbsp;&nbsp;------</span></li>
            @if(auth()->user()->can('ver requisiciones'))
                <li><a href="{{ route('requisitions.index') }}"><i class="material-icons">widgets</i>{{ __('Requisitions') }}</a></li>
            @endif
            @if(auth()->user()->can('ver oc'))
                <li><a href="calender.html"><i class="material-icons">bookmark</i>{{ __('Purchase Orders') }}</a></li>
            @endif
            @if(auth()->user()->can('ver recepciones'))
                <li><a href="calender.html"><i class="material-icons">assignment_turned_in</i>{{ __('Receptions') }}</a></li>
            @endif

            <li class="nav-heading "> <span>{{ __('Inventory') }}&nbsp;&nbsp;&nbsp;&nbsp;------</span></li>
            <li><a href="widgets.html"><i class="material-icons">view_list</i>{{ __('Items') }}</a></li>
            <li><a href="calender.html"><i class="material-icons">web</i>{{ __('Families') }}</a></li>
            <li><a href="calender.html"><i class="material-icons">dvr</i>{{ __('Units') }}</a></li>
            <li class="nav-heading "> <span>{{ __('Accounts Payable') }}&nbsp;&nbsp;&nbsp;&nbsp;------</span></li>
            @if(auth()->user()->can('ver facturas'))
                <li><a href="calender.html"><i class="material-icons">receipt</i>{{ __('Invoices') }}</a></li>
            @endif
            @if(auth()->user()->can('ver proveedores'))
                <li><a href="{{ route('vendors.index') }}"><i class="material-icons">supervisor_account</i>{{ __('Vendors') }}</a></li>
            @endif
            <li class="nav-heading "> <span>{{ __('System Settings') }}&nbsp;&nbsp;&nbsp;&nbsp;------</span></li>
            <li>
                <a href="#" class="material-ripple"><i class="material-icons">file_upload</i>{{ __('Import') }}<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    @if(auth()->user()->can('importar items'))
                        <li><a href="{{ route('import.items') }}">{{ __('Inventory') }}</a></li>
                    @endif
                    <li><a href="timeline.html">Vertical timeline</a></li>
                    <li><a href="horizontal_timeline.html">Horizontal timeline</a></li>
                    <li><a href="pricing.html">Pricing Table</a></li>
                    <li><a href="slider.html">Slider</a></li>
                    <li><a href="carousel.html">Carousel</a></li>
                    <li><a href="code_editor.html">Code editor</a></li>
                    <li><a href="gridSystem.html">Grid System</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="material-ripple"><i class="material-icons">devices_other</i>Other pags<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="login.html">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="forget_password.html">Forget password</a></li>
                    <li><a href="lockscreen.html">Lockscreen</a></li>
                    <li><a href="404.html">404 Error</a></li>
                    <li><a href="505.html">505 Error</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="material-ripple"><i class="material-icons">invert_colors</i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="#">Second Level Item</a></li>
                    <li><a href="#">Second Level Item</a></li>
                    <li>
                        <a href="#">Third Level <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li><a href="#">Third Level Item</a></li>
                            <li><a href="#">Third Level Item</a></li>
                            <li><a href="#">Third Level Item</a></li>
                            <li><a href="#">Third Level Item</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="blank.html" class="material-ripple"><i class="material-icons">check_box_outline_blank</i> Blank page</a></li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
