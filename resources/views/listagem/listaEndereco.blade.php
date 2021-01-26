@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM ENDEREÇOS </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>DATA INATIVAÇÃO</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
            <th>SITUAÇÃO</th>
          </tr>
        </thead>
        <tbody>

          @foreach($enderecos as $endereco)
            @if($endereco->ativoInativo == 0)
              <tr class="desativado">
                <td>{{$endereco->id}}</td>
                <td>{{$endereco->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarEndereco', $endereco->id)}}">EDITAR</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.excluirEndereco', $endereco->id)}}">DELETAR</a>
                </td>
                <td>
                  <a class="btn green" href="{{route('ativarEndereco', $endereco->id)}}">ATIVAR</a>
                </td>
              </tr>
            @endif

            @if($endereco->ativoInativo == 1)
              <tr>
                <td>{{$endereco->id}}</td>
                <td>{{$endereco->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarEndereco', $endereco->id)}}">EDITAR</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.excluirEndereco', $endereco->id)}}">DELETAR</a>
                </td>
                <td>
                  <a class="btn grey" href="{{route('desativarEndereco', $endereco->id)}}">DESATIVAR</a>
                </td>
              </tr>
            @endif

          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarEndereco')}}">ADICIONAR ENDEREÇO</a>
    </div>
</div>

@include('includes.footer')
