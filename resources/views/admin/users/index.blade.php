@extends('layout.page', [
    'layout' => 'admin',
])

@section('title', ' - Usuários')

@section('content')
    @include('sweet::alert')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">

                    <h4 class="card-title">Lista Usuários</h4>

                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Usuários</a></li>
                    <li class="breadcrumb-item active"><a href="">Lista</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <label>Pesquisar:
                        <input type="Search" class placeholder aria-controls="example">
                    </label>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5"
                                class="table table-striped table-bordered table-hover table-responsive-sm mb-0"
                                style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>
                                            <h5>Nome</h5>
                                        </th>
                                        <th>
                                            <h5>Email</h5>
                                        </th>
                                        <th>
                                            <h5>Perfil</h5>
                                        </th>
                                        <th>
                                            <h5>Ações</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <p>{{ $user->nome }}</p>
                                            </td>
                                            <td>
                                                <p>{{ $user->email }}</p>
                                            </td>
                                            <td>
                                                @if ($user->perfil)
                                                    <p>{{ $user->perfil->nome }}</p>
                                                @endif
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('users.edit', ['user' => $user->id], 'edit') }}"
                                                        class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                    <button type="button" class="btn btn-info shadow btn-xs sharp me-1"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal-resetpass-{{ $user->id }}"><i
                                                            class="fas fa-key"></i></button>
                                                </div>
                                            </td>

                                        </tr>

                                        <!-- Modal ResetPass -->
                                        <div class="modal fade " id="modal-resetpass-{{ $user->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Resetar Senha
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body justify-content-center">
                                                        <div class="row">
                                                            <strong class="pr-1">Funcionário : </strong>
                                                            <p> {{ $user->nome }}</p>
                                                        </div>
                                                        <div class="row">
                                                            <strong class="pr-1">CPF : </strong>
                                                            <p> {{ $user->cpf }}</p>
                                                        </div>
                                                        <strong>
                                                            Resetar senha deste usuário ?
                                                        </strong>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Não
                                                        </button>
                                                        <form action="{{ route('user.passreset', $user->id) }}"
                                                            class="form-horizontal" method="POST">
                                                            @csrf
                                                            @method('put')
                                                            <button type="submit" class="btn btn-info">Sim</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal ResetPass -->
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5 col-md-5">
                            <div class="dataTables_info" id="responsive-datatable_info" role="status" aria-live="polite">
                                Exibindo {{ $users->firstItem() }} a {{ $users->lastItem() }} de
                                {{ $users->total() }}.
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
