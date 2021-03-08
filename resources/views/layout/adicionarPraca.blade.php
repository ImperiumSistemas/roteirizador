@include('includes.header')

<div class="row">
  <h2><center> TELA CADASTRO DE PRAÇAS </center></h2>
</div>

<div class="container">

  <div class="row">
      <form class="" method="post" action="{{route('layout.salvarPraca')}}">
        {{ csrf_field() }}

        @include('formularios.formularioPraca')

        <button class="btn deep-orange">SALVAR</button>
        <a href="{{route('listagem.praca')}}" class="btn deep-green">VOLTAR LISTAGEM</a>

      </form>
  </div>
</div>


@include('includes.footer')
