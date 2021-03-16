@include('includes.header')

<div class="row">
  <h2><center> TELA CADASTRO DE PRODUTOS </center></h2>
</div>

<div class="container">

  <div class="row">
      <form class="" method="post" action="{{route('layout.salvarProdutos')}}">
        {{ csrf_field() }}

        @include('formularios.formulariosProdutos')

        <button class="btn deep-orange">SALVAR</button>
        <a href="{{route('listagem.produtos')}}" class="btn deep-green">VOLTAR LISTAGEM</a>

      </form>
  </div>
</div>


@include('includes.footer')
