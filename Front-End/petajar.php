<?php include "connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ilmu-detil.blogspot.com">
    <title>Digital Otomotif Motorcycle</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <script type='text/javascript'>
 $(window).load(function(){
   $("#showhide").css("display","none");
  
 $('#clickme').change(function(){
   if (this.checked) {
     $('#showhide').fadeIn('slow');
   } 
   else {
     $('#showhide').fadeOut('slow');
   }  
 });
 });
 </script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bagian css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/ilmudetil.css">
    
    <!-- Bagian js -->
    <script src='assets/js/jquery-1.10.1.min.js'></script>       
    
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- akhir dari Bagian js -->
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAzl30do_fxVkWEw27mbsYggxwUB3IaNyQ&callback=initialize"></script>
    <!-- <script src="http://maps.google.com/maps/api/js?sensor=false"></script> -->
    
    <script>
        
    var marker;
      function initialize() {
          
        // Variabel untuk menyimpan informasi (desc)
        var infoWindow = new google.maps.InfoWindow;
        
        //  Variabel untuk menyimpan peta Roadmap
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        } 
        
        // Pembuatan petanya
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
              
        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();

        // Pengambilan data dari database
        <?php
            $query = mysqli_query($con,"select * from lokasi");
            while ($data = mysqli_fetch_array($query))
            {
                $nama = $data['bengkel'];
                $lat = $data['latitude'];
                $lon = $data['longitude'];
                
                echo ("addMarker($lat, $lon, '<b>$nama</b>');\n");                        
            }
          ?>
          
        // Proses membuat marker 
        function addMarker(lat, lng, info) {
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: map,
                position: lokasi
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
         }
        
        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
 
        }
      google.maps.event.addDomListener(window, 'load', initialize);
    
    </script>
    
</head>


<!--- Bagian Judul-->   

<!--Navigasi-->
<div class="container-fluid">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="peta.php">DOM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="peta.php">Peta <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="bengkel1.php">Bengkel</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About DOM</a>
      </li>
    </ul>
  </div>
  <ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link" href="../Back-End/login/index.php" >Login</a>
  </li>
</ul>
</nav>
</div>

<body onload="initialize()">
<div class="container-fluid" style="margin-top:10px"> 
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                    <div class="panel-body">
                        <div id="map-canvas" style="width: 100%; height: 800px;"></div>
                    </div>
            </div>
        </div>
        <div class="col-md-4">
              <!--Geolokaisi untuk cek koordinat-->
			<p>Cek lokasi untuk latitude dan longitude <button onclick="getLocation()">Cek</button></p>
			 
       <p id="tampilkan"></p>
       </center>
       
       
   
   <script>
       var view = document.getElementById("tampilkan");
       function getLocation() {
         if (navigator.geolocation) {
           navigator.geolocation.getCurrentPosition(showPosition);
         } else {
           view.innerHTML = "Perangkat ini tidak support geolocation";
         }
       }
        function showPosition(position) {
         view.innerHTML = "Latitude: " + position.coords.latitude + 
         "<br>Longitude: " + position.coords.longitude; 
        }
         </script>
 
   <h3>Lokasi Saat Ini</h3>
   <form action="#" method="post">		
     <table>
       <tr>
         <td>Latitude</td>
         <td><input type="text" name="latitude" disabled value="" ></td>					
       </tr>	
       <tr>
         <td>Longitude</td>
         <td><input type="text" name="longitude" disabled value="" ></td>					
       </tr>	
       <tr>
         <td></td>
         <td><input type="submit" value="Submit">
       </td>					
       </tr>				
     </table>
   </form><br>
 
   
 <?php
   $koneksi = mysqli_connect("localhost","root","","dom_bengkel") or die("Gagal Koneksi Database");
   echo "";	
 
   
   if( $_POST["latitude"]=="" && $_POST["longitude"]==""){
   $currentLat = 0;
   $currentLong = 0;  
   } else{
   $currentLat = $_POST["latitude"]; //garis bujur lokasi 1
   $currentLong = $_POST["longitude"]; //garis lintang lokasi 1
   }
 
   ?>
 
 
 <?php
 $query = "select * from lokasi";
 $data = mysqli_query($koneksi,$query) or die("Gagal query:".$query);
 while($v=mysqli_fetch_array($data)):;
 
 
 
 $destLat = $v['latitude']; //garis bujur lokasi 2
 $destLon = $v['longitude']; //garis lintang lokasi 2
 
 echo "<b> jarak anda dengan bengkel </b>";
 echo $v['bengkel'];
 echo " <b> sejauh</b> " ;
 echo hitungJarak($currentLat,$currentLong, $destLat, $destLon);
 echo " ";
 echo " km <br><br>";
 
 endwhile;
 
 
 function hitungJarak($lokasi1_lat, $lokasi1_long, $lokasi2_lat, $lokasi2_long, $unit = 'km', $desimal = 5) {
  // Menghitung jarak dalam derajat
  $derajat = rad2deg(acos((sin(deg2rad($lokasi1_lat))*sin(deg2rad($lokasi2_lat))) + (cos(deg2rad($lokasi1_lat))*cos(deg2rad($lokasi2_lat))*cos(deg2rad($lokasi1_long-$lokasi2_long)))));
   
  // Mengkonversi derajat kedalam unit yang dipilih (kilometer, mil atau mil laut)
  switch($unit) {
   case 'km':
    $jarak = $derajat * 111.13384; // 1 derajat = 111.13384 km, berdasarkan diameter rata-rata bumi (12,735 km)
    break;
   case 'mi':
    $jarak = $derajat * 69.05482; // 1 derajat = 69.05482 miles(mil), berdasarkan diameter rata-rata bumi (7,913.1 miles)
    break;
   case 'nmi':
    $jarak =  $derajat * 59.97662; // 1 derajat = 59.97662 nautic miles(mil laut), berdasarkan diameter rata-rata bumi (6,876.3 nautical miles)
  }
  return round($jarak, $desimal);
 }
 
 ?>     
 
 </div>
        </div>  
    </div>
</div>  





<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>