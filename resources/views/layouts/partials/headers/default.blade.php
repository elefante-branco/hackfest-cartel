<header class="main-header">
    <!-- Logo -->
    <a href="{{url('/')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Geo</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Geo</b>SUS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="pull-right">
                    <a id="logout" class="js-right-sidebar" href="#" onclick="event.preventDefault();document.getElementById('form-logout').submit();">
                        <i class="fa fa-sign-out"></i>
                    </a>
                    <form id="form-logout" action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</header>