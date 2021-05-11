@include('includes.header')

<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">LISTAGEM MOTORISTAS</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row" >
        <a href="{{route('layout.adicionarMotoristaFisico')}}" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-fw fa-plus-square"></i>
                                        </span>
          <span class="text">ADICIONAR MOTORISTA FISÍCO</span>
        </a>
        <a href="{{route('layout.adicionarMotoristaJuridico')}}" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-fw fa-plus-square"></i>
                                        </span>
          <span class="text">ADICIONAR MOTORISTA JURÍDICO</span>
        </a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>NOME</th>
            <th>NUMERO CNH</th>
            <th>VALIDADE CNH</th>
            <th>BAIRRO</th>
            <th>CIDADE</th>
            <th>ESTADO</th>
            <th>DATA DE INATIVAÇÃO</th>
            <th>NOME DA FILIAL</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
            <th>SITUAÇÂO</th>
          </tr>
        </thead>
        <tbody>

          @foreach($motoristas as $motorista)
            @if($motorista->ativoInativo == 0)
            <tr class="desativado">
              <td>{{$motorista->nomePessoa}}</td>
              <td>{{$motorista->numeroCnh}}</td>
              <td>{{$motorista->dataValidadeCnh}}</td>
              <td>{{$motorista->bairro}}</td>
              <td>{{$motorista->cidade}}</td>
              <td>{{$motorista->estado}}</td>
              <td>{{$motorista->dataInativacao}}</td>
              <td>{{$motorista->descricao}}</td>
              <td>
                <a class="btn deep-orange" href="{{route('layout.editarMotorista', $motorista->motoristaId)}}">Editar</a>
              </td>
              <td>
                <a class="btn red" href="{{route('layout.deleteMotorista', $motorista->motoristaId)}}">Deletar</a>
              </td>
              <td>
                <a class="btn green" href="{{route('ativarMotorista', $motorista->motoristaId)}}">ATIVAR</a>
              </td>
            </tr>
            @endif

            @if($motorista->ativoInativo == 1)
            <tr>
              <td>{{$motorista->nomePessoa}}</td>
              <td>{{$motorista->numeroCnh}}</td>
              <td>{{$motorista->dataValidadeCnh}}</td>
              <td>{{$motorista->bairro}}</td>
              <td>{{$motorista->cidade}}</td>
              <td>{{$motorista->estado}}</td>
              <td>{{$motorista->dataInativacao}}</td>
              <td>{{$motorista->descricao}}</td>
              <td>
                <a class="btn deep-orange" href="{{route('layout.editarMotorista', $motorista->motoristaId)}}">Editar</a>
              </td>
              <td>
                <a class="btn red" href="{{route('layout.deleteMotorista', $motorista->motoristaId)}}">Deletar</a>
              </td>
              <td>
                <a class="btn grey" href="{{route('desativarMotorista', $motorista->motoristaId)}}">DESATIVAR</a>
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
