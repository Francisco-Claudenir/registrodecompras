@extends('layout.page', [
    'layout' => 'admin',
])

@section('title', ' - Cursos')

@section('content')

<div class="container-fluid">
    <!-- Add Project -->
    @include('sweet::alert')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">

                <h4 class="card-title">Lista Cursos</h4>

            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Cursos</a></li>
                <li class="breadcrumb-item active"><a href="">Lista</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">
                        <form  action="{{ route('curso.posts.search') }}" method="post">
                            @csrf
                            <div class="input-group search-area d-lg-inline-flex">
                                <input type="text" class="form-control" name="search"
                                    @if ($valor) value="{{ $valor }}" @endif
                                    placeholder="Pesquisar">
                                <button class="input-group-text" type="submit"> <i
                                        class="flaticon-381-search-2"></i></button>
                            </div>
                        </form>
                    </div>
                    <br><br><br>
                    <div class="table-responsive">
                        <table id="example5" class="table table-striped table-bordered table-hover table-responsive-sm mb-0" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th><h5>Id</h5></th>
                                    <th><h5>Cursos</h5></th>
                                    <th><h5>Centro</h5></th>
                                    <th><h5>Modalidade</h5></th>
                                    <th><h5>Ações</h5></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cursos as $curso )
                                    <tr>
                                        <td><p>{{$curso->id }}</p></td>
                                        <td><p>{{$curso->cursos }}</p></td>
                                        <td><p>{{$curso->centros->centros }}</p></td>
                                        <td><p>{{$curso->modalidades->modalidades }}</p></td>
                                        <td>
                                            <div class="d-flex">
                                               <a href="{{ route('curso.edit', ['curso' =>$curso->id]) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                            </div>												
                                        </td>	
                                    </tr>
                                @endforeach                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5 col-md-5">
                        <div class="dataTables_info" id="responsive-datatable_info" role="status" aria-live="polite">
                            Exibindo {{ $cursos->firstItem() }} a {{ $cursos->lastItem() }} de
                            {{ $cursos->total() }}.
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