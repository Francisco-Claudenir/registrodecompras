@extends('layout.page', [
    'layout' => 'home',
    'plugins' => ['validation_jquery'],
])

@section('title', ' - Editar Profile')

@section('content')
    <div class="container-fluid">
        <!-- Add Project -->
        @include('sweet::alert')

        <div class="row page-titles mx-0">

            <div class="col-sm-6 p-md-0 ">

                <div class="welcome-text">

                    <h4 class="card-title">{{ $dadosUser->nome }}</h4>

                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">

                    <a class="btn btn-sm btn-primary" type="button" href="{{ route('home') }}"><i
                            class="fas fa-arrow-left"></i>
                        Voltar</a>
                </ol>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
        <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 col-sm-12 col-md-12 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill ">
                                <div class="card-body pt-4" style="background-color: #fafafa">

                                    <li><strong>Nome: </strong><span> {{ $dadosUser->nome }}</span></li><br>
                                    <li><strong>Cpf: </strong><span id="cpf"> {{ $dadosUser->cpf($dadosUser->cpf) }}</span></li><br>
                                    <li><strong>Email: </strong><span></span> {{ $dadosUser->email }}</li><br>
                                    <li><strong>Telefone: </strong><span id="telefone"> {{ $dadosUser->telefone }}</span>
                                    </li><br>
                                    <li><strong>Endereço: </strong><span>{{ $endereco['endereco'] }}</span></li><br>
                                    <li><strong>Bairro: </strong>{{ $endereco['bairro'] }}<span></span></li><br>
                                    <li><strong>Número: </strong><span>{{ $endereco['numero'] }}</span></li><br>
                                    <li><strong>Cep: </strong><span>{{ $endereco['cep'] }}</span></li><br>
                                    <li><strong>Perfil criado em:
                                        </strong><span>{{ date_format($dadosUser->created_at, 'd/m/Y - H:i:s') }}</span>
                                    </li><br>
                                    <li><strong>Ultima atualização:
                                        </strong><span>{{ date_format($dadosUser->updated_at, 'd/m/Y - H:i:s') }}</span>
                                    </li><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 col-sm-12 col-md-12 d-flex align-items-stretch flex-column float-l">
                            <div class="card-body pt-4">
                                <form action="{{ route('profile.update', $dadosUser->id) }}" method="post">
                                    @csrf
                                    @method('put')

                                    {{-- NOME && CPF --}}
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-7 col-lg-8">
                                                <label class="mb-1"><strong>Nome</strong></label>
                                                <div class="input-group">
                                                    <input type="text" name="nome" id="nome"
                                                        class="form-control @error('nome') is-invalid @enderror"
                                                        value="{{ $dadosUser->nome }}" placeholder="Nome" required
                                                        autocomplete="Nome" autofocus disabled>
                                                    <div class="input-group-text">
                                                        <span class="flaticon-028-user-1"></span>
                                                    </div>
                                                </div>
                                                {!! $errors->default->first('nome', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="col-sm-12 col-md-5 col-lg-4">
                                                <label class="mb-1" for="telefone"><strong>Telefone</strong></label>
                                                <div class="input-group">
                                                    <input type="text" name="telefone" id="telefone1"
                                                        class="form-control @error('telefone') is-invalid @enderror"
                                                        value="{{ $dadosUser->telefone }}" placeholder="00 00000-00000"
                                                        required autocomplete="phone" disabled>
                                                    <div class="input-group-text">
                                                        <span class="flaticon-136-phone-call"></span>
                                                    </div>
                                                </div>
                                                {!! $errors->default->first('telefone', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ENDERECO --}}
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-3 col-lg-4">
                                                <label class="mb-1" for="cep"><strong>Cep</strong></label>
                                                <div class="input-group">
                                                    <input type="text" name="endereco[cep]" id="cep"
                                                        class="form-control @error('endereco.cep') is-invalid @enderror"
                                                        placeholder="0000000" required value="{{ $endereco['cep'] }}"
                                                        maxlength="9" pattern="/^[0-9]{5}\-[0-9]{3}$/" disabled>
                                                    {{-- <div class="input-group-text"> --}}
                                                    <button type="button" class="input-group-text" id="pesquisarcep"
                                                        onclick="pesquisacep(cep.value)" disabled>
                                                        <span class="flaticon-381-search-1"></span>
                                                    </button>
                                                </div>
                                                {!! $errors->default->first('endereco.cep', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-4">
                                                <label class="mb-1" for="endereco[bairro]"><strong>Bairro</strong></label>
                                                <div class="input-group">
                                                    <input type="text" name="endereco[bairro]" id="bairro"
                                                        class="form-control @error('endereco.bairro') is-invalid @enderror"
                                                        placeholder="" autocomplete="email" required
                                                        value="{{ $endereco['bairro'] }}" disabled>
                                                    <div class="input-group-text">
                                                        <span class="flaticon-381-location"></span>
                                                    </div>
                                                </div>
                                                {!! $errors->default->first('endereco.bairro', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="col-sm-12 col-md-3 col-lg-4">
                                                <label class="mb-1" for="endereco[numero]"><strong>Número</strong></label>
                                                <div class="input-group">
                                                    <input type="text" name="endereco[numero]" id="numero"
                                                        class="form-control @error('endereco.numero') is-invalid @enderror"
                                                        placeholder="Ex 01" value="{{ $endereco['numero'] ?: '' }}"
                                                        disabled>
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
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <label class="mb-1" for="endereco"><strong>Endereço</strong></label>
                                                <div class="input-group">
                                                    <input type="text" name="endereco[endereco]" id="endereco"
                                                        class="form-control @error('endereco.endereco') is-invalid @enderror"
                                                        placeholder="Rua Teste" required autocomplete="endereco"
                                                        value="{{ $endereco['endereco'] }}" disabled>
                                                    <div class="input-group-text">
                                                        <span class="flaticon-381-location"></span>
                                                    </div>
                                                </div>
                                                {!! $errors->default->first('endereco.endereco', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-success float-end mt-3" ; type="submit" id="bsalvar" disabled>Salvar</button>

                                    <a class="btn btn-info float-end mt-3 me-2"type="button" id="habilitarDesabilitar"
                                        onclick="alternarHabilitacaoElementos(['nome', 'cep', 'bairro', 'numero', 'endereco', 'telefone1', 'pesquisarcep', 'bsalvar'])">Habilitar
                                        Campos</a>

                                    <button type="button" class="btn btn-warning float-end mt-3 me-2"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        data-bs-whatever="{{ $dadosUser->nome }}">Alterar Senha</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Alterar Senha --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('profile.updateSenha') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Alterar senha ({{ $dadosUser->nome }})</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Senha atual:</label>
                            <input type="password" id="recipient-name"
                                class="form-control {{ $errors->has('old_password') ? 'is-invalid' : '' }}"
                                name="old_password" placeholder="" required>
                            @if ($errors->has('old_password'))
                                <strong class="text-red">
                                    <small>
                                        {{ $errors->first('old_password') }}
                                    </small>
                                </strong>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nova senha:</label>
                            <input type="password" id="recipient-name"
                                class="form-control {{ $errors->has('new_password') ? 'is-invalid' : '' }}"
                                name="new_password" placeholder="" required>
                            @if ($errors->has('new_password'))
                                <strong class="text-red">
                                    <small>
                                        {{-- $errors->first('new_password') --}}
                                        {!! $errors->default->first('new_password', '<span style="color:red" class="form-text">:message</span>') !!}
                                    </small>
                                </strong>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Confirme sua nova senha:</label>
                            <input type="password" id="recipient-name"
                                class="form-control {{ $errors->has('new_password_confirmation') ? 'is-invalid' : '' }}"
                                name="new_password_confirmation" placeholder="" required>
                            @if ($errors->has('new_password_confirmation'))
                                <strong class="text-red">
                                    <small>
                                        {{ $errors->first('new_password_confirmation') }}
                                    </small>
                                </strong>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger float-end mt-3"
                            data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary float-end mt-3">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('scripts')

    <script src="/js/jquery.maskedinput.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#cep").mask("99999-999", {});
            $("#telefone1").mask("(99) 99999-9999", {});
        })
    </script>

    <script>
        function alternarHabilitacaoElementos(elementIds) {

            var todosDesabilitados = true;

            for (var i = 0; i < elementIds.length; i++) {
                var elemento = document.getElementById(elementIds[i]);

                if (elemento) { // Verifica se o elemento com o id existe
                    if (elemento.hasAttribute('disabled')) {
                        elemento.removeAttribute('disabled');
                    } else {
                        elemento.setAttribute('disabled', 'true');
                        todosDesabilitados = false;
                    }
                }
            }

            var botaoElement = document.getElementById('habilitarDesabilitar');
            botaoElement.innerText = todosDesabilitados ? 'Desabilitar Campos' : 'Habilitar Campos';
        }
    </script>

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
