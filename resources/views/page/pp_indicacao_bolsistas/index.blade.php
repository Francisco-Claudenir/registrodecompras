@extends('layout.page', [
    'layout' => 'admin',
    'plugins' => ['wizard'],
])

@section('title', ' - Cadastro de alunno')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Table Striped</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-responsive-sm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pp_indicacao_bolsista->pp_i_bolsista_pp_i_b_inscricao as $dados)
                                
                            @endforeach
                            <tr>
                                <th>1</th>
                                <td>Kolor Tea Shirt For Man</td>
                                <td><span class="badge badge-primary">Sale</span>
                                </td>
                                <td>January 22</td>
                                <td class="color-primary">$21.56</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
