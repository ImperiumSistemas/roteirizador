@include('includes.header')

<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">LISTAGEM PRAÇAS</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row" >
            <a href="{{route('layout.adicionarPraca')}}" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-fw fa-plus-square"></i>
                                        </span>
                <span class="text">ADICIONAR PRAÇA</span>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>PRAÇA</th>
            <th>ROTA</th>
            <th>DATA INATIVAÇÃO</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
            <th>SITUAÇÂO</th>
          </tr>
        </thead>
        <tbody>

          @foreach($pracas as $praca)
            @if($praca->ativoInativo == 0)
              <tr class="desativado">
                <td>{{$praca->nomePraca}}</td>
                <td>{{$praca->nomeRota}}</td>
                <td>{{$praca->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarPraca', $praca->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.excluirPraca', $praca->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn green" href="{{route('ativarPraca', $praca->id)}}">ATIVAR</a>
                </td>
              </tr>
            @endif

            @if($praca->ativoInativo == 1)
            <tr>
              <td>{{$praca->nomePraca}}</td>
              <td>{{$praca->nomeRota}}</td>
              <td>{{$praca->dataInativacao}}</td>
              <td>
                <a class="btn deep-orange" href="{{route('layout.editarPraca', $praca->id)}}">Editar</a>
              </td>
              <td>
                <a class="btn red" href="{{route('layout.excluirPraca', $praca->id)}}">Deletar</a>
              </td>
              <td>
                <a class="btn grey" href="{{route('desativarPraca', $praca->id)}}">DESATIVAR</a>
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
