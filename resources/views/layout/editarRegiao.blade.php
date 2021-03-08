@include('includes.header')

<div class="row">
  <h2><center> TELA EDITAR REGIÃO </center></h2>
</div>

<div class="container">
  <div class="row">
      <form class="" method="post" action="{{route('layout.atualizarRegiao', $regiao->id)}}">
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="put">

        @include('formularios.formularioRegiao')

        <button class="btn deep-orange">ATUALIZAR</button>
        <a href="{{route('listagem.regiao')}}" class="btn deep-green">VOLTAR LISTAGEM</a>

      </form>
  </div>
</div>


@include('includes.footer')
