@extends('layout.page', [
    'layout' => 'admin',
    'plugins' => ['lightgallery'],
])

@section('title', ' - Lista de Inscritos')

@section('content')
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4 class="card-title">{{ $semic_evento->nome }} - {{$dadosminicurso->nome}}</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a
                            href="{{ route('semicevento.minicursos',$semic_evento->semic_evento_id) }}">Lista</a></li>
                    <li class="breadcrumb-item active"><a href="">Lista Inscritos</a>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="email-right-box">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card-header">
                                                <h4 class="card-title">Lista de Inscritos</h4>

                                                <a href="{{route('lista.inscritos.minicurso',['minicurso' => $dadosminicurso->minicurso_id])}}" class="btn btn-success pull-right">Exportar Excel</a>
                                            </div>
                                            <div class="card-body">
                                                <div class="input-group mb-3">
                                                    <div class="col-12 d-flex justify-content-end">
{{--                                                        <div class="input-group search-area pull-right ">--}}
{{--                                                            <input type="text" class="form-control pull-right"--}}
{{--                                                                   placeholder="Buscar por nome">--}}
{{--                                                            <div class="input-group-append">--}}
{{--									                            <span class="input-group-text">--}}
{{--										                            <a href="javascript:void(0)">--}}
{{--											                            <i class="flaticon-381-search-2"></i>--}}
{{--										                            </a>--}}
{{--									                            </span>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
                                                    </div>

                                                </div>

                                                {{--                                            <input type="search" class="form-control-sm" placeholder="" aria-controls="example">--}}
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-responsive-sm">
                                                        <thead>
                                                        <tr>
                                                            <th>Nª</th>
                                                            <th>Nome</th>
                                                            <th>Cpf</th>
                                                            <th>E-mail</th>
                                                            <th>Tipo</th>
                                                            <th>Status</th>
{{--                                                            <th>Ações</th>--}}
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($listaInscritos as $dados)
                                                            <tr>
                                                                <th>{{ $dados->numero_inscricao }}</th>
                                                                <th>{{ $dados->nome }}</th>
                                                                <td>{{ $dados->cpf }}</td>
                                                                <td>{{ $dados->email }}</td>
                                                                <td>{{ $dados->tipo }}</td>
                                                                @if (!$dados->status !== 'Em Analise')
                                                                    @switch($dados->status)
                                                                        @case('Indeferido')
                                                                            <td>
                                                                                <span
                                                                                    class="badge light badge-danger">{{ $dados->status }}</span>
                                                                            </td>
                                                                            @break

                                                                        @case('Deferido')
                                                                            <td>
                                                                                <span
                                                                                    class="badge light badge-success">{{ $dados->status }}</span>
                                                                            </td>
                                                                            @break

                                                                        @case('Em Analise')
                                                                            <td>
                                                                                <span
                                                                                    class="badge light badge-dark">{{ $dados->status }}</span>
                                                                            </td>
                                                                            @break

                                                                        @default
                                                                    @endswitch
                                                                @else
                                                                @endif
{{--                                                                <td>--}}
{{--                                                                    <a href="{{  route('semic.eventoinscricao.espelho', ['semic_evento_id' => $dados->semic_evento_id, 'semic_eventoinscricao_id' => $dados->semic_eventoinscricao_id]) }}"--}}
{{--                                                                       class="badge badge-circle badge-dark"><i--}}
{{--                                                                            class="flaticon-381-file-2"></i></a></td>--}}
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-sm-5 col-md-5">
                                                        <div class="dataTables_info" id="responsive-datatable_info"
                                                             role="status" aria-live="polite">
                                                            Exibindo {{ $listaInscritos->firstItem() }}
                                                            a {{ $listaInscritos->lastItem() }} de
                                                            {{ $listaInscritos->total() }}.
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7 col-md-7">
                                                        <div class="dataTables_paginate paging_simple_numbers"
                                                             id="responsive-datatable_paginate">
                                                            {{ $links->links() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>

        /*.form-control {*/

        /*    height: 25px !important;*/
        /*}*/

        /*.btn {*/
        /*    height: 25px !important;*/
        /*}*/
    </style>
@endsection
