@include('includes.headerold')

<div id="loading"></div>

<h1>Routes <span id="routes-count"></span></h1>

<div id="map-canvas"></div>

<div id="container">
    <div id="top">
        <a id="add-route" class="btn" href="javascript:void(0)" onclick="RoteirizadorMapView.newRoute()"
           title="Add a new route">+</a>
        <div id="block-toggle">
            <input type="checkbox" checked onclick="RoteirizadorMapView.toggleRouteShow(this)" title="Show/hide all routes">
        </div>
        <ul id="route-tabs"></ul>
    </div>
    <div id="routes-data"></div>
    <div id="routes-content"></div>
</div>

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


@include('includes.footer-mapa')
