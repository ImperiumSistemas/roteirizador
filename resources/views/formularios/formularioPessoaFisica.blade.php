<div class="input-field">
  <input type="text" name="nome" value="{{isset($pessoa->nome) ? $pessoa->nome : '' }}">
  <label>NOME</label>
</div>

<div class="input-field">
  <input type="text" name="numero_telefone" value="{{isset($pessoa->numero_telefone) ? $pessoa->numero_telefone : '' }}">
  <label>NÚMERO DE TELEFONE</label>
</div>

<div class="input-field">
  <input type="text" name="cpf" value="{{isset($fisica->cpf) ? $fisica->cpf : '' }}">
  <label>CPF</label>
</div>

<div class="input-field">
  <input type="text" name="rg" value="{{isset($fisica->rg) ? $fisica->rg : '' }}">
  <label>RG</label>
</div>
