@include('includes.header')
<title> MONTAGEM CARGA </title>
<link href="{{ asset('css/mapa.css') }}" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
function informacoes(primeiro) {
    var display = document.getElementById(primeiro).style.display;
    if (display == "none")
        document.getElementById(primeiro).style.display = 'block';
    else
        document.getElementById(primeiro).style.display = 'none';
}
</script>

<div  id="container" class="card-footer">
    <button id='btnSalvarCargas' class="btn btn-primary">SALVAR</button>
    <button id='btnOtimizarCargas' class="btn btn-primary">OTIMIZAR CARGAS</button>
    <div  id="top">
        <a id="add-route" style="background-color: darkblue" class="btn" href="javascript:void(0)" onclick="RoteirizadorMapView.newRoute()"
           title="Add a new route">ADICIONAR ROTA</a>
        <div  id="block-toggle">
            <input type="checkbox" checked onclick="RoteirizadorMapView.toggleRouteShow(this)"
                   title="Show/hide all routes">
        </div>
        <ul id="route-tabs"></ul>
    </div>
    <div style="display:none" id="routes-data"></div>
    <div style="display:none" id="routes-content"></div>
</div>
<div class="card-footer">
    <a  style="background-color: darkblue" class="btn" onclick="informacoes('routes-data')">
        <div>DETALHES DA CARGA</div>
    </a>
</div>
<div id="routes-count"></div>
<div id="loading"></div>
<!--<h1>Routes <span id="routes-count"></span></h1>-->


<div id="map-canvas"></div>
<div id="delivery-warning">Deliveries warnings</div>
<div id="delivery-warning-popup">
    <div id="not-found" class="block">
        <p class="title">Not found address</p>
    </div>
    <div id="aproximated" class="block">
        <p class="title">Aproximated adress</p>
    </div>
    <div id="not-assigned" class="block">
        <p class="title">Não coube nas cargas</p>
    </div>
</div>

<form id='saveCargasForm' action="{{route('salvarCarga')}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" id='cargas' name='cargas'/>
    
</form>

<form id='otimizaCargasForm' action="{{route('otimizaCargas')}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" id='cargasOtimizar' name='cargasOtimizar'/>

</form>

<script>

    
     //let dados = JSON.parse(sessionStorage.getItem('routesData'));
     let dados = sessionStorage.getItem('routesData');
     $("#btnSalvarCargas").click(function() {
         dados = sessionStorage.getItem('routesData');
        $("#cargas").val(dados);
        $("#saveCargasForm").submit();
    })

     $("#btnOtimizarCargas").click(function() {
         dados = sessionStorage.getItem('routesData');
         $("#cargasOtimizar").val(dados);
         $("#otimizaCargasForm").submit();
     })


    
</script>
@include('includes.footer-mapa')
