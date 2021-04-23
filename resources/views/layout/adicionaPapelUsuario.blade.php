@include('includes.header')

<div class="row">
  <h2><center> TELA CADASTRO CADASTRO DE PAPEL AO USUÁRIO</center></h2>
</div>

<div class="container">
  <div class="row">
    <div class="col s6">
      <h2>Usuário: {{$usuario->name}}</h2> &nbsp &nbsp &nbsp &nbsp &nbsp

      <form method="post" action="{{route('adicionaPapel', $usuario->id)}}">
        {{ csrf_field() }}

        <select name="papel_id">
          <option value="">
            SELECIONE O PAPEL
          </option>
          @foreach($papeis as $papel)
            <option value="{{$papel->id}}">
              {{$papel->nome}}
            </option>
          <@endforeach>
        </select>

        <button class="btn deep-orange">SALVAR</button>

      </form>
    </div>

    <div class="col s6">
        <h2>PAPEIS ATRIBUIDOS</h2>
        <table>
          @foreach($permissaoPapel as $permissaoPapel)
            <tr>
              <td>{{$permissaoPapel->nomePapel}}</td>
              <td>
                <form action="{{route('deletaPapel', [$permissaoPapel->idUsuario, $permissaoPapel->idPapel])}}" method="post">
                  {{ method_field('DELETE') }}
									{{ csrf_field() }}

                  <button>Deletar</button>
                </form>
              </td>
            </tr>
          @endforeach
      </table>
    </div>
  </div>

</div>


@include('includes.footer')
