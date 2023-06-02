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
                    <h4>Olá, seja bem vindo!</h4>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lista Perfis</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="table table-responsive-sm" style="min-width: 845px">
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
                                                    <a href="{{ route('perfil.edit', ['perfil' => $user->id]) }}"
                                                        class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
