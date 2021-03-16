<div class="input-field">
  <input type="number" name="codProduto" value="{{isset($produto->codProduto) ? $produto->codProduto : '' }}">
  <label>COD PRODUTO</label>
</div>

<div class="input-field">
  <input type="number" name="codPedido" value="{{isset($pedido->codPedido) ? $pedido->codPedido : '' }}">
  <label>COD PEDIDOS</label>
</div>

<div class="input-field">
  <input type="text" name="descricao" value="{{isset($produto->descricao) ? $produto->descricao : '' }}">
  <label>DESCRIÇÃO</label>
</div>

<div class="input-field">
  <input type="text" name="cubagem" value="{{isset($produto->cubagem) ? $produto->cubagem : '' }}">
  <label>CUBAGEM</label>
</div>

<div class="input-field">
  <input type="text" name="peso" value="{{isset($produto->peso) ? $produto->peso : '' }}">
  <label>PESO</label>
</div>
