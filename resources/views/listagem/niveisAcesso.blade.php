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
        @foreach($niveisAcesso as $na)
          <tr>
            <td>{{$na->id}}</td>
            <td><a href="{{route('permissaoAcesso', $na->id)}}">{{$na->descricao}}</a></td>
            <td>
              <a class="btn deep-orange" href="{{route('layout.editarNivelAcesso', $na->id)}}">Editar</a>
            </td>
            <td>
              <a class="btn red" href="{{route('layout.excluirNivelAcesso', $na->id)}}">Deletar</a>
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
