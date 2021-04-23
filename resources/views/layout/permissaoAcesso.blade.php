@include('includes.header')

<div class="container">

    <h3 ><center>LISTA DE PERMISSÃO </center></h3>
    <br/><br/>


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
                <td>{{$papel->id}}</td>
                <td>{{$papel->nome}}</td>
              </tr>

              <tr>
                <td><br/><br><b>PERMISSÕES</b></td>
              </tr>
                <table>
                  @foreach($permissoesPapel as $permissaoPapel)
                    <tr>
                      <td><br/>{{$permissaoPapel->nome}}</td>
                      <td>
                        <form action="{{route('deletaPermissao', [$permissaoPapel->idPapel, $permissaoPapel->idPermissao])}}" method="post">
                          {{ method_field('DELETE') }}
        									{{ csrf_field() }}

                          <br/><button>Deletar</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </table>
            </tbody>
          </table>
        </div>

      <div class="col s4">
    <form class="" action="{{route('layout.salvarPermissao', $papel->id)}}" method="post">
        {{ csrf_field() }}
        <!--<select name="idPermissao[]">
          <option value="">SELECIONE A PERMISSÃO</option>
          @foreach($permissoes as $permissao)
            <option value="{{$permissao->id}}">{{$permissao->nome}}</option>
          @endforeach
        </select> -->

          @foreach($permissoes as $permissao)
            <label>
              <p>
                <input type="checkbox" name="idPermissao[]" value="{{isset($permissao->id) ? $permissao->id : '' }}"/>
                <span>{{$permissao->nome}}</span>
            </label>
          @endforeach
      </div>

      <div class="col s1">
        <button class="btn btn-danger">SALVAR</button>
      </div>
    </div>

  </form>
</div>

@include('includes.footer')
