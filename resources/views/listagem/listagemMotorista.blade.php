@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM DE MOTORISTAS </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>NOME</th>
            <th>NUMERO CNH</th>
            <th>VALIDADE CNH</th>
            <th>BAIRRO</th>
            <th>CIDADE</th>
            <th>ESTADO</th>
            <th>DATA DE INATIVAÇÃO</th>
            <th>NOME DA FILIAL</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
            <th>SITUAÇÂO</th>
          </tr>
        </thead>
        <tbody>

          @foreach($motoristas as $motorista)
            @if($motorista->ativoInativo == 0)
            <tr class="desativado">
              <td>{{$motorista->nomePessoa}}</td>
              <td>{{$motorista->numeroCnh}}</td>
              <td>{{$motorista->dataValidadeCnh}}</td>
              <td>{{$motorista->bairro}}</td>
              <td>{{$motorista->cidade}}</td>
              <td>{{$motorista->estado}}</td>
              <td>{{$motorista->dataInativacao}}</td>
              <td>{{$motorista->descricao}}</td>
              <td>
                <a class="btn deep-orange" href="{{route('layout.editarMotorista', $motorista->motoristaId)}}">Editar</a>
              </td>
              <td>
                <a class="btn red" href="{{route('layout.deleteMotorista', $motorista->motoristaId)}}">Deletar</a>
              </td>
              <td>
                <a class="btn green" href="{{route('ativarMotorista', $motorista->motoristaId)}}">ATIVAR</a>
              </td>
            </tr>
            @endif

            @if($motorista->ativoInativo == 1)
            <tr>
              <td>{{$motorista->nomePessoa}}</td>
              <td>{{$motorista->numeroCnh}}</td>
              <td>{{$motorista->dataValidadeCnh}}</td>
              <td>{{$motorista->bairro}}</td>
              <td>{{$motorista->cidade}}</td>
              <td>{{$motorista->estado}}</td>
              <td>{{$motorista->dataInativacao}}</td>
              <td>{{$motorista->descricao}}</td>
              <td>
                <a class="btn deep-orange" href="{{route('layout.editarMotorista', $motorista->motoristaId)}}">Editar</a>
              </td>
              <td>
                <a class="btn red" href="{{route('layout.deleteMotorista', $motorista->motoristaId)}}">Deletar</a>
              </td>
              <td>
                <a class="btn grey" href="{{route('desativarMotorista', $motorista->motoristaId)}}">DESATIVAR</a>
              </td>
            </tr>
            @endif
          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarMotorista')}}">ADICIONAR MOTORISTAS</a>
    </div>
</div>

@include('includes.footer')
