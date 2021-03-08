@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM DE ESTADO </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>NOME ESTADO</th>
            <th>DATA INATIVAÇÃO</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
            <th>SITUAÇÃO</th>
          </tr>
        </thead>
        <tbody>

          @foreach($estados as $estado)
            @if($estado->ativoInativo == 0)
              <tr class="desativado">
                <td>{{$estado->nomeEstado}}</td>
                <td>{{$estado->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarEstado', $estado->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.deletarEstado', $estado->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn green" href="{{route('ativarEstado', $estado->id)}}">ATIVAR</a>
                </td>
              </tr>
            @endif

            @if($estado->ativoInativo == 1)
              <tr>
                <td>{{$estado->nomeEstado}}</td>
                <td>{{$estado->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarEstado', $estado->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.deletarEstado', $estado->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn grey" href="{{route('desativarEstado', $estado->id)}}">DESATIVAR</a>
                </td>
              </tr>
            @endif
          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarEstado')}}">ADICIONAR ESTADO</a>
    </div>
</div>

@include('includes.footer')
