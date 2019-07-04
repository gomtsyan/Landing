<!-- Brand -->
<a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">{{$title}}</a>

<!-- User -->
<ul class="navbar-nav align-items-center d-none d-md-flex">
    <li class="nav-item dropdown">
        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="{{ asset('assets_admin/img/theme/home.png') }}">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                </div>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <a href="{{ route('logout') }}" class="dropdown-item"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="ni ni-user-run"></i>
                <span>{{ __('Logout') }}</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
</ul>
