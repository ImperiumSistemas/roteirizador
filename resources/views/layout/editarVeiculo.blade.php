@include('includes.header')

<div class="row">
  <h2><center> TELA EDITAR VEICULO </center></h2>
</div>

<div class="container">
  <div class="row">
      <form class="" action="{{route('layout.atualizarVeiculo', $veiculo->veiculoId)}}" method="post" >
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="put">

        @include('formularios.formulariosVeiculos')

        <button class="btn deep-orange">ATUALIZAR</button>

      </form>
  </div>
</div>


@include('includes.footer')
