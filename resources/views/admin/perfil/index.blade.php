@extends('layout.page', [
    'layout' => 'admin',
])

@section('title', ' - Perfil')

@section('content')

    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
    
                    <h4 class="card-title">Lista Perfil</h4>
    
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Perfil</a></li>
                    <li class="breadcrumb-item active"><a href="">Lista</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="table table-striped table-bordered table-hover table-responsive-sm mb-0" style="min-width: 845px">
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
