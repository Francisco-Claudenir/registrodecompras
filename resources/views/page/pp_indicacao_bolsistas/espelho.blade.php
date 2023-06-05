@extends('layout.page', [
    'layout' => 'default',
    'plugins' => ['wizard'],
])

@section('title', ' - Cadastro de alunno')

@section('content')
    <div class="container-fluid">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Espelho</h3>
                    <div class="card-options">
                        <div class="btn-list">
                            <a href="{{ route('pp-i-bolsistas-inscricao.pdf', ['pp_indicacao_bolsista_id' => $dadosInscrito->pp_i_bolsista_id, 'pp_i_bolsista_inscricao_id' => $dadosInscrito->pp_i_bolsista_inscricao_id]) }}" class="btn btn-xs btn-info" title="">
                                PDF
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-2 pb-0">
                    <h5>Identificação do Bolsista</h5>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Curso</dt>
                            <dd>{{$dadosInscrito->curso}}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Centro</dt>
                            <dd class="text-justify">{{$dadosInscrito->centro}}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Numero de Identidade</dt>
                            <dd class="text-justify">{{$dadosInscrito->numero_identidade}}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Documento de Identidade</dt>
                            <dd class="text-justify">{{$dadosInscrito->documento_identidade}}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Documento CPF</dt>
                            <dd class="text-justify">{{$dadosInscrito->documento_cpf}}</dd>
                        </dl>
                    </div>
                    <h5>Identificação do
                        Orientador(a)</h5>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Nome Completo</dt>
                            <dd class="text-justify">{{$dadosInscrito->nome_orientador}}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Telefone</dt>
                            <dd class="text-justify">{{$dadosInscrito->telefone_orientador}}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>E-mail</dt>
                            <dd class="text-justify">{{$dadosInscrito->email_orientador}}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Título do Projeto do
                                Orientador(a)</dt>
                            <dd class="text-justify">{{$dadosInscrito->titulo_projeto_orientador}}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Título do Plano de Trabalho
                                Bolsista</dt>
                            <dd class="text-justify">{{$dadosInscrito->titulo_plano_orientador}}</dd>
                        </dl>
                    </div>
                    <h5>Dados Acadêmicos</h5>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Histórico Escolar atualizado,
                                disponível do
                                SIGUEMA (formato PDF)</dt>
                            <dd class="text-justify">{{$dadosInscrito->historico_escolar}}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Declaração de vínculo do aluno à UEMA
                                atualizado (formato PDF)</dt>
                            <dd class="text-justify">{{$dadosInscrito->declaracao_vinculo}}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Termo de Compromisso do bolsista
                                (formato
                                PDF)</dt>
                            <dd class="text-justify">{{$dadosInscrito->termo_compromisso_bolsista}}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Declaração Negativa de Vínculo
                                Empregatício
                                (formato PDF)</dt>
                            <dd class="text-justify">{{$dadosInscrito->declaracao_negativa_vinculo}}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Currículo atualizado, gerado na
                                Plataforma
                                Lattes (formato PDF)</dt>
                            <dd class="text-justify">{{$dadosInscrito->curriculo}}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Declaração conjuta de estágio (quando
                                for o
                                caso) (formato PDF)</dt>
                            <dd class="text-justify">{{$dadosInscrito->declaracao_conjuta_estagio}}</dd>
                        </dl>
                    </div>
                    <h5>Informações Bancárias</h5>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Agência do Banco do Brasil n°</dt>
                            <dd>{{$dadosInscrito->agencia_banco}}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Número da Conta Corrente do Banco do
                                Brasil</dt>
                            <dd class="text-justify">{{$dadosInscrito->numero_conta_corrente}}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Comprovante de Conta Corrente do Banco
                                do
                                Brasil (formato PDF)</dt>
                            <dd>{{$dadosInscrito->comprovante_conta_corrente}}</dd>
                        </dl>
                    </div>
                    <h5>Documentação do
                        Orientador(a)</h5>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Termo de Compromisso (formato
                                PDF)</dt>
                            <dd class="text-justify">{{$dadosInscrito->termo_compromisso_orientador}}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="copyright">
            <p>
                Todos os direitos reservados Universidade Estadual do Maranhão -
                <a href="https://www.uema.br/" target="_blank">UEMA</a> {{ now()->year }}
            </p>
            <p>
                Coordenação de Tecnologia da Informação e Comunicação -
                <a href="https://ctic.uema.br/" target="_blank">CTIC</a>
            </p>
        </div>
    </div>
@endsection
