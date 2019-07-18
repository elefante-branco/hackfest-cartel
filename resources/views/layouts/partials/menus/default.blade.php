<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU DE NAVEGAÇÃO</li>
            <li>
                <a href="{{ url('/') }}">
                    <i class="fa fa-th"></i> <span>Início</span>
                </a>
            </li>
            @yield('menu-itens')
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>