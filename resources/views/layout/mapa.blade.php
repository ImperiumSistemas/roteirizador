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

    <div  id="top">
        <a id="add-route" style="background-color: darkblue" class="btn" href="javascript:void(0)" onclick="RoteirizadorMapView.newRoute()"
           title="Adicionar Rota">ADICIONAR ROTA</a>
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
    <a  class="btn btn-primary" onclick="informacoes('routes-data')">
        <div>DETALHES DA CARGA</div>
    </a>
    <button id='btnOtimizarCargas' class="btn btn-primary">OTIMIZAR CARGAS</button>
    <button id='btnSalvarCargas' class="btn btn-primary">SALVAR</button>
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
         let routesChecked = $("#route-tabs").find("input:checked");

         const RoutesData = JSON.parse(window.sessionStorage.getItem('routesData') || '{}');
         const routes = RoutesData.routes;
         let routesFinal = [];

         $.each(routesChecked, (_, elem) => {
             let rota = routes.find((o) => { return o.id === $(elem).data('id') });
             routesFinal.push(rota);
         });
         dados = RoteirizadorMapView.getCheckedRoutes();
            //dados = JSON.parse(routesFinal)
         //$("#cargas").val(JSON.stringify(routesFinal));
         $("#cargas").val(dados);
         $("#saveCargasForm").submit();

    })

     function recuperaRotas(rotasChecadas){};

     $("#btnOtimizarCargas").click(function() {
         dados = sessionStorage.getItem('routesData');
         $("#cargasOtimizar").val(dados);
         $("#otimizaCargasForm").submit();
     })


    
</script>
@include('includes.footer-mapa')
