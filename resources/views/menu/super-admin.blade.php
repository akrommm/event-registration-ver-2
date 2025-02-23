<ul class="side-nav-menu scrollable ps-theme-dark">
    <br>
    <li class="font-weight-bold ml-3">Menu</li>
    <li class="nav-item {{request()->is('super-admin/dashboard') ? 'active' : ''}}">
        <a href=" {{ url('super-admin/dashboard') }}">
            <span class="icon-holder">
                <i class="anticon anticon-dashboard"></i>
            </span>
            <span class="title">Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown closed">
        <a class="dropdown-toggle" href="javascript:void(0);">
            <span class="icon-holder">
                <i class="anticon anticon-inbox"></i>
            </span>
            <span class="title">Master Data</span>
            <span class="arrow">
                <i class="arrow-icon"></i>
            </span>
        </a>
        <ul class="dropdown-menu">
            <li class="{{request()->is('super-admin/pengguna') ? 'active' : ''}} ">
                <a href="{{ url('super-admin/pengguna') }}"><i class="anticon anticon-usergroup-add"></i> Pengguna</a>
            </li>
            <li class="{{request()->is('super-admin/module') ? 'active' : ''}} ">
                <a href="{{ url('super-admin/module') }}"><i class="anticon anticon-switcher"></i> Module</a>
            </li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
            <span class="icon-holder">
                <i class="anticon anticon-schedule"></i>
            </span>
            <span class="title">Event</span>
            <span class="arrow">
                <i class="arrow-icon"></i>
            </span>
        </a>
        <ul class="dropdown-menu">
            <li class="{{request()->is('super-admin/event') ? 'active' : ''}} ">
                <a href="{{ url('super-admin/event') }}"><i class="anticon anticon-schedule"></i> Manajemen Event</a>
            </li>
        </ul>
        <ul class="dropdown-menu">
            <li class="{{request()->is('super-admin/registration') ? 'active' : ''}} ">
                <a href="{{ url('super-admin/registration') }}"><i class="anticon anticon-reconciliation"></i> Registrasi Event</a>
            </li>
        </ul>
        <ul class="dropdown-menu">
            <li class="{{request()->is('super-admin/check-in') ? 'active' : ''}} ">
                <a href="{{ url('super-admin/check-in') }}"><i class="anticon anticon-scan"></i> Check In Event</a>
            </li>
        </ul>
        <ul class="dropdown-menu">
            <li class="{{request()->is('super-admin/manage-idcard') ? 'active' : ''}}">
                <a href="{{ url('super-admin/manage-idcard') }}"><i class="anticon anticon-idcard"></i> Kelola ID Card</a>
            </li>
        </ul>
    </li>
</ul>