@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM DE PRAÇA </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>PRAÇA</th>
            <th>ROTA</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
          </tr>
        </thead>
        <tbody>

          @foreach($pracas as $praca)
            <tr>
              <td>{{$praca->id}}</td>
              <td>{{$praca->praca}}</td>
              <td>{{$praca->ROTA_id}}</td>
              <td>
                <a class="btn deep-orange" href="#">Editar</a>
              </td>
              <td>
                <a class="btn red" href="#">Deletar</a>
              </td>
            </tr>

          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarPraca')}}">ADICIONAR PRAÇA</a>
    </div>
</div>

@include('includes.footer')
