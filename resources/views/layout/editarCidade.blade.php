@include('includes.header')

<div class="row">
  <h2><center> TELA EDITAR CIDADE </center></h2>
</div>

<div class="container">
  <div class="row">
      <form class="" method="post" action="{{route('layout.atualizarCidade', $cidade->id)}}">
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="put">

        @include('formularios.formularioCidade')

        <button class="btn deep-orange">ATUALIZAR</button>
        <a href="{{route('listagem.cidade')}}" class="btn deep-green">VOLTAR LISTAGEM</a>

      </form>
  </div>
</div>


@include('includes.footer')
