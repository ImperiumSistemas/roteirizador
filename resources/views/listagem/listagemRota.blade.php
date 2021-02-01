@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM DE ROTAS </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>NUMERO PEDÁGIO</th>
            <th>GASTO PEDÁGIO</th>
            <th>DESCRIÇÃO ROTA</th>
            <th>DATA INATIVAÇÃO</th>
            <th>REGIAO</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
            <th>SITUAÇÂO</th>
          </tr>
        </thead>
        <tbody>

          @foreach($rotas as $rota)
            @if($rota->ativoInativo == 0)
              <tr class="desativado">
                <td>{{$rota->numeroPedagio}}</td>
                <td>{{$rota->gastoPedagio}}</td>
                <td>{{$rota->descricaoRota}}</td>
                <td>{{$rota->dataInativacao}}</td>
                <td>{{$rota->nomeRegiao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarRota', $rota->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.excluirRota', $rota->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn green" href="{{route('ativarRota', $rota->id)}}">ATIVAR</a>
                </td>
              </tr>
            @endif

            @if($rota->ativoInativo == 1)
              <tr>
                <td>{{$rota->numeroPedagio}}</td>
                <td>{{$rota->gastoPedagio}}</td>
                <td>{{$rota->descricaoRota}}</td>
                <td>{{$rota->dataInativacao}}</td>
                <td>{{$rota->nomeRegiao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarRota', $rota->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.excluirRota', $rota->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn grey" href="{{route('desativarRota', $rota->id)}}">DESATIVAR</a>
                </td>
              </tr>
            @endif

          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarRota')}}">ADICIONAR ROTA</a>
    </div>
</div>

@include('includes.footer')
