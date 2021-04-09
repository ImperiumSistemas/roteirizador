@include('includes.header')

<div class="container">

    <h3 ><center>NIVEIS DE ACESSOS </center></h3>
    <br/><br/>
  <div class="row">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">CÓDIGO</th>
          <th scope="col">DESCRIÇÃO</th>
          <th scope="col">EDITAR</th>
          <th scope="col">DELETAR</th>
        </tr>
      </thead>

      <tbody>
        @foreach($papeis as $papel)
          <tr>
            <td>{{$papel->id}}</td>
            <td><a href="{{route('permissaoAcesso', $papel->id)}}">{{$papel->nome}}</a></td>
            <td>
              <a class="btn deep-orange" href="{{route('layout.editarNivelAcesso', $papel->id)}}">Editar</a>
            </td>
            <td>
              <a class="btn red" href="{{route('layout.excluirNivelAcesso', $papel->id)}}">Deletar</a>
            </td>
          </tr>

        @endforeach
      </tbody>

    </table>
  </div>
  <div class="row">
    <a class="btn green" href="{{route('layout.adicionarNivelAcesso')}}">ADICIONAR NIVEL</a>
  </div>

</div>

@include('includes.footer')
