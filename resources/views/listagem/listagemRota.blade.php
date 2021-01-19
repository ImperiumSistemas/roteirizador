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
            <th>STATUS</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
          </tr>
        </thead>
        <tbody>

          @foreach($rotas as $rota)

            <tr>
              @if($rota->status == 'N')
              <td><font color="red">{{$rota->id}}</font></td>
              <td><font color="red">{{$rota->numeroPedagio}}</font></td>
              <td><font color="red">{{$rota->gastoPedagio}}</font></td>
              <td><font color="red">{{$rota->descricaoRota}}</font></td>
              <td><font color="red">{{$rota->REGIAO_id}}</font></td>
              <td><font color="red">{{$rota->status}}</font></td>
              @else
              <td><font color="green">{{$rota->id}}</font></td>
              <td><font color="green">{{$rota->numeroPedagio}}</font></td>
              <td><font color="green">{{$rota->gastoPedagio}}</font></td>
              <td><font color="green">{{$rota->descricaoRota}}</font></td>
              <td><font color="green">{{$rota->REGIAO_id}}</font></td>
              <td><font color="green">{{$rota->status}}</font></td>
              @endif

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
