@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM DE BAIRROS </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>NOME BAIRRO</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
          </tr>
        </thead>
        <tbody>

          @foreach($bairros as $bairro)
            <tr>
              <td>{{$bairro->id}}</td>
              <td>{{$bairro->nomeBairro}}</td>
              <td>
                <a class="btn deep-orange" href="{{route('layout.editarBairro', $bairro->id)}}">Editar</a>
              </td>
              <td>
                <a class="btn red" href="{{route('layout.excluirBairro', $bairro->id)}}">Deletar</a>
              </td>
            </tr>

          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarBairro')}}">ADICIONAR BAIRROS</a>
    </div>
</div>

@include('includes.footer')
