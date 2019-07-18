@extends('partials.menus.default')

@section('menu-itens')
    <li>
        <a href="{{ route('pacientes.create') }}">
            <i class="fa fa-user-plus"></i> <span>Cadastrar Paciente</span>
        </a>
    </li>
    <li>
        <a href="{{ route('tratamentos.index') }}">
            <i class="fa fa-list"></i> <span>Tratamentos</span>
        </a>
    </li>
@endsection