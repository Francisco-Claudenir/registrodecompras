<button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#search">
    Filtrar
</button>

<div class="modal fade" id="search" style="display: none; z-index: 11" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filtrar</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="GET" action="{{ $route }}">
                <div class="modal-body" style="">
                    @yield('form')
                </div>
                <div class="modal-footer">
                    <a href="{{ $route }}" class="btn btn-sm btn-info">Limpar Busca</a>
                    <button type="submit" class="btn btn-sm btn-success">Pesquisar</button>
                </div>
            </form>
        </div>
    </div>
</div>
