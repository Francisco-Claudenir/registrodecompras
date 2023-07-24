@extends('layout.page', [
    'layout' => 'admin',
    'plugins' => ['wizard'],
])

@section('title', ' - Lista de Inscritos')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">

                    <h4 class="card-title">{{ $pibic_indicacao->nome }}</h4>

                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('pibic-indicacao.index') }}">Lista</a></li>
                    <li class="breadcrumb-item active"><a href="">Lista Inscritos</a>
                    </li>
                </ol>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12">
            <div class="card project-card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Lista de Inscritos</h4>
                        <a href=""
                            class="btn btn-success pull-right">Exportar Excel</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>Nª</th>
                                        <th>Nome Orientador</th>
                                        <th>CPF Orientador</th>
                                        <th>Nome Bolsista</th>
                                        <th>CPF Bolsista</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listaInscritos as $dados)
                                        <tr>
                                            <th>{{ $dados->numero_inscricao }}</th>
                                            <th>{{ $dados->nome_orientador }}</th>
                                            <td>{{ $dados->mask_cpf($dados->cpf_orientador) }}</td>
                                            <td>{{ $dados->nome_bolsista }}</td>
                                            <td>{{ $dados->mask_cpf($dados->cpf_bolsista) }}</td>
                                            @if (!$dados->status !== 'Em Analise')
                                                @switch($dados->status)
                                                    @case('Indeferido')
                                                        <td>
                                                            <span class="badge light badge-danger">{{ $dados->status }}</span>
                                                        </td>
                                                    @break

                                                    @case('Deferido')
                                                        <td>
                                                            <span class="badge light badge-success">{{ $dados->status }}</span>
                                                        </td>
                                                    @break

                                                    @case('Em Analise')
                                                        <td>
                                                            <span class="badge light badge-dark">{{ $dados->status }}</span>
                                                        </td>
                                                    @break

                                                    @default
                                                @endswitch
                                            @else
                                            @endif
                                            {{-- <td><a href="{{ route('pp-i-bolsistas-inscricao.espelho', ['pp_indicacao_bolsista_id' => $dados->pp_i_bolsista_id, 'pp_i_bolsista_inscricao_id' => $dados->pp_i_bolsista_inscricao_id]) }}"
                                                class="badge badge-circle badge-dark"><i
                                                    class="flaticon-381-file-2"></i></a></td> --}}
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
