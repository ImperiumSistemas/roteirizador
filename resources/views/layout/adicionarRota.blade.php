@include('includes.header')

<div class="row">
  <h2><center> TELA CADASTRO DE ROTAS </center></h2>
</div>

<div class="container">
  <div class="row">
      <form class="" action="{{route('layout.salvarRota')}}" method="post" >
        {{ csrf_field() }}

        @include('formularios.formularioRota')

        <button class="btn deep-orange">SALVAR</button>
        <a href="{{route('listagem.rota')}}" class="btn deep-green">VOLTAR LISTAGEM</a>

      </form>
  </div>
</div>


@include('includes.footer')
