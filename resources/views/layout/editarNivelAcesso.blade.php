@include('includes.header')

<div class="row">
  <h2><center> TELA EDITAR NIVEL DE ACESSO </center></h2>
</div>

<div class="container">
  <div class="row">
      <form class="" method="post" action="{{route('layout.atualizarNivelAcesso', $papel->id)}}">
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="put">

        @include('formularios.formularioNiveisAcesso')

        <button class="btn deep-orange">ATUALIZAR</button>
        <a href="{{route('listagem.niveisAcessos')}}" class="btn deep-green">VOLTAR LISTAGEM</a>

      </form>
  </div>
</div>


@include('includes.footer')
