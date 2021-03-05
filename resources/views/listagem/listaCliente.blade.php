@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM CLIENTES </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>NOME</th>
            <th>TEL</th>
            <th>RUA</th>
            <th>BAIRRO</th>
            <th>NUMERO</th>
            <th>PAIS</th>
            <th>CIDADE</th>
            <th>ESTADO</th>
            <th>PRAÇA</th>
            <th>DATA INATIVAÇÃO</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
            <th>SITUAÇÃO</th>
          </tr>
        </thead>
        <tbody>

          @foreach($clientes as $cliente)
            @if($cliente->ativoInativo == 0)
              <tr class="desativado">
                <td>{{$cliente->nomePessoa}}</td>
                <td>{{$cliente->numero}}</td>
                <td>{{$cliente->rua}}</td>
                <td>{{$cliente->bairro}}</td>
                <td>{{$cliente->numeroEndereco}}</td>
                <td>{{$cliente->pais}}</td>
                <td>{{$cliente->cidade}}</td>
                <td>{{$cliente->estado}}</td>
                <td>{{$cliente->nomePraca}}</td>
                <td>{{$cliente->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarCliente', $cliente->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.excluirCliente', $cliente->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn green" href="{{route('ativarCliente', $cliente->id)}}">ATIVAR</a>
                </td>
              </tr>
            @endif

            @if($cliente->ativoInativo == 1)
              <tr>
                <td>{{$cliente->nomePessoa}}</td>
                <td>{{$cliente->numero}}</td>
                <td>{{$cliente->rua}}</td>
                <td>{{$cliente->bairro}}</td>
                <td>{{$cliente->numeroEndereco}}</td>
                <td>{{$cliente->pais}}</td>
                <td>{{$cliente->cidade}}</td>
                <td>{{$cliente->estado}}</td>
                <td>{{$cliente->nomePraca}}</td>
                <td>{{$cliente->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarCliente', $cliente->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.excluirCliente', $cliente->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn grey" href="{{route('desativarCliente', $cliente->id)}}">DESATIVAR</a>
                </td>
              </tr>
            @endif
          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarCliente')}}">ADICIONAR CLIENTE</a>
    </div>
</div>

@include('includes.footer')
