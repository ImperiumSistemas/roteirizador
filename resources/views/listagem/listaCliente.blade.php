@include('includes.header')

<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">LISTAGEM CLIENTES</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row" >
        <!--<a class="btn green" >ADICIONAR FILIAL</a>-->
        <a href="{{route('layout.adicionarCliente')}}" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-fw fa-plus-square"></i>
                                        </span>
          <span class="text">ADICIONAR CLIENTE</span>
        </a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>NOME</th>
            <th>TEL</th>
            <th>RUA</th>
            <th>BAIRRO</th>
            <th>NUMERO</th>
            <th>CIDADE</th>
            <th>ESTADO</th>
            <th>PAIS</th>
            <th>CEP</th>            
            <th>PRAÇA</th>
            <th>DATA INATIVAÇÃO</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
            <th>SITUAÇÃO</th>
          </tr>
        </thead>
        <tbody>

          @foreach($clientes as $cliente)
            @if($cliente->ativoInativo == 0)
              <tr class="desativado">
                <td>{{$cliente->nomePessoa}}</td>
                <td>{{$cliente->numero}}</td>
                <td>{{$cliente->rua}}</td>
                <td>{{$cliente->bairro}}</td>
                <td>{{$cliente->numeroEndereco}}</td>
                <td>{{$cliente->cidade}}</td>
                <td>{{$cliente->estado}}</td>
                <td>{{$cliente->pais}}</td>
                <td>{{$cliente->cep}}</td>
                <td>{{$cliente->nomePraca}}</td>
                <td>{{$cliente->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarCliente', $cliente->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.excluirCliente', $cliente->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn green" href="{{route('ativarCliente', $cliente->id)}}">ATIVAR</a>
                </td>
              </tr>
            @endif

            @if($cliente->ativoInativo == 1)
              <tr>
                <td>{{$cliente->nomePessoa}}</td>
                <td>{{$cliente->numero}}</td>
                <td>{{$cliente->rua}}</td>
                <td>{{$cliente->bairro}}</td>
                <td>{{$cliente->numeroEndereco}}</td>
                <td>{{$cliente->cidade}}</td>
                <td>{{$cliente->estado}}</td>
                <td>{{$cliente->pais}}</td>
                <td>{{$cliente->cep}}</td>
                <td>{{$cliente->nomePraca}}</td>
                <td>{{$cliente->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarCliente', $cliente->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.excluirCliente', $cliente->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn grey" href="{{route('desativarCliente', $cliente->id)}}">DESATIVAR</a>
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
