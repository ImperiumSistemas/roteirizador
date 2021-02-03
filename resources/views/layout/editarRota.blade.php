@include('includes.header')

<div class="row">
  <h2><center> TELA EDITAR REGIÃO </center></h2>
</div>



<div class="container">
  <div class="row">

      <form class="" method="post" action="{{route('layout.atualizarRota', $rota->id)}}">
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="put">

        @include('formularios.formularioRota')

        <button class="btn deep-orange">ATUALIZAR</button>

      </form>
  </div>
</div>


@include('includes.footer')
