@extends('layouts.layouteventos', [
    'layout' => 'admin',
    'plugins' => ['wizard'],
])

@section('page_title', ' - Cadastro de aluno')

@section('content')
    <div class="container-fluid">
        @include('page.primeirospassos.form')
    </div>
@endsection
