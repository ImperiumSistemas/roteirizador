<div class="input-field">
  <select name="PAIS_id">
    <option value="" selected>Selecione o País</option>
    @foreach($paises as $pais)
      <option value="{{isset($pais->id) ? $pais->id : ''}}">{{$pais->pais}}</option>
    @endforeach
  </select>
  <label>PAIS</label>
</div>

<div class="input-field">
  <select name="ESTADO_id">
    <option value="" selected>Selecione o Estado</option>
    @foreach($estados as $estado)
      <option value="{{isset($estado->id) ? $estado->id : ''}}">{{$estado->nomeEstado}}</option>
    @endforeach
  </select>
  <label>ESTADO</label>
</div>

<div class="input-field">
  <select name="CIDADE_codCidade">
    <option value="" selected>Selecione a Cidade</option>
    @foreach($cidades as $cidade)
      <option value="{{isset($cidade->id) ? $cidade->id : ''}}">{{$cidade->nomeCidade}}</option>
    @endforeach
  </select>
  <label>CIDADE</label>
</div>

<div class="input-field">
  <input type="text" name="rua" value="{{isset($endereco->rua) ? $endereco->rua : '' }}">
  <label>RUA</label>
</div>

<div class="input-field">
  <input type="text" name="bairro" value="{{isset($endereco->bairro) ? $endereco->bairro : '' }}">
  <label>BAIRRO</label>
</div>

<div class="input-field">
  <input type="number" name="numero" value="{{isset($endereco->numero) ? $endereco->numero : '' }}">
  <label>NUMERO</label>
</div>

<div class="input-field">
  <select name="PESSOAS_id">
    <option value="" selected>Selecione a Pessoa</option>
    @foreach($pessoas as $pessoa)
      <option value="{{$pessoa->id}}">{{$pessoa->nome}}</option>
    @endforeach
  </select>
</div>
