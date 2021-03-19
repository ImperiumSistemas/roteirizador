@include('includes.header')

<div class="row">
  <h2><center> TELA CADASTRO NIVEL DE ACESSOS </center></h2>
</div>

<div class="container">
  <div class="row">
      <form class="" action="{{route('layout.salavarNivelAcesso')}}" method="post" >
        {{ csrf_field() }}

        @include('formularios.formularioNiveisAcesso')

        <button class="btn deep-orange">SALVAR</button>

      </form>
  </div>
</div>


@include('includes.footer')
