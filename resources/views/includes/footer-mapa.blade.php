
<!--JavaScript at end of body for optimized loading-->
<!-- Compiled and minified JavaScript -->
<script src="../js/sb-admin-2.min.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript" src="{{ asset('js/utils.js') }}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxGmrZ96OlSQQyx4_DXJyT_81DjEEAR9A"></script>
<script type="text/javascript" src="{{ asset('js/route.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/roteirizador-map-view.js') }}"></script>



<!--<script src="../css/jquery/jquery.min.js"></script>-->
<script src="../css/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../css/jquery-easing/jquery.easing.min.js"></script>
<script src="../css/chart.js/Chart.min.js"></script>



<script src="../css/datatables/jquery.dataTables.min.js"></script>
<script src="../css/datatables/dataTables.bootstrap4.min.js"></script>

<script src="../js/demo/datatables-demo.js"></script>




    <script type="text/javascript">
        $(document).ready(function(){

            console.log(<?php echo $resposta; ?>);
            sessionStorage.setItem('routesData', JSON.stringify(<?php echo $resposta; ?>));
            window.onload = RoteirizadorMapView.viewRoutes();
        });


    </script>
</body>
</html>
