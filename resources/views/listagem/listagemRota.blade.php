@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM DE ROTAS </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>NUMERO PEDÁGIO</th>
            <th>GASTO PEDÁGIO</th>
            <th>DESCRIÇÃO ROTA</th>
            <th>REGIAO</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
          </tr>
        </thead>
        <tbody>

          @foreach($rotas as $rota)
            <tr>
              <td>{{$rota->id}}</td>
              <td>{{$rota->numeroPedagio}}</td>
              <td>{{$rota->gastoPedagio}}</td>
              <td>{{$rota->descricaoRota}}</td>
              <td>{{$rota->REGIAO_id}}</td>
              <td>
                <a class="btn deep-orange" href="{{route('layout.editarRota', $rota->id)}}">Editar</a>
              </td>
              <td>
                <a class="btn red" href="{{route('layout.excluirRota', $rota->id)}}">Deletar</a>
              </td>
            </tr>

          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarRota')}}">ADICIONAR ROTA</a>
    </div>
</div>

@include('includes.footer')
