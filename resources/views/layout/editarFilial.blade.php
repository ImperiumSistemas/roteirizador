@include('includes.header')

<div class="row">
  <h2><center> TELA EDITAR FILIAL </center></h2>
</div>

<div class="container">
  <div class="row">
      <form class="" method="post" action="{{route('layout.atualizar', $filiais->id)}}" method="post">
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="put">

        @include('formularios.formularioFilial')

        <button class="btn deep-orange">ATUALIZAR</button>

      </form>
  </div>
</div>


@include('includes.footer')
