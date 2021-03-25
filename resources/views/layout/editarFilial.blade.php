@include('includes.header')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">EDITAR FILIAIS</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row" >
            <a href="{{route('listagem.filiais')}}" class="btn btn-secondary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-left"></i>
                                        </span>
                <span class="text">LISTAGEM</span>
            </a>
        </div>
    </div>

    <div class="container-fluid">
        <form class="" method="post" action="{{route('layout.atualizar', $filiais->id)}}" >
            {{ csrf_field() }}

            <input type="hidden" name="_method" value="put">

            @include('formularios.formularioFilial')
            <div align="middle">
                <p class="mb-4"></p>
                <p class="mb-4"></p>
                <button class="btn btn-success btn-icon-split-lg" >ATUALIZAR</button>
            </div>
        </form>
    </div>


</div>


@include('includes.footer')
