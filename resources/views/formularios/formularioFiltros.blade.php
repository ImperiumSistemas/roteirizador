<div class="form-control">
    <label>Filial de Partida</label>
    <select name="filial_id">
        <option value="0"></option>
        @foreach($filiais as $filial)
            <option value="{{isset($filial->id) ? $filial->id : ''}}">{{isset($filial->descricao) ? $filial->descricao : ''}}</option>
        @endforeach
    </select>
</div>


<div class="form-control">
    <label>Quantidade Veiculos</label>
    <input type="text" name="qtde" value="">

    <label>Quantidade Max. de Entregas por Veiculos</label>
    <input type="text" name="deliveries" value="">

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


