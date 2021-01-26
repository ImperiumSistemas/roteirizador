@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM DE VEICULOS </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>MARCA</th>
            <th>KM RODADO</th>
            <th>ANO</th>
            <th>MODELO</th>
            <th>CHASSI</th>
            <th>RENAVAN</th>
            <th>TIPO VEICULO</th>
            <th>DATA DE INATIVAÇÃO</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
            <th>SITUAÇÂO</th>
          </tr>
        </thead>
        <tbody>

            @foreach($veiculo as $veiculos)
              @if($veiculos->ativoInativo == 0)
                <tr class="desativado">
                  <td>{{$veiculos->id}}</td>
                  <td>{{$veiculos->marca}}</td>
                  <td>{{$veiculos->km_rodado}}</td>
                  <td>{{$veiculos->ano}}</td>
                  <td>{{$veiculos->modelo}}</td>
                  <td>{{$veiculos->chassi}}</td>
                  <td>{{$veiculos->renavan}}</td>
                  <td>{{$veiculos->TIPO_VEICULOS_id}}</td>
                  <td>{{$veiculos->dataInativacao}}</td>
                  <td>
                    <a class="btn deep-orange" href="{{route('layout.editarVeiculo', $veiculos->id)}}">Editar</a>
                  </td>
                  <td>
                    <a class="btn red" href="{{route('layout.deletarVeiculo', $veiculos->id)}}">Deletar</a>
                  </td>
                  <td>
                    <a class="btn green" href="{{route('ativarVeiculo', $veiculos->id)}}">Ativar</a>
                  </td>
                </tr>
              @endif

              @if($veiculos->ativoInativo == 1)
                <tr>
                  <td>{{$veiculos->id}}</td>
                  <td>{{$veiculos->marca}}</td>
                  <td>{{$veiculos->km_rodado}}</td>
                  <td>{{$veiculos->ano}}</td>
                  <td>{{$veiculos->modelo}}</td>
                  <td>{{$veiculos->chassi}}</td>
                  <td>{{$veiculos->renavan}}</td>
                  <td>{{$veiculos->TIPO_VEICULOS_id}}</td>
                  <td>{{$veiculos->dataInativacao}}</td>
                  <td>
                    <a class="btn deep-orange" href="{{route('layout.editarVeiculo', $veiculos->id)}}">Editar</a>
                  </td>
                  <td>
                    <a class="btn red" href="{{route('layout.deletarVeiculo', $veiculos->id)}}">Deletar</a>
                  </td>
                  <td>
                    <a class="btn grey" href="{{route('desativarVeiculo', $veiculos->id)}}">Desativar</a>
                  </td>
                </tr>
              @endif
            @endForeach

        </tbody>
      </table>

    </div>

    <br/><br/>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarVeiculo')}}">ADICIONAR VEICULOS</a>

    </div>
</div>



@include('includes.footer')
