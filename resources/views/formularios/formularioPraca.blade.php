<div class="form-control-lg">
  <input type="text" name="praca" value="{{isset($praca->praca) ? $praca->praca : '' }}">
  <label>NOME PRAÇA</label>
</div>


<select class ="form-control-lg" name="ROTA_id">
  <option value="" selected>SELECIONE A ROTA</option>

  @foreach($rotas as $rota)
    <option value="{{$rota->id}}">{{isset($rota->descricaoRota) ? $rota->descricaoRota : ''}}</option>
  @endForeach
</select>
