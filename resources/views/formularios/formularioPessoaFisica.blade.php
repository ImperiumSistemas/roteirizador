<div class="form-control-lg">
  <input type="text" name="nome" value="{{isset($pessoa->nome) ? $pessoa->nome : '' }}">
  <label>NOME</label>
</div>

<div class="form-control-lg">
  <input type="text" name="numero_telefone" value="{{isset($pessoa->numero_telefone) ? $pessoa->numero_telefone : '' }}">
  <label>NÚMERO DE TELEFONE</label>
</div>

<div class="form-control-lg">
  <input type="text" name="cpf" value="{{isset($fisica->cpf) ? $fisica->cpf : '' }}">
  <label>CPF</label>
</div>

<div class="form-control-lg">
  <input type="text" name="rg" value="{{isset($fisica->rg) ? $fisica->rg : '' }}">
  <label>RG</label>
</div>


<label>ENDEREÇO</label>

<div class="form-control-lg">
  <input type="text" name="rua" value="{{isset($endereco->rua) ? $endereco->rua : '' }}">
  <label>RUA</label>
</div>

<div class="form-control-lg">
  <input type="text" name="numero" value="{{isset($endereco->numero) ? $endereco->numero : '' }}">
  <label>NUMERO</label>
</div>

<div class="form-control-lg">
  <input type="text" name="bairro" value="{{isset($endereco->bairro) ? $endereco->bairro : '' }}">
  <label>BAIRRO</label>
</div>

<div class="form-control-lg">
  <input type="text" name="cidade" value="{{isset($endereco->cidade) ? $endereco->cidade : '' }}">
  <label>CIDADE</label>
</div>

<div class="form-control-lg">
  <input type="text" name="estado" value="{{isset($endereco->estado) ? $endereco->estado : '' }}">
  <label>ESTADO</label>
</div>

<div class="form-control-lg">
  <input type="text" name="pais" value="{{isset($endereco->pais) ? $endereco->pais : '' }}">
  <label>PAIS</label>
</div>

<div class="form-control-lg">
  <input type="text" name="cep" value="{{isset($endereco->cep) ? $endereco->cep : '' }}">
  <label>CEP</label>
</div>

<div class="form-control-lg">
  <select name="salvarEm">
    <option value="" selected>SALVAR EM</option>
    <option value="">SALVAR APENAS PESSOA</option>
    <option value="1">SALVAR PESSOA COMO MOTORISTA</option>
    <option value="2">SALVAR PESSOA COMO CLIENTE</option>
    <option></option>
  </select>
</div>
