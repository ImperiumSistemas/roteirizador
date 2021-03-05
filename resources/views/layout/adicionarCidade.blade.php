@include('includes.header')

<div class="row">
  <h2><center> TELA CADASTRO DE CIDADES </center></h2>
</div>

<div class="container">
  <div class="row">
      <form class="" action="{{route('layout.salvarCidade')}}" method="post" >
        {{ csrf_field() }}

        @include('formularios.formularioCidade')

        <button class="btn deep-orange">SALVAR</button>
        <a href="{{route('listagem.cidade')}}" class="btn deep-green">VOLTAR LISTAGEM</a>

      </form>
  </div>
</div>


@include('includes.footer')
