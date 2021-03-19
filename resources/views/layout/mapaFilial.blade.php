@include('includes.header')


<style>
    #mapa {
        width: 980px;
        height: 500px;
    }
    #current {
        padding-top: 25px;
    }

</style>


<div class ="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Filial: {{$filial->descricao}}</h1>
    <p class="mb-4">
        Endereço: Rua {{$filial->rua}}, bairro {{$filial->bairro}}, numero {{$filial->numero}}, cep {{$filial->cep}}, cidade {{$filial->cidade}},
        estado {{$filial->estado}}, pais {{$filial->pais}}
    </p>
    <div align="right">
        <button id='btnSaveLatLng' class="btn btn-primary" >SALVAR</button>

        <a href="{{route('listagem.filiais')}}" class="btn btn-secondary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-left"></i>
                                        </span>
            <span class="text">LISTAGEM</span>
        </a>
    </div>

<body>
<section>
    <div class ="container-fluid">
        <p class="mb-4"></p>
    </div>
    <div id='mapa' class ="container-fluid"></div>
    <form id='form-save' action="{{route('confirmaMapaFilial', $filial->id)}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" id='inpt-lat' name='lat'/>
        <input type="hidden" id='inpt-lng' name='lng'/>



    </form>
</section>

</body>

<script>
    var latitudejs = null;
    var longitudejs = null;
    var latBanco = {{isset($filial->latitude) ? print($filial->latitude) : print('')}};
    var lngBanco = {{isset($filial->longitude) ? print($filial->longitude) : print('')}};

    if(latBanco == 1 && lngBanco == 1){
        latBanco = '';
        lngBanco = '';
    }

    $(document).ready(function(){
        $.getJSON( "https://maps.googleapis.com/maps/api/geocode/json?address='+'<?php print $filial->cep; ?>'+'&key=AIzaSyAiw7Css05GJeM_isoB-UPpDOx9gpQNZLk", function( response ) {
            let location = response.results[0].geometry.location;

            //console.log(location.lat);
            //console.log(location.lng);

            sessionStorage.setItem('routesData', JSON.stringify(response));

            if (latBanco != '' && lngBanco != ''){
                location = {
                    'lat': latBanco,
                    'lng': lngBanco
                }
            }
            //console.log(location.lat);
            //console.log(location.lng);

            var map = new google.maps.Map(document.getElementById('mapa'), {
                zoom: 15,
                center: location,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var myMarker = new google.maps.Marker({
                position: location,
                draggable: true
            });

            google.maps.event.addListener(myMarker, 'dragend', function(evt){
                //document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
                latitudejs = evt.latLng.lat().toFixed(7);
                longitudejs = evt.latLng.lng().toFixed(7);
                //console.log(latitudejs);
                //console.log(longitudejs);
            });

            google.maps.event.addListener(myMarker, 'dragstart', function(evt){
                document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
            });



            map.setCenter(myMarker.position);
            myMarker.setMap(map);

        });

    });

    $("#btnSaveLatLng").click(function() {
        $("#inpt-lat").val(latitudejs);
        $("#inpt-lng").val(longitudejs);
        $("#form-save").submit();
    })

</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiw7Css05GJeM_isoB-UPpDOx9gpQNZLk&callback=inicializar">
</script>
@include('includes.footer')
