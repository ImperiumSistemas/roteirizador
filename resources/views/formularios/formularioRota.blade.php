<div class="input-field">
  <input type="number" name="id" value="{{isset($rota->id) ? $rota->id : '' }}">
  <label>ID</label>
</div>

<div class="input-field">
  <input type="number" name="numeroPedagio" value="{{isset($rota->numeroPedagio) ? $rota->numeroPedagio : '' }}">
  <label>NUMERO PEDÁGIO</label>
</div>

<div class="input-field">
  <input type="number" name="gastoPedagio" value="{{isset($rota->gastoPedagio) ? $rota->gastoPedagio : '' }}">
  <label>GASTO PEDÁGIO</label>
</div>

<div class="input-field">
  <input type="text" name="descricaoRota" value="{{isset($rota->descricaoRota) ? $rota->descricaoRota : '' }}">
  <label>DESCRIÇÃO ROTA</label>
</div>

<div class="input-field">
  <select name="REGIAO_id">
    <option value="">Escolha uma região</option>

    @foreach($regioes as $regiao)
      <option value="{{isset($regiao->id) ? $regiao->id : ''}}">{{$regiao->nomeRegiao}}</option>
    @endforeach

  </select>
</div>
