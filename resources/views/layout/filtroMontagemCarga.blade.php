@include('includes.header')
@if (\Session::has('error'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('error') !!}</li>
        </ul>
    </div>
@endif

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">MONTAGEM DE CARGAS</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{route('listaCargas')}}" class="btn btn-secondary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-left"></i>
                                        </span>
            <span class="text">GERENCIADOR DE CARGAS</span>
        </a>
    </div>

    <div class="container-fluid">
        <form id='filtrosForm' class="" method="post" action="{{route('gerarCarga')}}">
            {{ csrf_field() }}
            @include('formularios.formularioFiltros')
            <div align="middle">
                <p class="mb-4"></p>
                <p class="mb-4"></p>
                <button class="btn btn-success btn-icon-split-lg" id="gerarCarga">Gerar Cargas</button>
            </div>

        </form>

    </div>




@include('includes.Footer')


