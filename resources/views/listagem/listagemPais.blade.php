@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM DE PAIS </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>NOME PAIS</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
          </tr>
        </thead>
        <tbody>

          @foreach($paises as $pais)
            <tr>
              <td>{{$pais->id}}</td>
              <td>{{$pais->pais}}</td>
              <td>
                <a class="btn deep-orange" href="{{route('layout.editarPais', $pais->id)}}">Editar</a>
              </td>
              <td>
                <a class="btn red" href="{{route('layout.excluirPais', $pais->id)}}">Deletar</a>
              </td>
            </tr>

          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarPais')}}">ADICIONAR CIDADES</a>
    </div>
</div>

@include('includes.footer')
