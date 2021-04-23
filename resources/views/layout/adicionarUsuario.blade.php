@include('includes.header')

<div class="row">
  <h2><center> TELA CADASTRO DE USUARIOS</center></h2>
</div>

<div class="container">
  <div class="row">
      <div class="col s6">
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
  teste
</div>


@include('includes.footer')
