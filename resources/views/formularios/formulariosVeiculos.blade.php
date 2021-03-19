<div class="form-control-lg">
  <input type="number" required name="id" value="{{isset($veiculo->id) ? $veiculo->id : '' }}">
  <label>CODIGO VEICULO</label>
</div>

<div class="form-control-lg">
  <input type="text" required name="marca" value="{{isset($veiculo->marca) ? $veiculo->marca : '' }}">
  <label>MARCA</label>
</div>

<div class="form-control-lg">
  <input type="text" required name="km_rodado" value="{{isset($veiculo->km_rodado) ? $veiculo->km_rodado : '' }}">
  <label>KM RODADO</label>
</div>

<div class="form-control-lg">
  <input type="text" required name="ano" value="{{isset($veiculo->ano) ? $veiculo->ano : '' }}">
  <label>ANO</label>
</div>

<div class="form-control-lg">
  <input type="text" required name="modelo" value="{{isset($veiculo->modelo) ? $veiculo->modelo : '' }}">
  <label>MODELO</label>
</div>

<div class="form-control-lg">
  <input type="text" required name="chassi" value="{{isset($veiculo->chassi) ? $veiculo->chassi : '' }}">
  <label>CHASSI</label>
</div>

<div class="form-control-lg">
  <input type="text" required name="renavan" value="{{isset($veiculo->renavan) ? $veiculo->renavan : '' }}">
  <label>RENAVAN</label>
</div>

<div class="form-control-lg">
  <input type="text" required name="TIPO_VEICULOS_id" value="{{isset($veiculo->TIPO_VEICULOS_id) ? $veiculo->TIPO_VEICULOS_id : '' }}">
  <label>TIPO VEICULOS</label>
</div>

<select multiple name="idFilial[]">
   <option value="" disabled>ESCOLHA AS FILIAIS</option>
    @foreach($filiais as $filial)

      <option  value="{{isset($filial->id) ? $filial->id : ''}}">{{$filial->descricao}}</option>

    @endforeach

  </select>
