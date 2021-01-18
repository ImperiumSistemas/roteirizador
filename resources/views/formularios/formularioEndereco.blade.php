<div class="input-field">
  <input type="text" name="nomeCidade" value="{{isset($cidade->nomeCidade) ? $cidade->nomeCidade : '' }}">
  <label>Nome da Cidade</label>
</div>

<div class="input-field">
  <input type="text" name="nomeBairro" value="{{isset($bairro->nomeBairro) ? $bairro->nomeBairro : '' }}">
  <label>Nome do Bairro</label>
</div>

<div class="input-field">
  <input type="number" name="numero" value="{{isset($endereco->numero) ? $endereco->numero : '' }}">
  <label>Numero</label>
</div>

<div class="input-field">
  <input type="text" name="pais" value="{{isset($pais->pais) ? $pais->pais : '' }}">
  <label>Nome do PAIS</label>
</div>
