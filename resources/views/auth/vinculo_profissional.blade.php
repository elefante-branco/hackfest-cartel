@extends('layouts.blank')

@section('content')
    <div class="container">
        <div class="login-box">
            <div class="login-box-body">
                <div class="login-logo">
                    <a href="{{url('/')}}"><b>Geo</b>SUS</a>
                </div>

                <p class="login-box-msg">Selecione um dos seus vínculos profissionais</p>
                <div class="login-wrap">
                    {!! Form::open(['url' => route('login.vinculo_profissional.store')]) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <b>Planos terapêuticos</b>:<br/>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover"
                                       id="table-planos">
                                    <thead>
                                    <tr>
                                        <th class="col-md-1">#</th>
                                        <th class="col-md-11">Estabelecimento de saúde</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody-planos">
                                    @foreach($vinculos as $vinculo)
                                        <tr>
                                            <td>
                                                <input type="radio" name="profissional_estabelecimento_id"
                                                       value="{{$vinculo->id}}"/>
                                            </td>
                                            <td>
                                                <span>
                                                    {{ $vinculo->estabelecimento_saude->apresentar }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="box-footer">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                                        {{ __('Entrar') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <img src="{{ asset('img/logo_lais.png') }}" style="width: 100%">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="{{ asset('js/jquery.backstretch.min.js') }}"></script>
@endsection
