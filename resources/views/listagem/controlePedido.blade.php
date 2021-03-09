@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM PEDIDOS </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>CODIGO CLIENTE</th>
            <th>CODIGO PRACA</th>
            <th>CODIGO FILIAL</th>
            <th>CODIGO PEDIDO</th>
            <th>NOME PEDIDO</th>
            <th>DATA DE INATIVAÇÃO</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
            <th>SITUAÇÂO</th>
          </tr>
        </thead>
        <tbody>

          @foreach($pedidos as $pedido)

            @if($pedido->ativoInativo == 0)
              <tr class="desativado">
                <td>{{$pedido->codCliente}}</td>
                <td>{{$pedido->codPraca}}</td>
                <td>{{$pedido->codFilial}}</td>
                <td>{{$pedido->codPedido}}</td>
                <td>{{$pedido->nomePedido}}</td>
                <td>{{$pedido->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarPedido', $pedido->idPedido)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.excluirPedido', $pedido->idPedido)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn green" href="{{route('ativarPedido', $pedido->idPedido)}}">ATIVAR</a>
                </td>
              </tr>
            @endif


            @if($pedido->ativoInativo == 1)
              <tr>
                <td>{{$pedido->codCliente}}</td>
                <td>{{$pedido->codPraca}}</td>
                <td>{{$pedido->codFilial}}</td>
                <td>{{$pedido->codPedido}}</td>
                <td>{{$pedido->nomePedido}}</td>
                <td>{{$pedido->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarPedido', $pedido->idPedido)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.excluirPedido', $pedido->idPedido)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn grey" href="{{route('desativarPedido', $pedido->idPedido)}}">DESATIVAR</a>
                </td>
              </tr>
            @endif

          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarPedido')}}">ADICIONAR PEDIDO</a>
    </div>
</div>

@include('includes.footer')
