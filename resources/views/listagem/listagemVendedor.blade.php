@include('includes.header')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">LISTAGEM VENDEDOR</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!--<h6 class="m-0 font-weight-bold text-primary">Filiais</h6>-->
            <div class="row">
                <!--<a class="btn green" >ADICIONAR FILIAL</a>-->
                <a href="{{route('layout.adicionarVendedorFisico')}}" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-fw fa-plus-square"></i>
                                        </span>
                    <span class="text">ADICIONAR VENDEDOR FISICO</span>
                </a>
                <a href="{{route('layout.adicionarVendedorJuridico')}}" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-fw fa-plus-square"></i>
                                        </span>
                    <span class="text">ADICIONAR VENDEDOR JURIDICO</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>CÓDIGO VENDEDOR</th>
                        <th>NOME VENDEDOR</th>
                        <th>TELEFONE</th>
                        <th>DATA DE INATIVAÇÃO</th>
                        <th>EDITAR</th>
                        <th>DELETAR</th>
                        <th>SITUAÇÂO</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($vendedores as $vendedor)

                        @if($vendedor->ativoInativo == 0)
                            <tr>
                                <td class="desativado">{{$vendedor->codVendedor}}</td>
                                <td class="desativado">{{$vendedor->nomeVendedor}}</td>
                                <td class="desativado">{{$vendedor->telefoneVendedor}}</td>
                                <td class="desativado">{{$vendedor->dataInativacao}}</td>
                                <td>
                                    <a class="btn deep-orange"
                                       href="{{route('layout.editarVendedor', $vendedor->idVendedor)}}">Editar</a>
                                </td>
                                <td>
                                    <a class="btn red" href="">Deletar</a>
                                </td>
                                <td>
                                    <a class="btn green"
                                       href="">Ativar</a>
                                </td>
                            </tr>
                        @endif

                        @if($vendedor->ativoInativo == 1)
                            <tr>
                                <td>{{$vendedor->codVendedor}}</td>
                                <td>{{$vendedor->nomeVendedor}}</td>
                                <td>{{$vendedor->telefoneVendedor}}</td>
                                <td>{{$vendedor->dataInativacao}}</td>
                                <td>
                                    <a class="btn deep-orange"
                                       href="{{route('layout.editarVendedor', $vendedor->idVendedor)}}">Editar</a>
                                </td>
                                <td>
                                    <a class="btn red" href="">Deletar</a>
                                </td>
                                <td>
                                    <a class="btn green"
                                       href="">Ativar</a>
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
