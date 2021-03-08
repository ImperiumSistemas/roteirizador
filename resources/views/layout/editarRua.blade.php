@include('includes.header')

<div class="row">
  <h2><center> TELA EDITAR RUA </center></h2>
</div>

<div class="container">
  <div class="row">
      <form class="" method="post" action="{{route('layout.atualizarRua', $rua->id)}}">
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="put">

        @include('formularios.formularioRua')

        <button class="btn deep-orange">ATUALIZAR</button>

      </form>
  </div>
</div>


@include('includes.footer')
