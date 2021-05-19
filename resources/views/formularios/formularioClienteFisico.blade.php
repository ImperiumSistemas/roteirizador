<div class="form-control-lg">
  <input type="number" name="codCliente" value="{{isset($clientes->codCliente) ? $clientes->codCliente : '' }}">
  <label>CÓDIGO CLIENTE</label>
</div>

<div class="form-control-lg">
  <input type="text" name="nome" value="{{isset($clientes->nomePessoa) ? $clientes->nomePessoa : '' }}">
  <label>NOME</label>
</div>

<div class="form-control-lg">
  <input type="text" minlength ="14" name="numero_telefone" data-mask="(00)00000-0000" placeholder="(00)00000-0000" value="{{isset($clientes->numero) ? $clientes->numero : '' }}">
  <label>NÚMERO DE TELEFONE</label>
</div>

<div class="form-control-lg">
  <input type="text" minlength="14" name="cpf" data-mask="000.000.000-00" placeholder="000.000.000-00" value="{{isset($clientes->cpf) ? $clientes->cpf : '' }}">
  <label>CPF</label>
</div>

<div class="form-control-lg">
  <input type="text" minlength="8" name="rg" data-mask="00000000" placeholder="00000000" value="{{isset($clientes->rg) ? $clientes->rg : '' }}">
  <label>RG</label>
</div>

<div class="form-control-lg">
  <input type="text" name="inscricaoEstadual" value="{{isset($clientes->inscricaoEstadual) ? $clientes->inscricaoEstadual : '' }}">
  <label>INSCRIÇÃO ESTADUAL</label>
</div>

<div class="form-control-lg">
  <input type="date"  name="dataCadastro" value="{{isset($clientes->dataCadastro) ? $clientes->dataCadastro : '' }}">
  <label>DATA CADASTRO</label>
</div>

<label>ENDEREÇO</label>

<div class="form-control-lg">
  <input type="text" name="rua" value="{{isset($clientes->rua) ? $clientes->rua : '' }}">
  <label>RUA</label>
</div>

<div class="form-control-lg">
  <input type="number" name="numero" value="{{isset($clientes->numeroEndereco) ? $clientes->numeroEndereco : '' }}">
  <label>NUMERO</label>
</div>

<div class="form-control-lg">
  <input type="text" name="bairro" value="{{isset($clientes->bairro) ? $clientes->bairro : '' }}">
  <label>BAIRRO</label>
</div>

<div class="form-control-lg">
  <input type="text" name="cidade" value="{{isset($clientes->cidade) ? $clientes->cidade : '' }}">
  <label>CIDADE</label>
</div>

<div class="form-control-lg">
  <input type="text" name="estado" value="{{isset($clientes->estado) ? $clientes->estado : '' }}">
  <label>ESTADO</label>
</div>

<div class="form-control-lg">
  <input type="text" name="pais" value="{{isset($clientes->pais) ? $clientes->pais : '' }}">
  <label>PAIS</label>
</div>

<div class="form-control-lg">
  <input type="text" minlength = "9" name="cep" data-mask="00000-000" placeholder="00000-000" value="{{isset($clientes->cep) ? $clientes->cep : '' }}">
  <label>CEP</label>
</div>

<div class="form-control-lg">
  <select name="idPraca">
    <option value="" selected> SELECIONE UMA PRAÇA </option>

    @foreach($pracas as $praca)
      <option value="{{isset($praca->id) ? $praca->id : ''}}">{{$praca->praca}}</option>
    @endforeach
  </select>
</div>

<div class="form-control-lg">
  <select multiple name="idFilial[]">

    <option value="{{isset($filiais->id) ? $filiais->id : ''}}" disabled>SELECIONE AS FILIAIS</option>

    @foreach($filiais as $filial)
      <option value="{{isset($filial->id) ? $filial->id : ''}}">{{$filial->descricao}}</option>
    @endforeach
  </select>
</div>
