@include('includes.header')

<div class="row">
  <h2><center> TELA CADASTRO DE PEDIDO </center></h2>
</div>

<div class="container">
  <div class="row">
      <form class="" method="post" action="{{route('layout.salvarPedido')}}" >
        {{ csrf_field() }}

        @include('formularios.formulariosPedidos')

        <button class="btn deep-orange">SALVAR</button>
        <a href="{{route('listagem.pedidos')}}" class="btn deep-green">VOLTAR LISTAGEM</a>

      </form>
  </div>
</div>


@include('includes.footer')
