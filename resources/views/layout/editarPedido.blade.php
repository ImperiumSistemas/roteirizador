@include('includes.header')

<div class="row">
  <h2><center> TELA EDITAR PEDIDOS </center></h2>
</div>

<div class="container">
  <div class="row">
      <form class="" method="post" action="{{route('layout.atualizarPedido', $pedido->id)}}">
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="put">

        @include('formularios.formulariosPedidos')

        <button class="btn deep-orange">ATUALIZAR</button>
        <a href="{{route('listagem.pedidos')}}" class="btn deep-green">VOLTAR LISTAGEM</a>

      </form>
  </div>
</div>


@include('includes.footer')
