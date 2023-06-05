@extends('layout.page', [
    'layout' => 'admin',
])

@section('title', ' - Perfil')

@section('content')

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
                                            <h5>Ações</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($perfis as $perfil)
                                        <tr>
                                            <td>
                                                <p>{{ $perfil->nome }}</p>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('perfil.edit', ['perfil' => $perfil->id]) }}"
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
