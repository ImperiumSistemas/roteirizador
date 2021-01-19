
<div class="input-field">
  <input type="number" name="id" value="{{isset($motorista->id) ? $motorista->id : '' }}">
  <label>ID</label>
</div>

<div class="input-field">
  <input type="text" name="cpf" value="{{isset($motorista->cpf) ? $motorista->cpf : '' }}">
  <label>CPF</label>
</div>

<div class="input-field">
  <input type="text" name="nome" value="{{isset($motorista->nome) ? $motorista->nome : '' }}">
  <label>NOME</label>
</div>

<div class="input-field">
  <input type="date" name="data_admissao" value="{{isset($motorista->data_admissao) ? $motorista->data_admissao : '' }}">
  <label>DATA DE ADMISSAO</label>
</div>

<div class="input-field">
  <input type="text" name="telefone" value="{{isset($motorista->telefone) ? $motorista->telefone : '' }}">
  <label>TELEFONE</label>
</div>

<div class="input-field">
  <input type="text" name="numero_cnh" value="{{isset($motorista->numero_cnh) ? $motorista->numero_cnh : '' }}">
  <label>NUMERO CNH</label>
</div>

<div class="input-field">
  <input type="date" name="data_validade_cnh" value="{{isset($motorista->data_validade_cnh) ? $motorista->data_validade_cnh : '' }}">
  <label>VALIDADE CNH</label>
</div>

<div class="input-field">
  <input type="text" name="tipo_contrato" value="{{isset($motorista->tipo_contrato) ? $motorista->tipo_contrato : '' }}">
  <label>TIPO DE CONTRATO</label>
</div>

<div class="input-field">
  <input type="text" name="PESSOAS_id" value="{{isset($motorista->PESSOAS_id) ? $motorista->PESSOAS_id : '' }}">
  <label>COD PESSOA</label>
</div>


  <select multiple name="idFilial[]">
     <option value="" disabled>NOME FILIAL</option>
      @foreach($filiais as $filial)
        <option value="{{isset($filial->id) ? $filial->id : ''}}">{{$filial->descricao}}</option>
      @endforeach
    </select>
