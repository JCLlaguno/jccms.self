<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Main</div>
                    <a class="nav-link" href="{{route('admin')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="{{route('admin.users')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                        Users
                    </a>
                    <a class="nav-link" href="{{route('admin.posts')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Posts
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
                 @if(Auth::check())
                    {{auth()->user()->name}}
                @endif
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            @yield('content')
        </main>
    </div>
</div>