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
            <th>DATA INATIVAÇÃO</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
            <th>SITUAÇÂO</th>
          </tr>
        </thead>
        <tbody>

          @foreach($pessoas as $pessoa)
            @if($pessoa->ativoInativo == 0)
              <tr class="desativado">
                <td>{{$pessoa->nome}}</td>
                <td>{{$pessoa->numero_telefone}}</td>
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
                <td>{{$pessoa->nome}}</td>
                <td>{{$pessoa->numero_telefone}}</td>
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

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarPessoaFisica', 1)}}">ADICIONAR PESSOA FISICA</a>
        <a class="btn green" href="{{route('layout.adicionarPessoaFisica', 2)}}">ADICIONAR PESSOA JURIDICA</a>
    </div>
</div>

@include('includes.footer')
