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
  <input type="text" minlength = "4" required name="ano" data-mask="0000" placeholder="0000" value="{{isset($veiculo->ano) ? $veiculo->ano : '' }}">
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
  <select name="TIPO_VEICULOS_id">
    <option value="">Tipo de Veiculo</option>
    @foreach($tipoVeiculos as $tipoVeiculo)
      <option value="{{$tipoVeiculo->id}}">{{$tipoVeiculo->descricao}}</option>
    @endForeach
  </select>
</div>

<select multiple name="idFilial[]">
   <option value="" disabled>ESCOLHA AS FILIAIS</option>
    @foreach($filiais as $filial)

      <option  value="{{isset($filial->id) ? $filial->id : ''}}">{{$filial->descricao}}</option>

    @endforeach

  </select>
