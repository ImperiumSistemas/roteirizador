@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM FILIAIS </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>CNPJ</th>
            <th>TELEFONE</th>
            <th>PAIS</th>
            <th>ESTADO</th>
            <th>CIDADE</th>
            <th>BAIRRO</th>
            <th>CEP</th>
            <th>DESCRIÇÃO<th>
            <th>ID DA EMPRESA</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
          </tr>
        </thead>
        <tbody>

          @foreach($filiais as $filial)
            <tr>
              <td>{{$filial->id}}</td>
              <td>{{$filial->cnpj}}</td>
              <td>{{$filial->telefone}}</td>
              <td>{{$filial->pais}}</td>
              <td>{{$filial->estado}}</td>
              <td>{{$filial->cidade}}</td>
              <td>{{$filial->bairro}}</td>
              <td>{{$filial->cep}}</td>
              <td>{{$filial->descricao}}<td>
              <td>{{$filial->EMPRESA_id}}</td>
              <td>
                <a class="btn deep-orange" href="{{route('layout.editar', $filial->id)}}">Editar</a>
              </td>
              <td>
                <a class="btn red" href="{{route('layoute.delete', $filial->id)}}">Deletar</a>
              </td>
            </tr>

          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarFilial')}}">ADICIONAR FILIAL</a>
    </div>
</div>

@include('includes.footer')
