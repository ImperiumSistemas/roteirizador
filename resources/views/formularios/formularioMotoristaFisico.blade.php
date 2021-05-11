<div class="form-control-lg">
  <input type="number" name="codMotorista" value="{{isset($motorista->codMotorista) ? $motorista->codMotorista : '' }}">
  <label>REGISTRO MOTORISTA</label>
</div>

<div class="form-control-lg">
  <input type="text" name="nome" value="{{isset($pessoa->nome) ? $pessoa->nome : '' }}">
  <label>NOME</label>
</div>

<div class="form-control-lg">
  <input type="text" minlength ="14" name="numero_telefone" data-mask="(00)00000-0000" placeholder="(00)00000-0000" value="{{isset($pessoa->numero_telefone) ? $pessoa->numero_telefone : '' }}">
  <label>NÚMERO DE TELEFONE</label>
</div>

<div class="form-control-lg">
  <input type="text" minlength="14" name="cpf" data-mask="000.000.000-00" placeholder="000.000.000-00" value="{{isset($fisica->cpf) ? $fisica->cpf : '' }}">
  <label>CPF</label>
</div>

<div class="form-control-lg">
  <input type="text" minlength="8" name="rg" data-mask="00000000" placeholder="00000000" value="{{isset($fisica->rg) ? $fisica->rg : '' }}">
  <label>RG</label>
</div>

<div class="form-control-lg">
  <input type="date" name="data_admissao" value="{{isset($motorista->data_admissao) ? $motorista->data_admissao : '' }}">
  <label>DATA DE ADMISSAO</label>
</div>

<div class="form-control-lg">
  <input type="text" minlength="11" name="numero_cnh" data-mask="00000000000" placeholder="00000000000" value="{{isset($motorista->numero_cnh) ? $motorista->numero_cnh : '' }}">
  <label>NUMERO CNH</label>
</div>

<div class="form-control-lg">
  <input type="date" name="data_validade_cnh" value="{{isset($motorista->data_validade_cnh) ? $motorista->data_validade_cnh : '' }}">
  <label>VALIDADE CNH</label>
</div>

<div class="form-control-lg">
  <input type="text" name="tipo_contrato" value="{{isset($motorista->tipo_contrato) ? $motorista->tipo_contrato : '' }}">
  <label>TIPO DE CONTRATO</label>
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
  <input type="text" minlength = "9" name="cep" data-mask="00000-000" placeholder="00000-000" value="{{isset($endereco->cep) ? $endereco->cep : '' }}">
  <label>CEP</label>
</div>

  <select class = "form-control-lg" multiple name="idFilial[]">
     <option value="" disabled>NOME FILIAL</option>
      @foreach($filiais as $filial)
        <option value="{{$filial->id}}">{{$filial->descricao}}</option>
      @endforeach
    </select>
