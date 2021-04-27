<div class="form-control-lg">
  <input type="text" name="nome" value="{{isset($pessoa->nome) ? $pessoa->nome : '' }}">
  <label>NOME</label>
</div>

<div class="form-control-lg">
  <input type="text" minlength ="14" name="numero_telefone" data-mask="(00)00000-0000" placeholder="(00)0000-0000" value="{{isset($pessoa->numero_telefone) ? $pessoa->numero_telefone : '' }}">
  <label>NÚMERO DE TELEFONE</label>
</div>

<div class="form-control-lg">
  <input type="text" minlength ="17" name="cnpj" data-mask="00.000.000/000-00" placeholder="00.000.000/000-00" value="{{isset($juridica->cnpj) ? $juridica->cnpj : '' }}">
  <label>CNPJ</label>
</div>

<div class="form-control-lg">
  <input type="text" name="razao_social" value="{{isset($juridica->razao_social) ? $juridica->razao_social : '' }}">
  <label>RAZAO SOCIAL</label>
</div>

<label>ENDEREÇO</label>

<div class="form-control-lg">
  <input type="text" name="rua" value="{{isset($endereco->rua) ? $endereco->rua : '' }}">
  <label>RUA</label>
</div>

<div class="form-control-lg">
  <input type="number" name="numero" value="{{isset($endereco->numero) ? $endereco->numero : '' }}">
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
  <input type="text" minlength ="9" name="cep" data-mask="00000-000" placeholder="00000-000" value="{{isset($endereco->cep) ? $endereco->cep : '' }}">
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
