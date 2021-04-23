@include('includes.header')

<div class="container-fluid">
    
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">LISTAGEM PESSOAS</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <!--<h6 class="m-0 font-weight-bold text-primary">Filiais</h6>-->
    <div class="row" >
      <!--<a class="btn green" >ADICIONAR FILIAL</a>-->
      <a href="{{route('layout.adicionarPessoaFisica', 1)}}" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-fw fa-plus-square"></i>
                                        </span>
        <span class="text">ADICIONAR PESSOA FISICA</span>
      </a>
        <div><span class="text" style="color:whitesmoke">.....</span></div>
      <a href="{{route('layout.adicionarPessoaFisica', 2)}}" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-fw fa-plus-square"></i>
                                        </span>
        <span class="text">ADICIONAR PESSOA JURIDICA</span>
      </a>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>NOME</th>
            <th>TELEFONE</th>
            <th>CPF</th>
            <th>RG</th>
            <th>CNPJ</th>
            <th>RAZÃO SOCIAL</th>
            <th>TIPO</th>
            <th>DATA INATIVAÇÃO</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
            <th>SITUAÇÂO</th>
          </tr>
        </thead>
        <tbody>

          @if(empty($juridicaFisica->idFisica))

            @foreach($pessoaFisica as $pessoa)
              @if($pessoa->ativoInativo == 0)
                <tr class="desativado">
                  <td>{{$pessoa->nomePessoa}}</td>
                  <td>{{$pessoa->numeroTelefone}}</td>
                  <td>{{$pessoa->cpf}}</td>
                  <td>{{$pessoa->rg}}</td>
                  <td></td>
                  <td></td>
                  <td>FISICA</td>
                  <td>{{$pessoa->dataInativacao}}</td>
                  <td>
                    <a class="btn deep-orange" href="{{route('layout.editarPessoa', $pessoa->id)}}">EDITAR</a>
                  </td>
                  <td>
                    <a class="btn red" href="{{route('layout.excluirPessoa', $pessoa->id)}}">DELETAR</a>
                  </td>
                  <td>
                    <a class="btn green" href="{{route('ativarPessoa', $pessoa->id)}}">ATIVAR</a>
                  </td>
                </tr>
              @endif

              @if($pessoa->ativoInativo == 1)
                <tr>
                  <td>{{$pessoa->nomePessoa}}</td>
                  <td>{{$pessoa->numeroTelefone}}</td>
                  <td>{{$pessoa->cpf}}</td>
                  <td>{{$pessoa->rg}}</td>
                  <td></td>
                  <td></td>
                  <td>FISICA</td>
                  <td>{{$pessoa->dataInativacao}}</td>
                  <td>
                    <a class="btn deep-orange" href="{{route('layout.editarPessoa', $pessoa->id)}}">EDITAR</a>
                  </td>
                  <td>
                    <a class="btn red" href="{{route('layout.excluirPessoa', $pessoa->id)}}">DELETAR</a>
                  </td>
                  <td>
                    <a class="btn grey" href="{{route('desativarPessoa', $pessoa->id)}}">DESATIVAR</a>
                  </td>
                </tr>
              @endif
            @endForeach
          @endif

          @if(empty($juridicaFisica->idJuridica))

            @foreach($pessoaJuridica as $pessoa)
              @if($pessoa->ativoInativo == 0)
                <tr class="desativado">
                  <td>{{$pessoa->nomePessoa}}</td>
                  <td>{{$pessoa->numeroTelefone}}</td>
                  <td></td>
                  <td></td>
                  <td>{{$pessoa->cnpj}}</td>
                  <td>{{$pessoa->razaoSocial}}</td>
                  <td>JURIDICA</td>
                  <td>{{$pessoa->dataInativacao}}</td>
                  <td>
                    <a class="btn deep-orange" href="{{route('layout.editarPessoa', $pessoa->id)}}">EDITAR</a>
                  </td>
                  <td>
                    <a class="btn red" href="{{route('layout.excluirPessoa', $pessoa->id)}}">DELETAR</a>
                  </td>
                  <td>
                    <a class="btn green" href="{{route('ativarPessoa', $pessoa->id)}}">ATIVAR</a>
                  </td>
                </tr>
              @endif

              @if($pessoa->ativoInativo == 1)
                <tr>
                  <td>{{$pessoa->nomePessoa}}</td>
                  <td>{{$pessoa->numeroTelefone}}</td>
                  <td></td>
                  <td></td>
                  <td>{{$pessoa->cnpj}}</td>
                  <td>{{$pessoa->razaoSocial}}</td>
                  <td>JURIDICA</td>
                  <td>{{$pessoa->dataInativacao}}</td>
                  <td>
                    <a class="btn deep-orange" href="{{route('layout.editarPessoa', $pessoa->id)}}">EDITAR</a>
                  </td>
                  <td>
                    <a class="btn red" href="{{route('layout.excluirPessoa', $pessoa->id)}}">DELETAR</a>
                  </td>
                  <td>
                    <a class="btn grey" href="{{route('desativarPessoa', $pessoa->id)}}">DESATIVAR</a>
                  </td>
                </tr>
              @endif
            @endForeach
          @endif

        </tbody>
      </table>
    </div>
  </div>
</div>

</div>

@include('includes.footer')
