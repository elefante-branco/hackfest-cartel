@extends('partials.menus.default')

@section('menu-itens')
    <li>
        <a href="{{ route('profissionais.index') }}">
            <i class="fa fa-users"></i> <span>Profissionais</span>
        </a>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-user-plus"></i>
            <span>Cadastrar</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="{{ route('profissionais.create') }}">
                    <i class="fa fa-circle-o"></i> Profissional de Saúde
                </a>
            </li>
        </ul>
    </li>
@endsection