@include('includes.header')

<div class="row">
  <h2><center> TELA CADASTRO DE USUARIOS</center></h2>
</div>

<div class="container">
  <div class="row">
      <div class="col s6">
        <div class="input-field">
          <form method="post" action="{{route('pesquisaUsuario')}}">
            {{ csrf_field() }}
            <input type="text" minlength="14" data-mask="000.000.000-00" placeholder="000.000.000-00"  name="cpf" required>
            <button>PESQUISAR PESSOA</button>
          </form>
        </div>

        

        @if(isset($mensagem) ? $mensagem : '')
          <span>{{$mensagem}}</span>
        @endif

        <form class="" action="{{route('layout.salvarUsuario')}}" method="post">
          {{ csrf_field() }}

          @include('formularios.formularioUsuario')

          <button class="btn deep-orange">SALVAR</button>

        </form>
      </div>

      <div class="col s6">
        <table border="1px">
          <tr>
            <th style="text-align: center"><strong>NOME</strong></th>
            <th style="text-align: center"><strong>E-MAIL</strong></th>
          </tr>

          @foreach($usuarios as $usuario)
            <tr>
              <td style="text-align: center"><br><a href="{{route('exibePapel', $usuario->id)}}">{{$usuario->name}}</a></td>
              <td style="text-align: center"><br>{{$usuario->email}}</td>
            </tr>
            @endforeach
        </table>
      </div>
  </div>

</div>


@include('includes.footer')
