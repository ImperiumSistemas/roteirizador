<div class="form-control-lg">
  <input type="number" name="numeroPedagio" value="{{isset($rota->numeroPedagio) ? $rota->numeroPedagio : '' }}">
  <label>NUMERO PEDÁGIO</label>
</div>

<div class="form-control-lg">
  <input type="number" name="gastoPedagio" value="{{isset($rota->gastoPedagio) ? $rota->gastoPedagio : '' }}">
  <label>GASTO PEDÁGIO</label>
</div>

<div class="form-control-lg">
  <input type="text" name="descricaoRota" value="{{isset($rota->descricaoRota) ? $rota->descricaoRota : '' }}">
  <label>DESCRIÇÃO ROTA</label>
</div>

<label>Escolha uma região</label>
<div class="form-control-lg">

  <select name="REGIAO_id">
    <option value=""></option>
    @foreach($regioes as $regiao)
      <option value="{{isset($regiao->id) ? $regiao->id : ''}}">{{$regiao->nomeRegiao}}</option>
    @endforeach

  </select>
</div>
