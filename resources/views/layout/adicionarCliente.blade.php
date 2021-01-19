@include('includes.header')

<div class="row">
  <h2><center> TELA CADASTRO DE CLIENTES </center></h2>
</div>

<div class="container">
  <div class="row">
      <form class="" method="post" action="{{route('layout.salvarCliente')}}" >
        {{ csrf_field() }}

        @include('formularios.formularioCliente')

        <button class="btn deep-orange">SALVAR</button>

      </form>
  </div>
</div>


@include('includes.footer')
