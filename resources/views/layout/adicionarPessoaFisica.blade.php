@include('includes.header')

<div class="row">
  <h2><center> TELA CADASTRO DE PESSOA </center></h2>
</div>

<div class="container">
  <div class="row">
      <form class="" action="{{route('layout.salvarPessoaFisica')}}" method="post" >
        {{ csrf_field() }}

        @include('formularios.formularioPessoaFisica')

        <button class="btn deep-orange">SALVAR</button>
        <a href="{{route('listagem.pessoas')}}" class="btn deep-green">VOLTAR LISTAGEM</a>

      </form>
  </div>
</div>


@include('includes.footer')
