@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM DE MOTORISTAS </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>CPF</th>
            <th>NOME</th>
            <th>DATA ADMISSÃO</th>
            <th>TELEFONE</th>
            <th>NUMERO CNH</th>
            <th>VALIDADE CNH</th>
            <th>TIPO CONTRATO</th>
            <th>DATA DE INATIVAÇÃO</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
            <th>SITUAÇÂO</th>
          </tr>
        </thead>
        <tbody>

          @foreach($motoristas as $motorista)
            @if($motorista->ativoInativo == 0)
            <tr class="desativado">
              <td>{{$motorista->id}}</td>
              <td>{{$motorista->cpf}}</td>
              <td>{{$motorista->nome}}</td>
              <td>{{$motorista->data_admissao}}</td>
              <td>{{$motorista->telefone}}</td>
              <td>{{$motorista->numero_cnh}}</td>
              <td>{{$motorista->data_validade_cnh}}</td>
              <td>{{$motorista->tipo_contrato}}</td>
              <td>{{$motorista->dataInativacao}}</td>
              <td>
                <a class="btn deep-orange" href="{{route('layout.editarMotorista', $motorista->id)}}">Editar</a>
              </td>
              <td>
                <a class="btn red" href="{{route('layout.deleteMotorista', $motorista->id)}}">Deletar</a>
              </td>
              <td>
                <a class="btn green" href="{{route('ativarMotorista', $motorista->id)}}">ATIVAR</a>
              </td>
            </tr>
            @endif

            @if($motorista->ativoInativo == 1)
            <tr>
              <td>{{$motorista->id}}</td>
              <td>{{$motorista->cpf}}</td>
              <td>{{$motorista->nome}}</td>
              <td>{{$motorista->data_admissao}}</td>
              <td>{{$motorista->telefone}}</td>
              <td>{{$motorista->numero_cnh}}</td>
              <td>{{$motorista->data_validade_cnh}}</td>
              <td>{{$motorista->tipo_contrato}}</td>
              <td>{{$motorista->dataInativacao}}</td>
              <td>
                <a class="btn deep-orange" href="{{route('layout.editarMotorista', $motorista->id)}}">Editar</a>
              </td>
              <td>
                <a class="btn red" href="{{route('layout.deleteMotorista', $motorista->id)}}">Deletar</a>
              </td>
              <td>
                <a class="btn grey" href="{{route('desativarMotorista', $motorista->id)}}">DESATIVAR</a>
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
