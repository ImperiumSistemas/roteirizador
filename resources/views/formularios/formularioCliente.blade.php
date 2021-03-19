<div class="form-control-lg">
<select name="idPessoa">
  <option value="" selected>SELECIONE UMA PESSOA</option>

  @foreach($pessoas as $pessoa)
    <option value="{{isset($pessoa->id) ? $pessoa->id : ''}}">{{$pessoa->nome}}</option>
  @endforeach

</select>
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
    <option value="" disabled>SELECIONE AS FILIAIS</option>

    @foreach($filiais as $filial)
      <option value="{{isset($filial->id) ? $filial->id : ''}}">{{$filial->cnpj}}</option>
    @endforeach
  </select>
</div>
