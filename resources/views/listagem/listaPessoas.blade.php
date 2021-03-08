@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM PESSOAS </center></h3>
    <br/><br/>

    <div class="row">
      <table>
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

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarPessoaFisica', 1)}}">ADICIONAR PESSOA FISICA</a>
        <a class="btn green" href="{{route('layout.adicionarPessoaFisica', 2)}}">ADICIONAR PESSOA JURIDICA</a>
    </div>
</div>

@include('includes.footer')
