@extends('layouts.eventos.base', [
    'plugins' => ['wizard'],
])

@section('page_title', ' - Cadastro de aluno')

@section('content')
    <div class="container-fluid">
    @section('header_img')
        {{ $img }}
    @endsection

    @section('content-body')

    @endsection
</div>
@endsection
