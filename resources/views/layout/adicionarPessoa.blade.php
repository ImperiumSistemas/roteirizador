@include('includes.header')

<div class="row">
  <h2><center> TELA CADASTRO DE PESSOA </center></h2>
</div>

<div class="container">
  <div class="row">
      <form class="" action="#" method="#" >
        {{ csrf_field() }}

        @include('formularios.formularioPessoa')

        <button class="btn deep-orange">SALVAR</button>

      </form>
  </div>
</div>


@include('includes.footer')
