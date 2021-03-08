@include('includes.header')

<div class="container">


      <h3 ><center>LISTAGEM EMPRESA </center></h3>
    
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>NOME EMPRESA</th>
            <th>DATA DE INATIVAÇÃO</th>
            <th> EDITAR </th>
            <th> DELETAR </th>
            <th>SITUAÇÃO</th>
          </tr>
        </thead>
        <tbody>

          @foreach($empresas as $empresa)
            @if($empresa->ativoInativo == 0)
              <tr class="desativado">
                <td>{{$empresa->nome_empresa}}</td>
                <td>{{$empresa->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarEmpresa', $empresa->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.excluirEmpresa', $empresa->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn green" href="{{route('ativarEmpresa', $empresa->id)}}">Ativar</a>
                </td>
              </tr>
            @endif

            @if($empresa->ativoInativo == 1)
              <tr>
                <td>{{$empresa->nome_empresa}}</td>
                <td>{{$empresa->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarEmpresa', $empresa->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.excluirEmpresa', $empresa->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn grey" href="{{route('desativarEmpresa', $empresa->id)}}">Desativar</a>
                </td>
              </tr>
            @endif
          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarEmpresa')}}">ADICIONAR EMPRESA</a>
    </div>
</div>

@include('includes.footer')
