@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM DE PAIS </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>NOME PAIS</th>
            <th>EDITAR</th>
            <th>DATA DE INATIVAÇÃO</th>
            <th>DELETAR</th>
            <th>SITUAÇÂO</th>
          </tr>
        </thead>
        <tbody>

          @foreach($paises as $pais)
            @if($pais->ativoInativo == 0)
              <tr class="desativado">
                <td>{{$pais->pais}}</td>
                <td>{{$pais->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarPais', $pais->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.excluirPais', $pais->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn green" href="{{route('ativarPais', $pais->id)}}">ATIVAR</a>
                </td>
              </tr>
            @endif

            @if($pais->ativoInativo == 1)
              <tr>
                <td>{{$pais->pais}}</td>
                <td>{{$pais->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarPais', $pais->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.excluirPais', $pais->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn grey" href="{{route('desativarPais', $pais->id)}}">DESATIVAR</a>
                </td>
              </tr>
            @endif

          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarPais')}}">ADICIONAR CIDADES</a>
    </div>
</div>

@include('includes.footer')
