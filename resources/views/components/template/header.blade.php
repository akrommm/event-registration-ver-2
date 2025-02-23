<div class="header">
    <div class="logo logo-dark">
        <a href="index.html">
            <img src="{{ url('/') }}/assets/images/logo/accestix.png" alt="Logo" width="60%" height="57" class="m-5">
            <img class="logo-fold mt-2 ml-3" src="{{ url('/') }}/assets/images/logo/accestix-2.png" alt="Logo" width="50%" height="55">
        </a>
    </div>
    <div class="logo logo-white">
        <a href="index.html">
            <img src="{{ url('/') }}/assets/images/logo/HIPMI.png" alt="Logo" width="25%" height="57" class="m-5">
            <img class="logo-fold mt-2 ml-3" src="{{ url('/') }}/assets/images/logo/HIPMI.png" alt="Logo" width="70%" height="57">
        </a>
    </div>
    <div class="nav-wrap">
        <ul class="nav-left">
            <li class="desktop-toggle">
                <a href="javascript:void(0);">
                    <i class="anticon"></i>
                </a>
            </li>
            <li class="mobile-toggle">
                <a href="javascript:void(0);">
                    <i class="anticon"></i>
                </a>
            </li>
        </ul>

        <ul class="nav-right">
            <li class="dropdown dropdown-animated scale-left">
                <div class="pointer" data-toggle="dropdown">
                    <div class="avatar avatar-image  m-h-10 m-r-15">
                        @if (auth()->user()->foto)
                        <img src="{{url('/'.auth()->user()->foto)}}" alt="">
                        @else
                        <img src="{{url('/')}}/assets/images/logo/profile.jpg" alt="User Avatar">
                        @endif
                    </div>
                </div>
                <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                    <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-lg avatar-image">
                                <img src="{{ auth()->user()->foto ? url('/'.auth()->user()->foto) : url('/assets/images/logo/profile.jpg') }}" alt="User Avatar">
                            </div>
                            @if (auth()->check())
                            <div class="m-l-10">
                                <p class="text-dark font-weight-semibold mb-0">{{ auth()->user()->nama }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                    <a href="{{ url('admin/profile') }}" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                <span class="m-l-10">Edit Profile</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                    <a href="{{ url('logout') }}" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                <span class="m-l-10">Logout</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                </div>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">
                    <i class="anticon anticon-appstore"></i>
                </a>
            </li>
        </ul>
    </div>
</div>