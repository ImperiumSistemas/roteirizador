@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM PESSOAS </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>NOME</th>
            <th>TELEFONE</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
          </tr>
        </thead>
        <tbody>

          @foreach($pessoas as $pessoa)
            <tr>
              <td>{{$pessoa->nome}}</td>
              <td>{{$pessoa->numero_telefone}}</td>
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
      <a class="btn green" href="{{route('layout.adicionarPessoa')}}">ADICIONAR ENDEREÇO</a>
    </div>
</div>

@include('includes.footer')
