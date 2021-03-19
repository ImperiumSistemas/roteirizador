<div class="form-control-lg">
  <input type="text" name="nome" value="{{isset($pessoa->nome) ? $pessoa->nome : '' }}">
  <label>NOME</label>
</div>

<div class="form-control-lg">
  <input type="text" name="numero_telefone" value="{{isset($pessoa->numero_telefone) ? $pessoa->numero_telefone : '' }}">
  <label>NÚMERO DE TELEFONE</label>
</div>

<div class="form-control-lg">
  <input type="text" name="cnpj" value="{{isset($juridica->cnpj) ? $juridica->cnpj : '' }}">
  <label>CNPJ</label>
</div>

<div class="form-control-lg">
  <input type="text" name="razao_social" value="{{isset($juridica->razao_social) ? $juridica->razao_social : '' }}">
  <label>RAZAO SOCIAL</label>
</div>

<label>ENDEREÇO</label>

<div class="form-control-lg">
  <input type="text" name="rua" value="{{isset($endereco->rua) ? $endereco->rua : '' }}">
  <label>Rua</label>
</div>

<div class="form-control-lg">
  <input type="text" name="numero" value="{{isset($endereco->numero) ? $endereco->numero : '' }}">
  <label>numero</label>
</div>

<div class="form-control-lg">
  <input type="text" name="bairro" value="{{isset($endereco->bairro) ? $endereco->bairro : '' }}">
  <label>Bairro</label>
</div>

<div class="form-control-lg">
  <input type="text" name="cidade" value="{{isset($endereco->cidade) ? $endereco->cidade : '' }}">
  <label>Cidade</label>
</div>

<div class="form-control-lg">
  <input type="text" name="estado" value="{{isset($endereco->estado) ? $endereco->estado : '' }}">
  <label>Estado</label>
</div>

<div class="form-control-lg">
  <input type="text" name="pais" value="{{isset($endereco->pais) ? $endereco->pais : '' }}">
  <label>Pais</label>
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
