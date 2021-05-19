<div class="form-control-lg">
  <input type="text" name="codVendedor" value="{{isset($vendedor->codVendedor) ? $vendedor->codVendedor : '' }}">
  <label>CÓDIGO VENDEDOR</label>
</div>

<div class="form-control-lg">
  <input type="text" name="nome" value="{{isset($vendedor->nomeVendedor) ? $vendedor->nomeVendedor : '' }}">
  <label>NOME</label>
</div>

<div class="form-control-lg">
  <input type="text" minlength ="14" name="numero_telefone" data-mask="(00)00000-0000" placeholder="(00)00000-0000" value="{{isset($vendedor->telefoneVendedor) ? $vendedor->telefoneVendedor : '' }}">
  <label>NÚMERO DE TELEFONE</label>
</div>

<div class="form-control-lg">
  <input type="text" minlength ="17" name="cnpj" data-mask="00.000.000/000-00" placeholder="00.000.000/000-00" value="{{isset($vendedor->cnpj) ? $vendedor->cnpj : '' }}">
  <label>CNPJ</label>
</div>

<div class="form-control-lg">
  <input type="text" name="razao_social" value="{{isset($vendedor->razao_social) ? $vendedor->razao_social : '' }}">
  <label>RAZAO SOCIAL</label>
</div>

<label>ENDEREÇO</label>

<div class="form-control-lg">
  <input type="text" name="rua" value="{{isset($vendedor->rua) ? $vendedor->rua : '' }}">
  <label>RUA</label>
</div>

<div class="form-control-lg">
  <input type="number" name="numero" value="{{isset($vendedor->numero) ? $vendedor->numero : '' }}">
  <label>NUMERO</label>
</div>

<div class="form-control-lg">
  <input type="text" name="bairro" value="{{isset($vendedor->bairro) ? $vendedor->bairro : '' }}">
  <label>BAIRRO</label>
</div>

<div class="form-control-lg">
  <input type="text" name="cidade" value="{{isset($vendedor->cidade) ? $vendedor->cidade : '' }}">
  <label>CIDADE</label>
</div>

<div class="form-control-lg">
  <input type="text" name="estado" value="{{isset($vendedor->estado) ? $vendedor->estado : '' }}">
  <label>ESTADO</label>
</div>

<div class="form-control-lg">
  <input type="text" name="pais" value="{{isset($vendedor->pais) ? $vendedor->pais : '' }}">
  <label>PAIS</label>
</div>

<div class="form-control-lg">
  <input type="text" minlength = "9" name="cep" data-mask="00000-000" placeholder="00000-000" value="{{isset($vendedor->cep) ? $vendedor->cep : '' }}">
  <label>CEP</label>
</div>
