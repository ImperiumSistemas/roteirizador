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
            <th>EDITAR</th>
            <th>DELETAR</th>
          </tr>
        </thead>
        <tbody>

            @foreach($veiculo as $veiculos)
              <tr>
                <td>{{$veiculos->id}}</td>
                <td>{{$veiculos->marca}}</td>
                <td>{{$veiculos->km_rodado}}</td>
                <td>{{$veiculos->ano}}</td>
                <td>{{$veiculos->modelo}}</td>
                <td>{{$veiculos->chassi}}</td>
                <td>{{$veiculos->renavan}}</td>
                <td>{{$veiculos->TIPO_VEICULOS_id}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarVeiculo', $veiculos->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="#">Deletar</a>
                </td>
              </tr>

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
