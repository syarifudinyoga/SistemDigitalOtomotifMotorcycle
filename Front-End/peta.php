<?php include "connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ilmu-detil.blogspot.com">
    <title>Digital Otomotif Motorcycle</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        
        <script language="javascript">
	function getkey(e)
	{
		if (window.event)
   		return window.event.keyCode;
		else if (e)
   		return e.which;
		else
   		return null;
	}

	function goodchars(e, goods, field)
	{
	var key, keychar;
	key = getkey(e);
		if (key == null) return true;
 
		keychar = String.fromCharCode(key);
		keychar = keychar.toLowerCase();
		goods = goods.toLowerCase();
 
	// check goodkeys
	if (goods.indexOf(keychar) != -1)
			return true;
	// control keys
	if ( key==null || key==0 || key==8 || key==9 || key==27 )
		return true;
			
	if (key == 13) {
			var i;
			for (i = 0; i < field.form.elements.length; i++)
					if (field == field.form.elements[i])
							break;
			i = (i + 1) % field.form.elements.length;
			field.form.elements[i].focus();
			return false;
			};
	// else return false
	return false;
	}
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
        function showError(error) {
          switch(error.code) {
            case error.PERMISSION_DENIED:
              view.innerHTML = "Akses lokasi dibutuhkan"
            break;
        case error.POSITION_UNAVAILABLE:
            view.innerHTML = "Lokasi tidak ditemukan"
            break;
        case error.TIMEOUT:
            view.innerHTML = "Request Time Out"
            break;
        case error.UNKNOWN_ERROR:
            view.innerHTML = "An unknown error occurred."
            break;
        }
    }
         </script>
 
   <h3>Lokasi Saat Ini</h3>
   <form action="petajar.php" method="post">		
     <table>
       <tr>
         <td>Latitude</td>
         <td><input type="text" name="latitude" id="nama" onKeyPress="return goodchars(event,'-.0123456789',this)" required></td>					
       </tr>	
       <tr>
         <td>Longitude</td>
         <td><input type="text" name="longitude" id="nama" onKeyPress="return goodchars(event,'-.0123456789',this)" required></td>					
       </tr>	
       <tr>
         <td></td>
         <td><input type="submit" value="Submit">
       </td>					
       </tr>				
     </table>
   </form>
 
  
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