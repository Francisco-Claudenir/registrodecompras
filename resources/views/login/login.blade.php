{{-- Extends layout --}}
@extends('layout.fullwidth')



{{-- Content --}}
@section('content')
    <div class="col-md-6">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
                        <div class="text-center mb-3">
                            <a href="https://www.uema.br/" target="_blank">
                                <img src="images/uema/logo_uema.png" class="img-fluid" alt="">
                            </a>
                        </div>
                        <h4 class="text-center mb-4">Entre com seu login siguema</h4>
                        <form action="{!! url('/index') !!}">
                            <div class="form-group">
                                <label class="mb-1"><strong>Usuário</strong></label>
                                <input type="text" class="form-control" placeholder="Digite aqui.">
                            </div>
                            <div class="form-group">
                                <label class="mb-1"><strong>Senha</strong></label>
                                <input type="password" class="form-control" value="Password">
                            </div>
                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox ms-1">
                                        <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                                        <label class="form-check-label" for="basic_checkbox_1">Lembrar-me</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="{!! url('/page-forgot-password') !!}">Esqueci minha senha</a>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Log In</button>
                            </div>
                        </form>
                        {{-- <div class="new-account mt-3">
                            <p>Não possui cadastro? <a class="text-primary" href="{!! url('/page-register'); !!}">Cadastre-se</a></p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
