@include('includes.header')

<div class="row">
  <h2><center> TELA CADASTRO DE REGIÂO </center></h2>
</div>

<div class="container">
  <div class="row">
      <form class="" action="{{route('layout.salvarRegiao')}}" method="post" >
        {{ csrf_field() }}

        @include('formularios.formularioRegiao')

        <button class="btn deep-orange">SALVAR</button>

      </form>
  </div>
</div>


@include('includes.footer')
