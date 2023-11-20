@extends('layout.page', [
    'layout' => 'admin',
])

@section('title', ' - Auditoria')

@section('content')
    @include('sweet::alert')

    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">

                    <h4 class="card-title">Auditoria</h4>

                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Auditoria</a></li>
                    <li class="breadcrumb-item active"><a href="">Lista</a></li>
                </ol>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="basic-form">
                    <div class="mb-3 mt-3">
                        @foreach($auditoria as $item)

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal-{{$item->id}}" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="pt-2">
                                                <small class="ml-1">
                                                    @if($item->old_values)
                                                        <h6>Valores Antigos</h6>
                                                        @foreach (json_decode($item->old_values) as $index => $value)
                                                            <strong>{{ $index }} : </strong>
                                                            <small>{{ $value }}</small><br>
                                                        @endforeach
                                                        <hr>

                                                    @endif

                                                    @if($item->new_values)
                                                        <h6>Novos Valores</h6>
                                                        @foreach (json_decode($item->new_values) as $index => $value)
                                                            <strong>{{ $index }} : </strong>
                                                            <small>{{ $value }}</small><br>
                                                        @endforeach
                                                    @endif
                                                </small><br>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                Fechar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header pb-0 border-0">
                                    <small class="text-gray"><strong>Operação:</strong> {{$item->event}}</small>
                                    <div class="card-options">
                                        <p class="text-gray text-right"><small><strong>Audit :</strong></small><span
                                                class="text-uppercase"><strong> {{ $item->id }}</strong></span>
                                            <a type="button" class="p-2" data-bs-toggle="modal"
                                               data-bs-target="#exampleModal-{{$item->id}}"><i class="fas fa-eye"
                                                                                               style="color: #1366c7;"></i></a>
                                        </p>

                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="pt-2">
                                            <span style="font-size: 12px"><i class="fas fa-desktop"
                                                                             style="color: #1366c7;"></i></span>
                                                <small class="ml-1">
                                                    <td>{{ $item->user_agent }}</td>
                                                </small><br>
                                            </div>
                                            <div class="pt-2">
                                            <span style="font-size: 12px"><i class="fas fa-wifi"
                                                                             style="color: #1366C7FF;"></i></span>
                                                <small class="ml-1">
                                                    <td>{{ $item->ip_address }}</td>
                                                </small><br>
                                            </div>
                                            <div class="pt-2">
                                            <span style="font-size: 12px"><i class="far fa-calendar"
                                                                             style="color: #1366C7FF;"></i></span>
                                                <small class="ml-1">
                                                    <td>{{ date('d/m/Y - H:i:s', strtotime($item->created_at)) }}</td>
                                                </small><br>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="pt-2">
                                            <span style="font-size: 12px"><i class="fas fa-database"
                                                                             style="color: #1366c7;"></i></span>
                                                <small class="ml-1">
                                                    <td>{{ $item->table_log }}</td>
                                                </small><br>
                                            </div>
                                            <div class="pt-2">
                                            <span style="font-size: 12px"><i class="fas fa-key"
                                                                             style="color: #1366C7FF;"></i></span>
                                                <small class="ml-1">
                                                    <td>{{ $item->table_id }}</td>
                                                </small><br>
                                            </div>
                                            <div class="pt-2">
                                            <span style="font-size: 12px"><i class="fas fa-globe"
                                                                             style="color: #1366C7FF;"></i></span>
                                                <small class="ml-1">
                                                    <td>{{ $item->url }}</td>
                                                </small><br>
                                            </div>
                                            <div class="pt-2 ">
                                            <span style="font-size: 12px"><i class="fas fa-server"
                                                                             style="color: #1366C7FF;"></i></span>
                                                <small class="ml-1">
                                                    <td>{{ $item->user_type }}</td>
                                                </small>
                                                @if($item->user_id)
                                                    -
                                                    <span style="font-size: 12px"><i class="fas fa-user"
                                                                                     style="color: #1366C7FF;"></i></span>
                                                    <small class="ml-1">
                                                        <td>{{ $item->user_id }}</td>
                                                    </small><br>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>



                            {{--                                    {{$item->user_id}}<br>--}}
                            {{--                                    {{$item->event}}<br>--}}
                            {{--                                    {{$item->table_log}}<br>--}}
                            {{--                                    {{$item->table_id}}<br>--}}
                            {{--                                    {{$item->url}}<br>--}}
                            {{--                                    {{$item->ip_address}}<br>--}}
                            {{--                                    {{$item->user_agent}}<br>--}}
                            {{--                                    {{$item->created_at}}<br>--}}
                            {{--                                    {{$item->updated_at}}<br>--}}

                            {{--                                </div>--}}


                            {{--                            </div>--}}

                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-sm-5 col-md-5">
                            <div class="dataTables_info" id="responsive-datatable_info" role="status"
                                 aria-live="polite">
                                Exibindo {{ $auditoria->firstItem() }} a {{ $auditoria->lastItem() }} de
                                {{ $auditoria->total() }}.
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

@section('css')
    <style>
        .nav-link {
            color: #747474 !important;
        }

        .nav-link.active {
            color: #1367c8 !important;
        }

        .nav-link:hover {
            color: #063c7a !important;
        }
    </style>
@endsection
