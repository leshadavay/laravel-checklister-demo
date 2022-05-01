<header class="header header-sticky mb-4 flex-nowrap">

    <button class="header-toggler px-md-0 me-md-3 mx-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
        <svg class="icon icon-lg">
            <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-menu')}}"></use>
        </svg>
    </button>

    <div class="container-fluid justify-content-end">

        <a class="header-brand d-md-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="{{asset('assets/brand/coreui.svg#full')}}"></use>
            </svg>
        </a>
        <ul class="header-nav me-3">
            <li class="nav-item dropdown d-md-down-none">
                <a href="{{route('consultation')}}">{{__('Get Consultation')}}</a>
            </li>
        </ul>

        <ul class="header-nav me-3">
            <li class="nav-item dropdown d-md-down-none">
                <a class="nav-link" data-coreui-toggle="dropdown" href="{{route('welcome')}}" role="button" aria-haspopup="true" aria-expanded="false">
                    <svg class="icon icon-lg my-1 mx-2">
                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-envelope-open')}}"></use>
                    </svg>
                </a>
            </li>
        </ul>
        <ul class="header-nav me-4">
            <li class="nav-item dropdown d-flex align-items-center"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md"><img class="avatar-img" src="{{asset('assets/img/avatars/8.jpg')}}" alt="user@email.com"></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">Account</div>
                    </div>
                   {{-- <a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                        </svg> Profile</a><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                        </svg> Settings</a><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-credit-card"></use>
                        </svg> Payments<span class="badge badge-sm bg-secondary-gradient text-dark ms-2">42</span></a>
                    <div class="dropdown-divider"></div>--}}

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <svg class="icon me-2">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                        </svg>  {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>

    </div>
    {{--<div class="header-divider"></div>
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item">
                    <span>Home</span>
                </li>
                <li class="breadcrumb-item active"><span>Dashboard</span></li>
            </ol>
        </nav>
    </div>--}}
</header>
