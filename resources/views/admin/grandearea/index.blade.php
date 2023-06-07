@extends('layout.page', [
    'layout' => 'admin',
])

@section('title', ' - Grand Area')

@section('content')

<div class="container-fluid">
    <!-- Add Project -->
    @include('sweet::alert')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">

                <h4 class="card-title">Lista Grande Area</h4>

            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Grande Area</a></li>
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
                        <table id="example5" class="table table-responsive-sm" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th><h5>Name</h5></th>
                                    <th><h5>Ações</h5></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grandeareas as $grandearea )
                                <tr>
                                    <td><p>{{$grandearea->nome }}</p></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('grandearea.edit', ['grandearea' =>$grandearea->area_id]) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
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