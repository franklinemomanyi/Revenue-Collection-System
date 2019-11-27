<?php
require('../../conn.php');
require('../../sweetalert.php');
$query="SELECT * FROM BUSSTYPE";
$result=mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html>
<head>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Google Maps</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">



<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?language=en&key= API &libraries=geometry"></script>


            <script type="text/javascript">
            var marker;
            var markernew;
            var infowindow;

            function initialize() {
              var latlng = new google.maps.LatLng(0.5528, 35.3027);
              var options = {
                zoom: 14,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
              }
              var map = new google.maps.Map(document.getElementById("map-canvas"), options);


            //map.data.addGeoJson('polygon.geojson');
   

              var html = "<table class='table table-borderless'>" +
                         "<tr><td class='form-control'>Name:</td> <td><input type='text' class='form-control' id='name'/> </td> </tr>" +
                         "<tr><td class='form-control'>Address:</td> <td><input type='text' class='form-control' id='address'/></td> </tr>" +
                         "<tr><td class='form-control'>Type:</td> <td><select id='type' class='form-control'>" +
                         "<option class='form-control' value='null' selected disabled>Institution</option>" +
                         "<option class='form-control' value='College'>College</option>" +
                         "<option class='form-control' value='University'>University</option>" +
                         "</select> </td></tr>" +
                         "<tr><td></td><td><input class='btn btn-primary' type='button' value='Update'     onclick='saveData()'/></td></tr>";

              infowindow = new google.maps.InfoWindow({
               content: html
              });

              google.maps.event.addListener(map, "click", function(event) {
                  markernew = new google.maps.Marker({
                    position: event.latLng,
                    map: map
                  });
                  google.maps.event.addListener(markernew, "click", function() {
                    infowindow.open(map, markernew);
                  });
              });
            // load geo-positions from server side script
            var map;
             var bounds = new google.maps.LatLngBounds();
             //Carry out an Ajax request.
             var infoWindow = new google.maps.InfoWindow(), marker, i;
                $.ajax({
                    url: 'mapgetlocation.php',
                    success:function(data){
                        //console.log(data);
                        //Loop through each location.
                      var i = 0;
                        $.each(data, function(){
                          i++;
                          var name = this.NAME;
                            //Plot the location as a marker
                             var pos = new google.maps.LatLng(this.LAT, this.LNG); 
                             bounds.extend(pos);
                             marker =  new google.maps.Marker({
                                  position: pos,                          
                                  map: map,
                                  title: name
                              });
                            map.fitBounds(bounds);
                             google.maps.event.addListener(marker, 'click', (function(marker, i) {
                             return function() {
                        infoWindow.setContent('<div class="info_content"> <h3>'+  name + '</h3></div>');
                        infoWindow.open(map, marker);
                    }
                })(marker, i));        
                        });
                    }
                });             

            // Set zoom level
            var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                this.setZoom(10);
                google.maps.event.removeListener(boundsListener);
            });

            }

            function saveData() {
              var name = document.getElementById("name").value;
              var address = document.getElementById("address").value;
              var type = document.getElementById("type").value;
              var lat = markernew.getPosition().lat();
              var lng = markernew.getPosition().lng();
              infowindow.close(); 
              


               $.ajax({
                url:'mapadd.php',
                type:'get',
                data:{name:name,address:address,type:type,lat:lat,lng:lng},
                success:function(response){
                   
                    if(response.trim() == 1){

                       swal({
                            title: "Revenue Collection System",
                            text: "Location successfully updated!",
                            icon: "success",
                            button: "Okay"});
                            initialize();
                        
                    }
                    if(response.trim() == 2){
                        
                        swal({
                            title: "Revenue Collection System",
                            text: "Server Error!",
                            icon: "error",
                            button: "Okay"});
                       
                    }
                }
              });
   
            
            }

            function doNothing() {}
            </script>


</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed sidebar-collapse" onload="initialize()">
<div class="wrapper">
  <!-- Navbar -->
 <?php
    require('../../nav.php');
 ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
    require('../../aside.php');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Google Maps</h4>
          </div>
          
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div id="map-canvas" style="width: 100%; height: 800px" class="card card-primary">
              
              
              
            </div>
            <div id="message">
              
            </div>
          
           

          </div>
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    require('../../footer.php');
  ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php
    require('../../fileinput.php');
?>



<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
