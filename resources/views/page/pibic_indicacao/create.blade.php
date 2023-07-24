@extends('layout.page', [
    'layout' => 'evt',
])

@section('title', ' - Inscrição')
@section('content-header')
    @include('sweet::alert')
    <div class="container-fluid ">
        <div class="card">
            <div class="container">
                <div class="d-flex flex-column ">

                    <img src="{{ asset('images/pibic/LOGO-PIBIC-2022.png') }}" alt="" srcset="" width="full"
                         height="full">
                    <div class="pt-4 pb-4">
                        <span class="mt-4"><strong>{{ $pibics->nome }}</strong></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <form action="{{route('pibicindicacao.inscricao.store',['pibicindicacao_id' => $pibics->pibicindicacao_id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-xl-12 p-lg-4 ">
                    <div class="row justify-content-center">
                        <h3 class="text-primary d-inline text-center p-4">Inscrição</h3>
                        <div class="col-lg-8 col-md-11 col-sm-11">
                            <div class="card border shadow-sm">
                                <div class="card-body">
                                    @include('page.pibic_indicacao.form')
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="card border shadow-sm">
                                <div class="card-body">
                                    <a href="" onclick="history.back()"
                                       class="btn btn-dark float-start">Voltar</a>
                                    <button type="submit" class="btn btn-primary float-end">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>

@endsection
@section('css')
    <style>
        .bootstrap-select .btn {
            height: 3.5rem !important;
        }

        @media (max-width: 1402px) {
            .bootstrap-select .btn {
                height: 2.5rem !important;
            }
        }

        .form-control::-webkit-file-upload-button {
            height: 55px !important;
        }

        @media (max-width: 1400px) {
            .form-control::-webkit-file-upload-button {
                height: 40px !important;
            }

            ..bootstrap-select .dropdown-toggle .filter-option-inner-inner {
                height: 2.2rem !important;
            }

        }
    </style>
@endsection
@section('scripts')
    <script src="/js/jquery.maskedinput.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#cep").mask("99999-999", {});
            $("#cpf_bolsista").mask("999.999.999-99", {});
            $("#cpf_orientador").mask("999.999.999-99", {});
            $("#telefone_orientador").mask("(99) 99999-9999", {});
            $("#telefone_bolsista").mask("(99) 99999-9999", {});
        })
    </script>
    <script>
        $('#lightgallery2').lightGallery({
            loop: true,
            thumbnail: true,
            exThumbImage: 'data-exthumbimage'
        });
    </script>

    <script>
        $('.curso').hide();

        $('select[name=centro_bolsista]').change(function () {

            var centro = $(this).val();

            $('.curso').show();

            var dados = {
                _token: '{{ csrf_token() }}',
                centro: centro
            };

            $.ajax({
                url: '{{ route('getCurso') }}',
                type: 'POST',
                data: dados,
                dataType: 'json',
                beforeSend: function () {
                    $('select[name=curso_bolsista]').append('<option>Carregando</option>')
                },
                success: function (cursos) {

                    $('select[name=curso_bolsista]').empty();
                    $('select[name=curso_bolsista]').append(
                        '<option value="">Selecione o curso</option>');

                    $.each(cursos, function (key, value) {
                        console.log(key, value);
                        $('select[name=curso_bolsista]').append('<option value="' + value.id +
                            '">' + value.cursos + '</option>');
                    });

                }
            });


        });
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
