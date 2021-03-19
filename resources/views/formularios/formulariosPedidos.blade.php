<div class="input-field">
  <input type="text" name="codPedido" value="{{isset($pedido->codPedido) ? $pedido->codPedido : '' }}">
  <label>CODIGO PEDIDO</label>
</div>

<div class="input-field">
  <input type="text" name="codCliente" value="{{isset($pedido->codCliente) ? $pedido->codCliente : '' }}">
  <label>CODIGO CLIENTE</label>
</div>

<div class="input-field">
  <input type="text" name="codFilial" value="{{isset($pedido->codFilial) ? $pedido->codFilial : '' }}">
  <label>CODIGO FILIAL</label>
</div>

<div class="input-field">
  <input type="text" name="codPraca" value="{{isset($pedido->codPraca) ? $pedido->codPraca : '' }}">
  <label>CODIGO PRACA</label>
</div>

<div class="input-field">
  <input type="text" name="nomePedido" value="{{isset($pedido->nomePedido) ? $pedido->nomePedido : '' }}">
  <label>NOME PEDIDO</label>
</div>

<div class="input-field">
  <input type="text" name="peso" value="{{isset($pedido->peso) ? $pedido->peso : '' }}">
  <label>PESO</label>
</div>

<div class="input-field">
  <input type="text" name="cubagem" value="{{isset($pedido->cubagem) ? $pedido->cubagem : '' }}">
  <label>CUBAGEM</label>
</div>

<div class="input-field">
  <input type="text" name="valorPedido" value="{{isset($pedido->valorPedido) ? $pedido->valorPedido : '' }}">
  <label>VALOR PEDIDO</label>
</div>

<div class="input-field">
  <input type="text" name="cargaErp" value="{{isset($pedido->cargaErp) ? $pedido->cargaErp : '' }}">
  <label>CARGA</label>
</div>

<div class="input-field">
  <input type="text" name="dataPedido" value="{{isset($pedido->dataPedido) ? $pedido->dataPedido : '' }}">
  <label>DATA PEDIDO</label>
</div>

<div class="input-field">
  <input type="text" name="podeFormarCarga" value="{{isset($pedido->podeFormarCarga) ? $pedido->podeFormarCarga : '' }}">
  <label>FORMAR CARGA</label>
</div>
