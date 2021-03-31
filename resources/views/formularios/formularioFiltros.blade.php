

<div class="form-control">
    <label>Filial Logistica</label>
    <select name="filial_id">
        <option value="0"></option>
        @foreach($filiais as $filial)
            <option value="{{isset($filial->id) ? $filial->id : ''}}">{{isset($filial->descricao) ? $filial->descricao : ''}}</option>
        @endforeach
    </select>


</div>
<div><span class="text" style="color:whitesmoke">.....</span></div>
<div  class="form-control">
    <label>Modelo de Formação de Carga:</label>
    <select name="vehiclesRequired">
        <!--<option value=0>NÃO</option>
        <option value=1>SIM</option>-->
        @foreach($modelosAgrupamentos as $modeloAgrupamento)
            <option value="{{isset($modeloAgrupamento->id) ? $modeloAgrupamento->id : ''}}">{{isset($modeloAgrupamento->descricao) ? $modeloAgrupamento->descricao : ''}}</option>
        @endforeach
    </select>
</div>
<div><span class="text" style="color:whitesmoke">.....</span></div>
<div><span class="text" style="color:whitesmoke">.....</span></div>
<div >
<label>Filial de Faturamento:</label>
    <select MULTIPLE name="filialFaturamento_id[]">
    @foreach($filiais as $filial)
        <option selected value="{{isset($filial->id) ? $filial->id : ''}}">{{isset($filial->descricao) ? $filial->descricao : ''}}</option>
    @endforeach
</select>
</div><br>



<div><span class="text" style="color:whitesmoke">.....</span></div>
<div><span class="text" style="color:whitesmoke">.....</span></div>

<div class="form-control">
    <label>Quantidade Veiculos</label>
    <input type="text" name="qtde" value="">

    <label>Quantidade Max. de Entregas por Veiculos</label>
    <input type="text" name="deliveries" value="">

</div><br>

<div class="form-control">
    <label>Limite de KM</label>
    <input type="text" name="km" value="">

    <label>Cubagem dos Veiculos</label>
    <input type="text" name="cubage" value="">

    <label>Peso dos Veiculos</label>
    <input type="text" name="weight" value="">


</div><br>


<div class = "form-control-lg">
    <label>Selecione as Praças: </label>
    <select  class ="custom-select-lg" multiple name="idPracas[]" >
        @foreach($pracas as $praca)
            <option selected value="{{isset($praca->id) ? $praca->id : ''}}">{{$praca->praca}}</option>
        @endforeach
    </select>
</div><br>

<div>
    <label>Selecione as Rotas: </label>
    <select class ="custom-select-lg" multiple name="idRotas[]">
        @foreach($rotas as $rota)
            <option selected value="{{isset($rota->id) ? $rota->id : ''}}">{{$rota->descricaoRota}}</option>
        @endforeach
    </select>

    <label>Selecione as Região: </label>
    <select class ="custom-select-lg" multiple name="idRegioes[]">
        @foreach($regioes as $regiao)
            <option selected value="{{isset($regiao->id) ? $regiao->id : ''}}">{{$regiao->nomeRegiao}}</option>
        @endforeach
    </select>
</div><br><br>



