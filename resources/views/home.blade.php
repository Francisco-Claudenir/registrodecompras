@extends('lubbuck.layout.page', ['importations' => ['toast', 'sweetalert']])

@section('conteudo')
    <div class="container">

        <button type="button" class="btn btn-dark mb-2 me-2" id="toastr-success-top-right">
            Top Right
        </button>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Sweet Wrong</h4>
                <div class="card-content">
                    <div class="sweetalert mt-5">
                        <button class="btn btn-danger btn sweet-wrong">Sweet Wrong</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
