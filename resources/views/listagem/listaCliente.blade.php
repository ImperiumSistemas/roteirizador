@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM CLIENTES </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>ID PRAÇA</th>
            <th>ID PESSOA</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
          </tr>
        </thead>
        <tbody>

          @foreach($clientes as $cliente)
            <tr>
              <td>{{$cliente->PRACA_id}}</td>
              <td>{{$cliente->PESSOA_id}}</td>
              <td>
                <a class="btn deep-orange" href="">Editar</a>
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
      <a class="btn green" href="{{route('layout.adicionarCliente')}}">ADICIONAR ENDEREÇO</a>
    </div>
</div>

@include('includes.footer')
