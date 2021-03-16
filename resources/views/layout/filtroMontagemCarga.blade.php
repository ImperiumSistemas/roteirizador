@include('includes.header')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">MONTAGEM DE CARGAS</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="#" class="btn btn-secondary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-left"></i>
                                        </span>
            <span class="text">GERENCIADOR DE CARGAS</span>
        </a>
    </div>

    <div class="container-fluid">
        <form class="" method="post" action="{{route('gerarCarga')}}">
            {{ csrf_field() }}
            @include('formularios.formularioFiltros')

            <div align="middle">
                <p class="mb-4"></p>
                <p class="mb-4"></p>
                <button class="btn btn-success btn-icon-split-lg">Gerar Cargas</button>
            </div>
        </form>
    </div>

@include('includes.Footer')


