@include('includes.header')



    <h3 ><center>LISTAGEM FILIAIS </center></h3>
    <br/><br/>

    <!--<div class="row">-->
    <div class="container-fluid">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>CNPJ</th>
            <!--<th>TELEFONE</th>
            <th>PAIS</th>
            <th>ESTADO</th>
            <th>CIDADE</th>
            <th>BAIRRO</th>
            <th>CEP</th>-->
            <th>DESCRIÇÃO<th>
            <!--<th>DATA DE INATIVAÇÃO</th>-->
            <th>NOME EMPRESA</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
            <th>SITUAÇÂO</th>
            <th>CONFIRMAR ENDEREÇO</th>
          </tr>
        </thead>
        <tbody>

          @foreach($filiais as $filial)
            @if($filial->ativoInativo == 0)
              <tr class="desativado">
                <td>{{$filial->cnpj}}</td>
                <!--<td>{{$filial->telefone}}</td>
                <td>{{$filial->pais}}</td>
                <td>{{$filial->estado}}</td>
                <td>{{$filial->cidade}}</td>
                <td>{{$filial->bairro}}</td>
                <td>{{$filial->cep}}</td>-->
                <td>{{$filial->descricao}}<td>
                <!--<td>{{$filial->dataInativacao}}</td>-->
                <td>{{$filial->nomeEmpresa}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editar', $filial->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layoute.delete', $filial->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn green" href="{{route('ativarFilial', $filial->id)}}">ATIVAR</a>
                </td>
                <td>
                <a class="btn green" href="{{route('confirmarEnderecoMapaFilial', $filial->id)}}">CONFIRMAR ENDEREÇO</a>
              </td>
              </tr>
            @endif

            @if($filial->ativoInativo == 1)
            <tr>
              <td>{{$filial->cnpj}}</td>
              <!--<td>{{$filial->telefone}}</td>
              <td>{{$filial->pais}}</td>
              <td>{{$filial->estado}}</td>
              <td>{{$filial->cidade}}</td>
              <td>{{$filial->bairro}}</td>
              <td>{{$filial->cep}}</td>-->
              <td>{{$filial->descricao}}<td>
             <!-- <td>{{$filial->dataInativacao}}</td>-->
              <td>{{$filial->nomeEmpresa}}</td>
              <td>
                <a class="btn deep-orange" href="{{route('layout.editar', $filial->id)}}">Editar</a>
              </td>
              <td>
                <a class="btn red" href="{{route('layoute.delete', $filial->id)}}">Deletar</a>
              </td>
              <td>
                <a class="btn grey" href="{{route('desativarFilial', $filial->id)}}">DESATIVAR</a>                
              </td>
              <td>
                <a class="btn green" href="{{route('confirmarEnderecoMapaFilial', $filial->id)}}">CONFIRMAR ENDEREÇO</a>
              </td>
            </tr>
            @endif
          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarFilial')}}">ADICIONAR FILIAL</a>
    </div>



@include('includes.footer')
