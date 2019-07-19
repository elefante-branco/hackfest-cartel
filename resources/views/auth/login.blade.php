@extends('layouts.blank')

@section('content')
    <div class="container">
        <div class="login-box">
            <div class="login-box-body">
                <div class="login-logo">
                    <a href="{{url('/')}}"><b>Geo</b>SUS</a>
                </div>

                <p class="login-box-msg">Entre para ter acesso à sua pagina pessoal</p>
                <div class="login-wrap">
                    {!! Form::open(['url' => route('login')]) !!}
                        <div class="form-group has-feedback">
                            <input id="cpf" type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}"
                                   name="cpf" value="{{ old('cpf') }}" placeholder="CPF" maxlength="14"
                                   required autofocus >
                            @if ($errors->has('cpf'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cpf') }}</strong>
                                </span>
                            @endif
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" placeholder="Senha" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-7">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Lembrar de mim') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    {{ __('Entrar') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <div class="text-center">
                                <a class="btn btn-link" href="{{ url('/') }}">
                                    {{ __('Esqueceu sua senha?') }}
                                </a>
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
    <script>
        {{--$.backstretch("{{ asset('img/bg_login.jpeg') }}", {--}}
            {{--speed: 500,--}}
        {{--});--}}
    </script>
    <script src="{{asset('plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script>
        var cpfMaskDefinition = {
            mask: '999.999.999-99',
            options: {
                removeMaskOnSubmit: true, showMaskOnHover: false, clearMaskOnLostFocus: true
            }
        };
        $(function () {
            $('#cpf').inputmask(cpfMaskDefinition.mask, cpfMaskDefinition.options);
        });
    </script>
@endsection
