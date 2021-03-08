@include('includes.header')

<div class="row">
  <h2><center> TELA CADASTRO DE PAIS </center></h2>
</div>

<div class="container">
  <div class="row">
      <form class="" action="{{route('layout.salvarPais')}}" method="post" >
        {{ csrf_field() }}

        @include('formularios.formularioPais')

        <button class="btn deep-orange">SALVAR</button>
        <a href="{{route('listagem.pais')}}" class="btn deep-green">VOLTAR LISTAGEM</a>

      </form>
  </div>
</div>


@include('includes.footer')
