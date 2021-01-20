@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM ENDEREÇOS </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
          </tr>
        </thead>
        <tbody>

          @foreach($enderecos as $endereco)
            <tr>
              <td>{{$endereco->id}}</td>
              <td>
                <a class="btn deep-orange" href="{{route('layout.editarEndereco', $endereco->id)}}">Editar</a>
              </td>
              <td>
                <a class="btn red" href="{{route('layout.excluirEndereco', $endereco->id)}}">Deletar</a>
              </td>
            </tr>

          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarEndereco')}}">ADICIONAR ENDEREÇO</a>
    </div>
</div>

@include('includes.footer')
