<div class="input-field">
  <input type="text" name="nome" value="{{isset($pessoa->nome) ? $pessoa->nome : '' }}">
  <label>NOME</label>
</div>

<div class="input-field">
  <input type="text" name="numero_telefone" value="{{isset($pessoa->numero_telefone) ? $pessoa->numero_telefone : '' }}">
  <label>NÚMERO DE TELEFONE</label>
</div>

<div class="input-field">
  <input type="text" name="cnpj" value="{{isset($juridica->cnpj) ? $juridica->cnpj : '' }}">
  <label>CNPJ</label>
</div>

<div class="input-field">
  <input type="text" name="razao_social" value="{{isset($juridica->razao_social) ? $juridica->razao_social : '' }}">
  <label>RAZAO SOCIAL</label>
</div>
