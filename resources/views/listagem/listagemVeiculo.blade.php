@include('includes.header')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">LISTAGEM VEICULOS</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!--<h6 class="m-0 font-weight-bold text-primary">Filiais</h6>-->
            <div class="row">
                <!--<a class="btn green" >ADICIONAR FILIAL</a>-->
                <a href="{{route('layout.adicionarVeiculo')}}" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-fw fa-plus-square"></i>
                                        </span>
                    <span class="text">ADICIONAR VEICULO</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>MARCA</th>
                        <th>ANO</th>
                        <th>MODELO</th>
                        <th>CHASSI</th>
                        <th>RENAVAN</th>
                        <th>NOME FILIAL</th>
                        <th>PAIS</th>
                        <th>ESTADO</th>
                        <th>BAIRRO</th>
                        <th>CIDADE</th>
                        <th>TELEFONE</th>
                        <th>DATA DE INATIVAÇÃO</th>
                        <th>EDITAR</th>
                        <th>DELETAR</th>
                        <th>SITUAÇÂO</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($veiculo as $veiculos)
                        @if($veiculos->ativoInativo == 0)
                            <tr class="desativado">
                                <td>{{$veiculos->marca}}</td>
                                <td>{{$veiculos->ano}}</td>
                                <td>{{$veiculos->modelo}}</td>
                                <td>{{$veiculos->chassi}}</td>
                                <td>{{$veiculos->renavan}}</td>
                                <td>{{$veiculos->descricao}}</td>
                                <td>{{$veiculos->pais}}</td>
                                <td>{{$veiculos->estado}}</td>
                                <td>{{$veiculos->bairro}}</td>
                                <td>{{$veiculos->cidade}}</td>
                                <td>{{$veiculos->telefone}}</td>
                                <td>{{$veiculos->dataInativacao}}</td>
                                <td>
                                    <a class="btn deep-orange"
                                       href="{{route('layout.editarVeiculo', $veiculos->veiculoId)}}">Editar</a>
                                </td>
                                <td>
                                    <a class="btn red" href="{{route('layout.deletarVeiculo', $veiculos->veiculoId)}}">Deletar</a>
                                </td>
                                <td>
                                    <a class="btn green"
                                       href="{{route('ativarVeiculo', $veiculos->veiculoId)}}">Ativar</a>
                                </td>
                            </tr>
                        @endif

                        @if($veiculos->ativoInativo == 1)
                            <tr>
                                <td>{{$veiculos->marca}}</td>
                                <td>{{$veiculos->ano}}</td>
                                <td>{{$veiculos->modelo}}</td>
                                <td>{{$veiculos->chassi}}</td>
                                <td>{{$veiculos->renavan}}</td>
                                <td>{{$veiculos->descricao}}</td>
                                <td>{{$veiculos->pais}}</td>
                                <td>{{$veiculos->estado}}</td>
                                <td>{{$veiculos->bairro}}</td>
                                <td>{{$veiculos->cidade}}</td>
                                <td>{{$veiculos->telefone}}</td>
                                <td>{{$veiculos->dataInativacao}}</td>
                                <td>
                                    <a class="btn deep-orange"
                                       href="{{route('layout.editarVeiculo', $veiculos->veiculoId)}}">Editar</a>
                                </td>
                                <td>
                                    <a class="btn red" href="{{route('layout.deletarVeiculo', $veiculos->veiculoId)}}">Deletar</a>
                                </td>
                                <td>
                                    <a class="btn grey" href="{{route('desativarVeiculo', $veiculos->veiculoId)}}">Desativar</a>
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
