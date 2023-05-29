@extends('layout.page', [
    'layout' => 'admin',
])

@section('title', ' - Index SubArea')

@section('content')

<div class="container-fluid">
    <!-- Add Project -->
    @include('sweet::alert')
    <div class="modal fade" id="addProjectSidebar">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Project</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
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
                    <h4 class="card-title">Lista SubArea</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example5" class="table table-responsive-sm" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th><h5>SubArea</h5></th>
                                    <th><h5>GrandeArea</h5></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subareas as $subarea )
                                    <tr>
                                        <td><p>{{$subarea->nome }}</p></td>
                                        <td><p>{{$subarea->subArea_grandeArea->nome }}</p></td>
                                        <td>
                                            <div class="d-flex">
                                               <a href="{{ route('subarea.edit', ['subarea' =>$subarea->areaconhecimento_id]) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
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