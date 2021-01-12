@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM DE CIDADES </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>NOME CIDADE</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
          </tr>
        </thead>
        <tbody>

          @foreach($cidade as $cidades)
            <tr>
              <td>{{$cidades->id}}</td>
              <td>{{$cidades->nomeCidade}}</td>
              <td>
                <a class="btn deep-orange" href="{{route('layout.editarCidade', $cidades->id)}}">Editar</a>
              </td>
              <td>
                <a class="btn red" href="{{route('layout.excluirCidade', $cidades->id)}}">Deletar</a>
              </td>
            </tr>

          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarCidade')}}">ADICIONAR CIDADES</a>
    </div>
</div>

@include('includes.footer')
