@include('includes.header')

<div class="container">

    <h3 ><center>CONFIRMA ENDEREÇO </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>ID PESSOA</th>
            <th>NOME</th>
            <th>ID ClIENTE</th>
            <th>CONFIRMAR ENDEREÇO</th>
          </tr>
        </thead>
        <tbody>

          @foreach($listagens as $listagem)

              <tr>
                <td>{{$listagem->idPessoa}}</td>
                <td>{{$listagem->nomePessoa}}</td>
                <td>{{$listagem->idCliente}}</td>
                <td>
                  <a class="btn grey"  href="{{route('confirmarEnderecoMapa')}}">CONFIRMAR ENDEREÇO</a>
                </td>
              </tr>

          @endForeach

        </tbody>
      </table>
    </div>

</div>

@include('includes.footer')
