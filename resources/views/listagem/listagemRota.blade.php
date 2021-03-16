@include('includes.header')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">LISTAGEM ROTAS</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <a href="{{route('layout.adicionarRota')}}" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-fw fa-plus-square"></i>
                                        </span>
                    <span class="text">ADICIONAR ROTA</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>NUMERO PEDÁGIO</th>
                        <th>GASTO PEDÁGIO</th>
                        <th>DESCRIÇÃO ROTA</th>
                        <th>DATA INATIVAÇÃO</th>
                        <th>REGIAO</th>
                        <th>EDITAR</th>
                        <th>DELETAR</th>
                        <th>SITUAÇÂO</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($rotas as $rota)
                        @if($rota->ativoInativo == 0)
                            <tr class="desativado">
                                <td>{{$rota->numeroPedagio}}</td>
                                <td>{{$rota->gastoPedagio}}</td>
                                <td>{{$rota->descricaoRota}}</td>
                                <td>{{$rota->dataInativacao}}</td>
                                <td>{{$rota->nomeRegiao}}</td>
                                <td>
                                    <a class="btn deep-orange"
                                       href="{{route('layout.editarRota', $rota->id)}}">Editar</a>
                                </td>
                                <td>
                                    <a class="btn red" href="{{route('layout.excluirRota', $rota->id)}}">Deletar</a>
                                </td>
                                <td>
                                    <a class="btn green" href="{{route('ativarRota', $rota->id)}}">ATIVAR</a>
                                </td>
                            </tr>
                        @endif

                        @if($rota->ativoInativo == 1)
                            <tr>
                                <td>{{$rota->numeroPedagio}}</td>
                                <td>{{$rota->gastoPedagio}}</td>
                                <td>{{$rota->descricaoRota}}</td>
                                <td>{{$rota->dataInativacao}}</td>
                                <td>{{$rota->nomeRegiao}}</td>
                                <td>
                                    <a class="btn deep-orange"
                                       href="{{route('layout.editarRota', $rota->id)}}">Editar</a>
                                </td>
                                <td>
                                    <a class="btn red" href="{{route('layout.excluirRota', $rota->id)}}">Deletar</a>
                                </td>
                                <td>
                                    <a class="btn grey" href="{{route('desativarRota', $rota->id)}}">DESATIVAR</a>
                                </td>
                            </tr>
                        @endif

                    @endForeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


@include('includes.footer')