<div class="input-field">
  <input type="number" name="id" value="{{isset($motorista->id) ? $motorista->id : '' }}">
  <label>REGISTRO MOTORISTA</label>
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


  <select multiple name="idFilial[]">
     <option value="" disabled>NOME FILIAL</option>
      @foreach($filiais as $filial)
        <option value="{{$filial->id}}">{{$filial->descricao}}</option>
      @endforeach
    </select>
