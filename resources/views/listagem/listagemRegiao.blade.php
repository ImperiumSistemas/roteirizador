@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM DE REGIÂO </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>NOME REGIÃO</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
            <th>SITUAÇÂO</th>
          </tr>
        </thead>
        <tbody>

          @foreach($listagemRegiaos as $listagemRegiao)

            @if($listagemRegiao->ativoInativo == 0)
              <tr>
                <td class="desativado">{{$listagemRegiao->nomeRegiao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarRegiao', $listagemRegiao->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.deletarRegiao', $listagemRegiao->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn green" href="{{route('ativarRegiao', $listagemRegiao->id)}}">Ativar</a>
                </td>
              </tr>
            @endif

            @if($listagemRegiao->ativoInativo == 1)
              <tr>
                <td>{{$listagemRegiao->nomeRegiao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarRegiao', $listagemRegiao->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.deletarRegiao', $listagemRegiao->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn grey" href="{{route('desativarRegiao', $listagemRegiao->id)}}">DESATIVAR</a>
                </td>
              </tr>
            @endif
          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarRegiao')}}">ADICIONAR REGIÔES</a>
    </div>
</div>

@include('includes.footer')
