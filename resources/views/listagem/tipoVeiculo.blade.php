@include('includes.header')

<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">LISTAGEM CLIENTES</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row" >
        <!--<a class="btn green" >ADICIONAR FILIAL</a>-->
        <a href="{{route('layout.adicionarTipoVeiculo')}}" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-fw fa-plus-square"></i>
                                        </span>
          <span class="text">ADICIONAR TIPO DE VEICULO</span>
        </a>

      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>NOME</th>
            <th>DATA INATIVAÇÂO</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
            <th>SITUAÇÂO</th>
          </tr>
        </thead>
        <tbody>

          @foreach($tipoVeiculo as $tv)
            @if($tv->ativoInativo == 1)
              <tr>
                <td>{{$tv->descricao}}</td>
                <td>{{$tv->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarTipoVeiculo', $tv->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.deletarTipoVeiculo', $tv->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn grey" href="{{route('desativarTipoVeiculo', $tv->id)}}">DESATIVAR</a>
                </td>
              </tr>
            @endif

            @if($tv->ativoInativo == 0)
              <tr class="desativado">
                <td>{{$tv->descricao}}</td>
                <td>{{$tv->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarTipoVeiculo', $tv->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.deletarTipoVeiculo', $tv->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn grey" href="{{route('ativarTipoVeiculo', $tv->id)}}">ATIVAR</a>
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
