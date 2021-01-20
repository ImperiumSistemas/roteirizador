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
            <th>EDITAR</th>
            <th>DELETAR</th>
          </tr>
        </thead>
        <tbody>

          @foreach($motoristas as $motorista)
            <tr>
              <td>{{$motorista->id}}</td>
              <td>{{$motorista->cpf}}</td>
              <td>{{$motorista->nome}}</td>
              <td>{{$motorista->data_admissao}}</td>
              <td>{{$motorista->telefone}}</td>
              <td>{{$motorista->numero_cnh}}</td>
              <td>{{$motorista->data_validade_cnh}}</td>
              <td>{{$motorista->tipo_contrato}}</td>
              <td>
                <a class="btn deep-orange" href="{{route('layout.editarMotorista', $motorista->id)}}">Editar</a>
              </td>
              <td>
                <a class="btn red" href="{{route('layout.deleteMotorista', $motorista->id)}}">Deletar</a>
              </td>
            </tr>

          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarMotorista')}}">ADICIONAR MOTORISTAS</a>
    </div>
</div>

@include('includes.footer')
