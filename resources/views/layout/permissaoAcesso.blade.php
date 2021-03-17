@include('includes.header')

<div class="container">

    <h3 ><center>LISTA DE PERMISSÃO </center></h3>
    <br/><br/>

    <form>
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

      <div class="col s5">


          @foreach($descricaoPermissao as $dp)
            <label>
              <input type="checkbox" name="descricao" value="{{isset($dp->id) ? $dp->id : '' }}"/>
              <span>{{$dp->descricao}}</span>
              <p>
            </label>
          @endforeach

        </p>

      </div>
    </div>
  </form>
</div>

@include('includes.footer')
