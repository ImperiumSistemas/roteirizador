@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM DE CIDADES </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>NOME CIDADE</th>
            <th>DATA INATIVAÇÃO</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
            <th>SITUAÇÃO</th>
          </tr>
        </thead>
        <tbody>

          @foreach($cidade as $cidades)
            @if($cidades->ativoInativo == 0)
              <tr class="desativado">
                <td>{{$cidades->nomeCidade}}</td>
                <td>{{$cidades->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarCidade', $cidades->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.excluirCidade', $cidades->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn green" href="{{route('ativarCidade', $cidades->id)}}">ATIVAR</a>
                </td>
              </tr>
            @endif

            @if($cidades->ativoInativo == 1)
              <tr>
                <td>{{$cidades->nomeCidade}}</td>
                <td>{{$cidades->dataInativacao}}</td>
                <td>
                  <a class="btn deep-orange" href="{{route('layout.editarCidade', $cidades->id)}}">Editar</a>
                </td>
                <td>
                  <a class="btn red" href="{{route('layout.excluirCidade', $cidades->id)}}">Deletar</a>
                </td>
                <td>
                  <a class="btn grey" href="{{route('desativarCidade', $cidades->id)}}">DESATIVAR</a>
                </td>
              </tr>
            @endif
          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarCidade')}}">ADICIONAR CIDADES</a>
    </div>
</div>

@include('includes.footer')
