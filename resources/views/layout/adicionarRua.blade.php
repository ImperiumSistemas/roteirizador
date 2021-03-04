@include('includes.header')

<div class="row">
  <h2><center> TELA CADASTRO DE RUAS </center></h2>
</div>

<div class="container">
  <div class="row">
      <form class="" action="{{route('layout.salvarRua')}}" method="post">
        {{ csrf_field() }}

        @include('formularios.formularioRua')

        <button class="btn deep-orange">SALVAR</button>

      </form>
  </div>
</div>


@include('includes.footer')
