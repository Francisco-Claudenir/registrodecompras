@extends('layout.page', [
    'layout' => 'admin',
    'plugins' => ['wizard'],
])

@section('title', ' - Cadastro de alunno')

@section('content')
    <div class="container-fluid">
        <div class="col-xl-12 col-lg-12">
            <div class="card project-card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Lista de Inscritos</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>Nª</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>CPF</th>
                                        <th>Telefone</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listaInscritos as $dados)
                                        <tr>
                                            <th>{{ $dados->numero_inscricao }}</th>
                                            <th>{{ $dados->nome }}</th>
                                            <td>{{ $dados->email }}</td>
                                            <td>{{ $dados->cpf }}</td>
                                            <td>{{ $dados->telefone }}</td>
                                            <td><a
                                                    href="{{ route('pp-i-bolsistas-inscricao.espelho', ['pp_indicacao_bolsista_id' => $dados->pp_i_bolsista_id, 'pp_i_bolsista_inscricao_id' => $dados->pp_i_bolsista_inscricao_id]) }}"><i
                                                        class="flaticon-381-file-2"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5 col-md-5">
                            <div class="dataTables_info" id="responsive-datatable_info" role="status" aria-live="polite">
                                Exibindo {{ $listaInscritos->firstItem() }} a {{ $listaInscritos->lastItem() }} de
                                {{ $listaInscritos->total() }}.
                            </div>
                        </div>
                        <div class="col-sm-7 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="responsive-datatable_paginate">
                                {{ $links->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
