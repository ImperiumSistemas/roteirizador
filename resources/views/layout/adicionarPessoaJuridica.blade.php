@include('includes.header')

<div class="row">
  <h2><center> TELA CADASTRO DE PESSOA JURIDICA </center></h2>
</div>

<div class="container">
  <div class="row">
      <form class="" action="{{route('layout.salvarPessoaJuridica')}}" method="post" >
        {{ csrf_field() }}

        @include('formularios.formularioSPessoaJuridica')

        <button class="btn deep-orange">SALVAR</button>

      </form>
  </div>
</div>


@include('includes.footer')
