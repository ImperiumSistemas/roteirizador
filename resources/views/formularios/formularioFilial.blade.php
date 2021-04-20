<div class="form-control-lg">
  <input type="text" name="cnpj"  data-mask="00.000.000/000-00" placeholder="00.000.000/000-00" value="{{isset($filiais->cnpj) ? $filiais->cnpj : '' }}">
  <label>CNPJ</label>

  <input type="text" name="descricao" value="{{isset($filiais->descricao) ? $filiais->descricao : '' }}">
  <label>DESCRIÇÃO</label>
</div>

<div class="form-control-lg">
  <input type="text" name="rua" value="{{isset($filiais->rua) ? $filiais->rua : '' }}">
  <label>RUA</label>

  <input type="number" name="numero" value="{{isset($filiais->numero) ? $filiais->numero : '' }}">
  <label>NUMERO</label>
</div>

<div class="form-control-lg">
  <input type="text" name="bairro" value="{{isset($filiais->bairro) ? $filiais->bairro : '' }}">
  <label>BAIRRO</label>

  <input type="text" name="cidade" value="{{isset($filiais->cidade) ? $filiais->cidade : '' }}">
  <label>CIDADE</label>
</div>



<div class="form-control-lg">
  <input type="text" name="estado" value="{{isset($filiais->estado) ? $filiais->estado : '' }}">
  <label>ESTADO</label>

  <input type="text" name="pais" value="{{isset($filiais->pais) ? $filiais->pais : '' }}">
  <label>PAIS</label>
</div>

<div class="form-control-lg">
  <input type="text" data-mask="00000-000" placeholder="00000-000" name="cep" value="{{isset($filiais->cep) ? $filiais->cep : '' }}">
  <label>CEP</label>
</div>

<div class="form-control-lg">
  <input type="text" name="telefone" data-mask="(00)00000-0000" placeholder="(00)0000-0000" value="{{isset($filiais->telefone) ? $filiais->telefone : '' }}">
  <label>TELEFONE</label>
</div>


<div class="form-control-lg">
  <select name="EMPRESA_id">
    <option value="" >Escolha uma Empresa</option>
    @foreach($empresas as $empresa)
      <option value="{{isset($empresa->id) ? $empresa->id : ''}}">{{isset($empresa->nome_empresa) ? $empresa->nome_empresa : ''}}</option>
    @endforeach
  </select>
</div>
