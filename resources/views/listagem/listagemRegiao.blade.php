@include('includes.header')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">LISTAGEM REGIÃO</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!--<h6 class="m-0 font-weight-bold text-primary">Filiais</h6>-->
            <div class="row">
                <!--<a class="btn green" >ADICIONAR FILIAL</a>-->
                <a href="{{route('layout.adicionarRegiao')}}" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-fw fa-plus-square"></i>
                                        </span>
                    <span class="text">ADICIONAR FILIAL</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>NOME REGIÃO</th>
                        <th>EDITAR</th>
                        <th>DELETAR</th>
                        <th>SITUAÇÂO</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($listagemRegiaos as $listagemRegiao)

                        @if($listagemRegiao->ativoInativo == 0)
                            <tr>
                                <td class="desativado">{{$listagemRegiao->nomeRegiao}}</td>
                                <td>
                                    <a class="btn deep-orange"
                                       href="{{route('layout.editarRegiao', $listagemRegiao->id)}}">Editar</a>
                                </td>
                                <td>
                                    <a class="btn red" href="{{route('layout.deletarRegiao', $listagemRegiao->id)}}">Deletar</a>
                                </td>
                                <td>
                                    <a class="btn green"
                                       href="{{route('ativarRegiao', $listagemRegiao->id)}}">Ativar</a>
                                </td>
                            </tr>
                        @endif

                        @if($listagemRegiao->ativoInativo == 1)
                            <tr>
                                <td>{{$listagemRegiao->nomeRegiao}}</td>
                                <td>
                                    <a class="btn deep-orange"
                                       href="{{route('layout.editarRegiao', $listagemRegiao->id)}}">Editar</a>
                                </td>
                                <td>
                                    <a class="btn red" href="{{route('layout.deletarRegiao', $listagemRegiao->id)}}">Deletar</a>
                                </td>
                                <td>
                                    <a class="btn grey" href="{{route('desativarRegiao', $listagemRegiao->id)}}">DESATIVAR</a>
                                </td>
                            </tr>
                        @endif
                    @endForeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@include('includes.footer')
