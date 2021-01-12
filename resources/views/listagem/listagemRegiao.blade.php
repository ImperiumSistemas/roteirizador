@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM DE REGIÂO </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>NOME REGIÃO</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
          </tr>
        </thead>
        <tbody>

          @foreach($listagemRegiaos as $listagemRegiao)
            <tr>
              <td>{{$listagemRegiao->id}}</td>
              <td>{{$listagemRegiao->nomeRegiao}}</td>
              <td>
                <a class="btn deep-orange" href="{{route('layout.editarRegiao', $listagemRegiao->id)}}">Editar</a>
              </td>
              <td>
                <a class="btn red" href="{{route('layout.deletarRegiao', $listagemRegiao->id)}}">Deletar</a>
              </td>
            </tr>

          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarRegiao')}}">ADICIONAR REGIÔES</a>
    </div>
</div>

@include('includes.footer')
