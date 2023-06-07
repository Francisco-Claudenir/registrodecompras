@extends('layout.page', [
    'layout' => 'admin',
    'plugins' => ['validation_jquery'],
])

@section('title', ' - Cadastro de Usuário')

@section('content')
    @include('sweet::alert')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
    
                    <h4 class="card-title">Cadastro Usuário</h4>
    
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Usuário</a></li>
                    <li class="breadcrumb-item active"><a href="">Cadastro</a></li>
                </ol>
            </div>
        </div>
        <div class="row page-title mx-0">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">

                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf

                            {{-- NOME && CPF --}}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="mb-1"><strong>Nome</strong></label>
                                        <div class="input-group">
                                            <input type="text" name="nome"
                                                class="form-control @error('nome') is-invalid @enderror"
                                                value="{{ old('nome') }}" placeholder="Nome" required autocomplete="Nome"
                                                autofocus>
                                            <div class="input-group-text">
                                                <span class="flaticon-028-user-1"></span>
                                            </div>
                                        </div>
                                        {!! $errors->default->first('nome', '<span style="color:red" class="form-text">:message</span>') !!}
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-1"><strong>Cpf</strong></label>
                                        <div class="input-group">
                                            <input type="text" name="cpf"
                                                class="form-control @error('cpf') is-invalid @enderror"
                                                value="{{ old('cpf') }}" placeholder="Ex : 00000000000" required
                                                autocomplete="cpf" autofocus maxlength="11">
                                            <div class="input-group-text">
                                                <span class="flaticon-008-credit-card"></span>
                                            </div>
                                        </div>
                                        {!! $errors->default->first('cpf', '<span style="color:red" class="form-text">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                            {{-- ENDERECO --}}
                            <div class="form-group">
                                <div class="row mt-3">
                                    <div class="col-3">
                                        <label class="mb-1" for="telefone"><strong>Telefone</strong></label>
                                        <div class="input-group">
                                            <input type="text" name="telefone"
                                                class="form-control @error('telefone') is-invalid @enderror"
                                                value="{{ old('telefone') }}" placeholder="00 00000-00000" required
                                                autocomplete="phone">
                                            <div class="input-group-text">
                                                <span class="flaticon-136-phone-call"></span>
                                            </div>
                                        </div>
                                        {!! $errors->default->first('telefone', '<span style="color:red" class="form-text">:message</span>') !!}
                                    </div>
                                    <div class="col-3">
                                        <label class="mb-1" for="cep"><strong>Cep</strong></label>
                                        <div class="input-group">
                                            <input type="text" name="endereco[cep]" id="cep"
                                                class="form-control @error('endereco.cep') is-invalid @enderror"
                                                placeholder="0000000" required value="{{ old('endereco.cep') }}"
                                                maxlength="9" pattern="/^[0-9]{5}\-[0-9]{3}$/">
                                            {{-- <div class="input-group-text"> --}}
                                            <button type="button" class="input-group-text"
                                                onclick="pesquisacep(cep.value)">
                                                <span class="flaticon-381-search-1"></span>

                                            </button>
                                            {{-- </div> --}}
                                        </div>
                                        {!! $errors->default->first('endereco.cep', '<span style="color:red" class="form-text">:message</span>') !!}
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-1" for="endereco[bairro]"><strong>Bairro</strong></label>
                                        <div class="input-group">
                                            <input type="text" name="endereco[bairro]" id="bairro"
                                                class="form-control @error('endereco.bairro') is-invalid @enderror"
                                                placeholder="" autocomplete="email" required
                                                value="{{ old('endereco.bairro') }}">
                                            <div class="input-group-text">
                                                <span class="flaticon-381-location"></span>
                                            </div>
                                        </div>
                                        {!! $errors->default->first('endereco.bairro', '<span style="color:red" class="form-text">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-8">
                                        <label class="mb-1" for="endereco"><strong>Endereço</strong></label>
                                        <div class="input-group">
                                            <input type="text" name="endereco[endereco]" id="endereco"
                                                class="form-control @error('endereco.endereco') is-invalid @enderror"
                                                placeholder="Rua Teste" required autocomplete="endereco"
                                                value="{{ old('endereco.endereco') }}">
                                            <div class="input-group-text">
                                                <span class="flaticon-381-location"></span>
                                            </div>
                                        </div>
                                        {!! $errors->default->first('endereco.endereco', '<span style="color:red" class="form-text">:message</span>') !!}
                                    </div>
                                    <div class="col-4">
                                        <label class="mb-1" for="endereco[numero]"><strong>Número</strong></label>
                                        <div class="input-group">
                                            <input type="text" name="endereco[numero]"
                                                class="form-control @error('endereco.numero') is-invalid @enderror"
                                                placeholder="Ex 01" required value="{{ old('endereco.numero') }}">
                                            <div class="input-group-text">
                                                <span class="flaticon-381-location"></span>
                                            </div>
                                        </div>
                                        {!! $errors->default->first('endereco.numero', '<span style="color:red" class="form-text">:message</span>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">

                                </div>
                            </div>
                            {{-- EMAIL --}}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="mb-1" for="email"><strong>Email</strong></label>
                                        <div class="input-group">
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="seuemail@email.com" required autocomplete="email"
                                                value="{{ old('email') }}">
                                            <div class="input-group-text">
                                                <span class="flaticon-159-email"></span>
                                            </div>
                                        </div>
                                        {!! $errors->default->first('email', '<span style="color:red" class="form-text">:message</span>') !!}
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-1" for="perfil"><strong>Perfil</strong></label>
                                        <div class="input-group">
                                            <select
                                                class="default-select form-control @error('perfil_id') is-invalid @enderror wide mb-3"
                                                tabindex="null">
                                                <option disabled selected value="">
                                                    Selecione
                                                    uma opção</option>
                                                @foreach ($perfis as $perfil)
                                                    <option value="{{ $perfil->id }}">{{ $perfil->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {!! $errors->default->first('perfil_id', '<span style="color:red" class="form-text">:message</span>') !!}
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="mb-1" for="password"><strong>Senha</strong></label>
                                        <div class="input-group">
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror" required>
                                            <div class="input-group-text">
                                                <span class="flaticon-006-key"></span>
                                            </div>
                                        </div>
                                        {!! $errors->default->first('password', '<span style="color:red" class="form-text">:message</span>') !!}
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-1" for="password"><strong>Confirmar de
                                                senha</strong></label>
                                        <div class="input-group">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required>
                                            <div class="input-group-text">
                                                <span class="flaticon-006-key"></span>
                                            </div>
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {!! $errors->default->first('password', '<span style="color:red" class="form-text">:message</span>') !!}
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-success float-end mt-3" ; type="submit">Salvar</button>
                            <a class="btn btn-danger float-end mt-3 me-2" type="button"
                                href="{{ route('users.index') }}">Cancelar</a>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        //CEP
        function limpa_formulario_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('endereco').value = ("");
            document.getElementById('bairro').value = ("");

        }



        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('endereco').value = (conteudo.logradouro);
                document.getElementById('bairro').value = (conteudo.bairro);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulario_cep();
                sweetAlert("Oops...", "Cep não encontrado", "error");
                document.getElementById('cep').value = ("");
            }
        }



        function pesquisacep(valor) {


            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep !== "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('endereco').value = "...";
                    document.getElementById('bairro').value = "...";

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = '//viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulario_cep();
                    sweetAlert("Ops", "Formato de CEP inválido.", "error");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulario_cep();
            }
        }
    </script>

@endsection
