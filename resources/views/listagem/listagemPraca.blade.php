@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM DE PRAÇA </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>PRAÇA</th>
            <th>ROTA</th>
            <th>DATA INATIVAÇÃO</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
            <th>SITUAÇÂO</th>
          </tr>
        </thead>
        <tbody>

          @foreach($pracas as $praca)
            @if($praca->ativoInativo == 0)
              <tr class="desativado">
                <td>{{$praca->praca}}</td>
                <td>{{$praca->ROTA_id}}</td>
                <td>{{$praca->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarPraca', $praca->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.excluirPraca', $praca->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn green" href="{{route('ativarPraca', $praca->id)}}">ATIVAR</a>
                </td>
              </tr>
            @endif

            @if($praca->ativoInativo == 1)
            <tr>
              <td>{{$praca->praca}}</td>
              <td>{{$praca->ROTA_id}}</td>
              <td>{{$praca->dataInativacao}}</td>
              <td>
                <a class="btn deep-orange" href="{{route('layout.editarPraca', $praca->id)}}">Editar</a>
              </td>
              <td>
                <a class="btn red" href="{{route('layout.excluirPraca', $praca->id)}}">Deletar</a>
              </td>
              <td>
                <a class="btn grey" href="{{route('desativarPraca', $praca->id)}}">DESATIVAR</a>
              </td>
            </tr>
            @endif
          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarPraca')}}">ADICIONAR PRAÇA</a>
    </div>
</div>

@include('includes.footer')
