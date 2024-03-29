@extends('layouts.app')

@push('style')
    <!-- Tabela responsiva -->
    <link rel="stylesheet" href="{{asset('css/table-responsive.css')}}">
@endpush

@section('content-header')
    <h1>
        Investigações
    </h1>
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Suas Investigações</h3>
                        <!--
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                        -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if($contextos->count())
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                    <tr>
                                        <th class="col-md-5">Nome</th>
                                        <th class="col-md-3">Nº de entidades envolvidas</th>
                                        <th class="col-md-2">Data de criação</th>
                                        <th class="col-md-2">Opções</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contextos as $contexto)
                                        <tr>
                                            <td>
                                                <a href="{{route('contextos.show', $contexto->id)}}">
                                                    {{$contexto->nome}}
                                                </a>
                                            </td>
                                            <td>{{$contexto->entidades->count()}}</td>
                                            <td>{{$contexto->created_at->format('d/m/Y')}}</td>
                                            <td>
                                                <a href="{{route('contextos.show', $contexto->id)}}" class="btn btn-success btn-xs">
                                                    Ver
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        @else
                            <p>Não há investigações registradas</p>
                        @endif
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a class="btn btn-sm btn-info btn-flat pull-right"
                           data-toggle="modal"
                           data-target="#modal-contexto-create">
                            Registrar nova investigação
                        </a>
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="modal-contexto-create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Formulário de registrar nova investigação</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="{{route('contextos.store')}}" method="POST" id="form-contexto-create">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="realizacao_dt">Nome da investigação</label>
                                    <span class="text-red">*</span>
                                    <input type="text" class="form-control"
                                           name="nome" id="nome"
                                           value="{{old('nome')}}" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="pull-left">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                    <div class="pull-right">
                        <button type="button" id="btn-send" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@push('scripts-footer')
    <script>
        $('#btn-send').click(function (ev) {
            $('#form-contexto-create').submit();
        });
    </script>
@endpush