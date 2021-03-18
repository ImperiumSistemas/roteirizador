@include('includes.header')

<div class="container">

    <h3 ><center>LISTA DE PERMISSÃO </center></h3>
    <br/><br/>

    <form class="" action="{{route('layout.salvarPermissao', $descricaoNivelAcesso->id)}}" method="post">
      {{ csrf_field() }}

      <div class="row">
        <div class="col s3">
        </div>
        <div class="col s4">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>DESCRIÇÃO</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$descricaoNivelAcesso->id}}</td>
                <td>{{$descricaoNivelAcesso->descricao}}</td>
              </tr>
            </tbody>
          </table>
        </div>

      <div class="col s4">


          @foreach($descricaoPermissao as $dp)
            <label>
              <input type="checkbox" name="idPermissao[]" value="{{isset($dp->id) ? $dp->id : '' }}"/>
              <span>{{$dp->descricao}}</span>
              <p>
            </label>
          @endforeach
      </div>

      <div class="col s1">
        <button class="btn deep-orange">SALVAR</button>
      </div>
    </div>

  </form>
</div>

@include('includes.footer')
