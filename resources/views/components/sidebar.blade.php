<div class="sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-heading "> <span>{{ __('Main Menu') }}&nbsp;&nbsp;&nbsp;&nbsp;------</span></li>
            <li class="active"><a href="{{ route('dashboard') }}" class="material-ripple"><i class="material-icons">home</i> Dashboard</a></li>
            @if(auth()->user()->can('ver oc'))
                <li><a href="{{ route('purchase.menu') }}"><i class="material-icons">bookmark</i>{{ __('Purchases') }}</a></li>
            @endif
            <li><a href="{{ route('inventory.menu') }}"><i class="material-icons">view_list</i>{{ __('Inventory') }}</a></li>
            @if(auth()->user()->can('ver facturas'))
                <li><a href="{{ route('accounts-payable.menu') }}"><i class="material-icons">receipt</i>{{ __('Accounts Payable') }}</a></li>
            @endif
            <li><a href="{{ route('production.menu') }}"><i class="material-icons">format_color_fill</i>{{ __('Production') }}</a></li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
