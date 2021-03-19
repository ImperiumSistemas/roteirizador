@include('includes.header')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">LISTAGEM EMPRESAS</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!--<h6 class="m-0 font-weight-bold text-primary">Filiais</h6>-->
            <div class="row" >
                <!--<a class="btn green" >ADICIONAR FILIAL</a>-->
                <a href="{{route('layout.adicionarEmpresa')}}" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-fw fa-plus-square"></i>
                                        </span>
                    <span class="text">ADICIONAR EMPRESA</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>NOME EMPRESA</th>
            <th>DATA DE INATIVAÇÃO</th>
            <th> EDITAR </th>
            <th> DELETAR </th>
            <th>SITUAÇÃO</th>
          </tr>
        </thead>
        <tbody>

          @foreach($empresas as $empresa)
            @if($empresa->ativoInativo == 0)
              <tr class="desativado">
                <td>{{$empresa->nome_empresa}}</td>
                <td>{{$empresa->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarEmpresa', $empresa->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.excluirEmpresa', $empresa->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn green" href="{{route('ativarEmpresa', $empresa->id)}}">Ativar</a>
                </td>
              </tr>
            @endif

            @if($empresa->ativoInativo == 1)
              <tr>
                <td>{{$empresa->nome_empresa}}</td>
                <td>{{$empresa->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarEmpresa', $empresa->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.excluirEmpresa', $empresa->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn grey" href="{{route('desativarEmpresa', $empresa->id)}}">Desativar</a>
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
