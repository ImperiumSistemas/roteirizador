<div class="input-field">
  <input type="text" name="nome" value="{{isset($pessoa->nome) ? $pessoa->nome : '' }}">
  <label>NOME DA PESSOA</label>
</div>

<div class="input-field">
  <input type="text" name="numero_telefone" value="{{isset($pessoa->numero_telefone) ? $pessoa->numero_telefone : '' }}">
  <label>NÚMERO DE TELEFONE</label>
</div>

<div class="input-field">
  <form>
    <select name="escolha" method='post'>
      <option selected>ESCOLHA UM CADASTRO</option>
      <option value="juridica">JURIDICA</option>
      <option value="fisica">FISICA</option>
    </select>

    <input type="submit" value="ESCOLHER">
  </form>
</div>

$escolha = 1;

@if($escolha == 1){

  echo('teste');

@endif

<div class="input-field">
  <input type="number" name="cpf" value="{{isset($fisica->cpf) ? $fisica->cpf : '' }}">
  <label>CPF</label>
</div>

<div class="input-field">
  <input type="text" name="rg" value="{{isset($fisica->rg) ? $fisica->rg : '' }}">
  <label>RG</label>
</div>

<div class="input-field">
  <input type="text" name="cnpj" value="{{isset($juridica->cnpj) ? $juridica->cnpj : '' }}">
  <label>CNPJ</label>
</div>

<div class="input-field">
  <input type="text" name="razao_social" value="{{isset($juridica->razao_social) ? $juridica->razao_social : '' }}">
  <label>RAZÃO SOCIAL</label>
</div>
