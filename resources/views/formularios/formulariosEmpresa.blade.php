<div class="input-field">
  <input type="number" name="id" value="{{isset($empresa->id) ? $empresa->id : '' }}">
  <label>ID</label>
</div>

<div class="input-field">
  <input type="text" name="nome_empresa" value="{{isset($empresa->nome_empresa) ? $empresa->nome_empresa : '' }}">
  <label>NOME EMPRESA</label>
</div>
