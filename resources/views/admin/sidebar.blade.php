<!-- Toggler -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<!-- Brand -->
<a class="navbar-brand pt-0" href="{{route('admin')}}">
    <img src="{{ asset('assets_admin/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
</a>

<!--SMALL Logout -->
<a href="#!" class="nav  d-md-none">
    <i class="ni ni-user-run"></i>
    <span>Logout</span>
</a>


<!--Side Collapse -->
<div class="collapse navbar-collapse" id="sidenav-collapse-main">

    <!--SMALL Collapse header -->
    <div class="navbar-collapse-header d-md-none">
        <div class="row">
            <div class="col-6 collapse-brand">
                <a href="{{route('admin')}}">
                    <img src="{{ asset('assets_admin/img/brand/blue.png') }}">
                </a>
            </div>
            <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('pages')}}">
                <i class="ni ni-bullet-list-67 text-info"></i> Pages
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('portfolio')}}">
                <i class="ni ni-briefcase-24 text-orange"></i> Portfolio
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('services')}}">
                <i class="ni ni-app text-blue"></i> Services
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('clients')}}">
                <i class="ni ni-paper-diploma text-yellow"></i> Clients
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('workers')}}">
                <i class="ni ni-circle-08 text-red"></i> Workers
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('contacts')}}">
                <i class="ni ni-badge text-green"></i> Contacts
            </a>
        </li>
    </ul>


</div>