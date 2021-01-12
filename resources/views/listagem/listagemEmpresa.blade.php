@include('includes.header')

<div class="container">

    <h3 ><center>LISTAGEM EMPRESA </center></h3>
    <br/><br/>

    <div class="row">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>NOME EMPRESA</th>
            <th> EDITAR </th>
            <th> DELETAR </th>
          </tr>
        </thead>
        <tbody>

          @foreach($empresas as $empresa)
            <tr>
              <td>{{$empresa->id}}</td>
              <td>{{$empresa->nome_empresa}}</td>
              <td>
                <a class="btn deep-orange" href="{{route('layout.editarEmpresa', $empresa->id)}}">Editar</a>
              </td>
              <td>
                <a class="btn red" href="{{route('layout.excluirEmpresa', $empresa->id)}}">Deletar</a>
              </td>
            </tr>

          @endForeach

        </tbody>
      </table>
    </div>

    <div class="row">
      <a class="btn green" href="{{route('layout.adicionarEmpresa')}}">ADICIONAR EMPRESA</a>
    </div>
</div>

@include('includes.footer')
