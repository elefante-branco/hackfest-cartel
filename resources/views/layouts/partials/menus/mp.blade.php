@extends('layouts.partials.menus.default')

@section('menu-itens')
    <li>
        <a href="{{ route('denuncias.index') }}">
            <i class="fa fa-users"></i> <span>Denúncias</span>
        </a>
    </li>
    <!--
    <li class="treeview">
        <a href="#">
            <i class="fa fa-users"></i>
            <span>Investigações</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="{{ route('denuncias.index') }}">
                    <i class="fa fa-circle-o"></i> Ver investigações
                </a>
            </li>
            <li>
                <a href="{{ route('denuncias.create') }}">
                    <i class="fa fa-circle-o"></i> Registrar nova investigação
                </a>
            </li>
        </ul>
    </li>
    -->
@endsection