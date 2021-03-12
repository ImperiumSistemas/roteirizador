@include('includes.header')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">LISTAGEM FILIAIS</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!--<h6 class="m-0 font-weight-bold text-primary">Filiais</h6>-->
            <div class="row" >
                <!--<a class="btn green" >ADICIONAR FILIAL</a>-->
                <a href="{{route('layout.adicionarFilial')}}" class="btn btn-primary btn-icon-split">
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
                        <th>CNPJ</th>
                        <th>DESCRIÇÃO</th>
                        <th>NOME EMPRESA</th>
                        <th>EDITAR</th>
                        <th>DELETAR</th>
                        <th>SITUAÇÂO</th>
                        <th>CONFIRMAR ENDEREÇO</th>
                    </tr>
                    </thead>
                    <!--<tfoot>
                    <tr>
                        <th>CNPJ</th>
                        <th>DESCRIÇÃO<th>
                        <th>NOME EMPRESA</th>
                        <th>EDITAR</th>
                        <th>DELETAR</th>
                        <th>SITUAÇÂO</th>
                        <th>CONFIRMAR ENDEREÇO</th>
                    </tr>
                    </tfoot>-->
                    <tbody>
                    @foreach($filiais as $filial)
                        @if($filial->ativoInativo == 0)
                            <tr class="desativado">
                                <td>{{$filial->cnpj}}</td>
                                <td>{{$filial->descricao}}</td>
                                <td>{{$filial->nomeEmpresa}}</td>
                                <td>
                                    <a class="btn deep-orange" href="{{route('layout.editar', $filial->id)}}">EDITAR</a>
                                </td>
                                <td>
                                    <a class="btn red" href="{{route('layoute.delete', $filial->id)}}">DELETAR</a>
                                </td>
                                <td>
                                    <a class="btn green" href="{{route('ativarFilial', $filial->id)}}">ATIVAR</a>
                                </td>
                                <td>
                                    <a class="btn green" href="{{route('confirmarEnderecoMapaFilial', $filial->id)}}">CONFIRMAR ENDEREÇO</a>
                                </td>
                            </tr>
                        @endif

                        @if($filial->ativoInativo == 1)
                            <tr>
                                <td>{{$filial->cnpj}}</td>
                                <td>{{$filial->descricao}}</td>
                                <td>{{$filial->nomeEmpresa}}</td>
                                <td>
                                    <a class="btn deep-orange" href="{{route('layout.editar', $filial->id)}}">EDITAR</a>
                                </td>
                                <td>
                                    <a class="btn red" href="{{route('layoute.delete', $filial->id)}}">DELETAR</a>
                                </td>
                                <td>
                                    <a class="btn grey" href="{{route('desativarFilial', $filial->id)}}">DESATIVAR</a>
                                </td>
                                <td>
                                    <a class="btn green" href="{{route('confirmarEnderecoMapaFilial', $filial->id)}}">CONFIRMAR ENDEREÇO</a>
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
