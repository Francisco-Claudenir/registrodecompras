@extends('layout.page', [
    'layout' => 'auth',
])

@section('title', ' - Login')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="authincation-content">
                <div class="row no-gutters">
                    <div class="col-xl-12">
                        <div class="auth-form">
                            <div class="text-center mb-3">
                                <a href="https://www.uema.br/" target="_blank">
                                    <img src="images/uema/svg/logo_uema.svg" class="img-fluid" alt="">
                                </a>
                            </div>
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="mb-1"><strong>Cpf</strong></label>
                                    <div class="input-group">
                                        <input type="text" name="cpf"
                                            class="form-control @error('cpf') is-invalid @enderror"
                                            value="{{ old('cpf') }}" placeholder="cpf" autocomplete="cpf" autofocus>
                                        <div class="input-group-text">
                                            <span class="flaticon-381-user"></span>
                                        </div>
                                    </div>
                                </div>
                                {{-- {!! $errors->first('usuario', '<span style="color:red" class="form-text">:message</span>') !!} --}}
                                {!! $errors->default->first('cpf', '<span style="color:red" class="form-text">:message</span>') !!}
                                <div class="form-group">
                                    <label class="mb-1"><strong>Senha</strong></label>
                                    <div class="input-group">
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Senha">
                                        <div class="input-group-text">
                                            <span class="flaticon-381-key"></span>
                                        </div>
                                    </div>
                                </div>
                                {!! $errors->first('password', '<span style="color:red" class="form-text">:message</span>') !!}
                                <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox ms-1">
                                            <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                                            <label class="form-check-label" for="basic_checkbox_1">Lembrar-me</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{route('password.request')}}">Esqueci minha senha</a>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Log In</button>
                                </div>
                            </form>
                            <div class="new-account mt-3">
                                <p>
                                    Não possui cadastro?
                                    <a class="text-primary" href="{!! url('/register') !!}">Cadastre-se</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
