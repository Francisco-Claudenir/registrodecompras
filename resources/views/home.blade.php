@extends('layout.page', [
    'layout' => 'evt',
    'plugins' => ['datatable'],
])

@section('title', ' - Cadastro de alunno')

@section('content')
    <div class="container-fluid">
        {{-- <table class="table table-striped table-responsive-sm hover" id="tableareas" cellspacing="0" width="100%"
            role="grid" style="width: 100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table> --}}
    </div>
@endsection

@section('scripts')

    <script>
        $(document).ready(function() {
            $('#tableareas').DataTable({
                processing: true,
                serverSide: true,
                buttons: true,
                responsive: true,
                buttons: [
                    'copy', 'excel', 'pdf'
                ],
                ajax: "{{ route('areaajax') }}",
                scrollY: '45vh',
                columns: [{
                        data: 'areaconhecimento_id',
                        name: 'areaconhecimento_id'
                    },
                    {
                        data: 'nome',
                        name: 'nome'
                    },
                ],
                ordering: true,
                order: [
                    [0, 'asc']
                ],

                language: {
                    search: 'Buscar',
                    lengthMenu: 'Mostrar _MENU_ registros por página',
                    zeroRecords: 'Nenhum registro encontrado',
                    infoEmpty: 'Nenhum dado cadastrado',
                    info: 'Mostrando a página _PAGE_ de _PAGES_',
                    infoFiltered: '(filtrados de _MAX_ dados totais)',
                    paginate: {
                        next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                        previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
                    },
                    processing: `<div>@include('layout.partials.loader.dots')</div>`,

                }
            });
            $.fn.dataTable.ext.errMode = 'throw';
        });
    </script>

@endsection
