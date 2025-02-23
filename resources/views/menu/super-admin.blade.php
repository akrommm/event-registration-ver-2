<ul class="side-nav-menu scrollable ps-theme-dark">
    <br>
    <li class="font-weight-bold ml-3">Menu</li>
    <li class="nav-item dropdown closed">
        <a class="dropdown-toggle" href="javascript:void(0);">
            <span class="icon-holder">
                <i class="fas fa-archive"></i>
            </span>
            <span class="title">MASTER DATA</span>
            <span class="arrow">
                <i class="arrow-icon"></i>
            </span>
        </a>
        <ul class="dropdown-menu">
            <li class="{{request()->is('super-admin/master-data/user') ? 'active' : ''}} ">
                <a href="{{ url('super-admin/master-data/user') }}"><i class="far fa-user"></i> Pengguna</a>
            </li>
            <li class="{{request()->is('super-admin/master-data/module') ? 'active' : ''}} ">
                <a href="{{ url('super-admin/master-data/module') }}"><i class="far fa-clone"></i> Module</a>
            </li>
        </ul>
    </li>
</ul>