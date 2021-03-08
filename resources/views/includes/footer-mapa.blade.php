
<!--JavaScript at end of body for optimized loading-->
<!-- Compiled and minified JavaScript -->

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript" src="{{ asset('js/utils.js') }}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxGmrZ96OlSQQyx4_DXJyT_81DjEEAR9A"></script>
<script type="text/javascript" src="{{ asset('js/route.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/roteirizador-map-view.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $.getJSON("http://127.0.0.1:8000/gerarCarga", function( data ) {

                console.log(data);
                sessionStorage.setItem('routesData', JSON.stringify(data));
            });
            window.onload = RoteirizadorMapView.viewRoutes();
        });
    </script>
</body>
</html>
