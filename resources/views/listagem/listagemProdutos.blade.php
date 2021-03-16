@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM DE PRODUTOS </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>CODIGO PRODUTO</th>
            <th>DESCRIÇÂO</th>
            <th>CUBAGEM</th>
            <th>PESO</th>
            <th>DATA INATIVAÇÂO</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
            <th>SITUAÇÂO</th>
          </tr>
        </thead>
        <tbody>

          @foreach($produtos as $produto)
            @if($produto->ativoInativo == 0)
              <tr class="desativado">
                <td>{{$produto->codProduto}}</td>
                <td>{{$produto->descricao}}</td>
                <td>{{$produto->cubagem}}</td>
                <td>{{$produto->peso}}</td>
                <td>{{$produto->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarProdutos', $produto->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.excluirProdutos', $produto->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn green" href="{{route('ativarProduto', $produto->id)}}">ATIVAR</a>
                </td>
              </tr>
            @endif

            @if($produto->ativoInativo == 1)
            <tr>
              <td>{{$produto->codProduto}}</td>
              <td>{{$produto->descricao}}</td>
              <td>{{$produto->cubagem}}</td>
              <td>{{$produto->peso}}</td>
              <td>{{$produto->dataInativacao}}</td>
              <td>
                <a class="btn deep-orange" href="{{route('layout.editarProdutos', $produto->id)}}">Editar</a>
              </td>
              <td>
                <a class="btn red" href="{{route('layout.excluirProdutos', $produto->id)}}">Deletar</a>
              </td>
              <td>
                <a class="btn grey" href="{{route('desativarProduto', $produto->id)}}">DESATIVAR</a>
              </td>
            </tr>
            @endif
          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarProduto')}}">ADICIONAR PRODUTOS</a>
    </div>
</div>

@include('includes.footer')
