<div class="input-field">
  <input type="number" name="id" value="{{isset($praca->id) ? $praca->id : '' }}">
  <label>ID</label>
</div>

<div class="input-field">
  <input type="text" name="praca" value="{{isset($praca->praca) ? $praca->praca : '' }}">
  <label>NOME PRAÇA</label>
</div>


<select name="ROTA_id">
  <option value="" >SELECIONE A ROTA</option>

  @foreach($rotas as $rota)
    <option value="{{$rota->id}}">{{$rota->descricaoRota}}</option>
  @endForeach
</select>
