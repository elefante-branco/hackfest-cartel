@extends('layouts.app')

@push('style')
    <!-- Tabela responsiva -->
    <link rel="stylesheet" href="{{asset('css/table-responsive.css')}}">
@endpush

@section('content-header')
    <h1>
        Investigação <b>{{$contexto->nome}}</b>
    </h1>
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informações</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a class="btn btn-sm btn-default btn-flat pull-left" href="{{route('contextos.index')}}">
                            Voltar
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