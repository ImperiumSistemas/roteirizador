@include('includes.header')
Rorteirizador Imperium <br><br><br>

<style>
      #mapa {
    width: 980px;
    height: 500px;
}
#current {
    padding-top: 25px;
}
    </style>



<body>
    <section>
        <div id='mapa'></div>
        <div id="current">Nothing yet...</div>        
    </section>
</body>
<script>
	
        $(document).ready(function(){
            $.getJSON( "https://maps.googleapis.com/maps/api/geocode/json?address=RuaCaparao282montecastelocontagem32285080&key=AIzaSyAiw7Css05GJeM_isoB-UPpDOx9gpQNZLk", function( response ) {

               let location = response.results[0].geometry.location;
               //console.log(location.lat);  

               
               
                sessionStorage.setItem('routesData', JSON.stringify(response));

                //var coordenadas = {lat: -22.912869, lng: -43.228963};
               
               
       			//console.log(latitude)
       
		       var map = new google.maps.Map(document.getElementById('mapa'), {
    				zoom: 15,
    				center: location,
    				mapTypeId: google.maps.MapTypeId.ROADMAP
				});

		        var myMarker = new google.maps.Marker({
    				position: location,
    				draggable: true
				});
		        			 
				google.maps.event.addListener(myMarker, 'dragend', function (evt) {
    				//document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
    				var latitude = evt.latLng.lat().toFixed(3)
    				document.getElementById('current').innerHTML = '<input type="text" name="latitude" value="' + evt.latLng.lat().toFixed(3) + '"> <input type="text" name="longitude" value="' + evt.latLng.lng().toFixed(3) + '">'
				});

					google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
    						document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
					});

				map.setCenter(myMarker.position);
				myMarker.setMap(map);

		    });        
	   			
		});

  

    </script>

    
    
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiw7Css05GJeM_isoB-UPpDOx9gpQNZLk&callback=inicializar">
    </script>

</script>
@include('includes.footer')
