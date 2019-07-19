@extends('layouts.app')

@section('content-header')
    <h1>
        Registrar novo contexto de investigação
    </h1>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Formulário de registro</h3>
                    </div>
                    <div class="box-body with-border">
                        <form role="form" action="{{route('contextos.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="realizacao_dt">Data de realização</label><span
                                                class="text-red"> *</span>
                                        <input type="text" />
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="resultado">Resultado</label><span class="text-red"> *</span>
                                        <select class="form-control" id="resultado_tipo_exame_id"
                                                name="resultado_tipo_exame_id" required>
                                            <option value="">Escolha uma opção...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="observacao">Observação</label>
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="pull-left">
                                <a href="{{route('contextos.index')}}"
                                   class="btn btn-default">Cancelar</a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

    <div class="modal fade" id="modal-contexto-create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{{$historico->cid->apresentar}}</h4>
                </div>
                <div class="modal-body">
                    <p>
                        <b>Data de registro</b>: {{$historico->created_at->format('d/m/Y')}}.<br/>
                        <b>Status</b>: {!! $historico->status_formatado !!}<br/>
                    </p>
                </div>
                <div class="modal-footer">
                    <div class="pull-left">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                    <div class="pull-right">
                        {!! Form::open(['url' => route('pacientes.historicos.destroy', [$paciente->id, $historico->id]),
                        'role' => 'form']) !!}
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Apagar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@prepend('scripts-footer')
    <!-- InputMask -->
    <script src="{{asset('plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{asset('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>

    <script>
        $('#realizacao_dt').inputmask('dd/mm/yyyy');
    </script>
@endprepend