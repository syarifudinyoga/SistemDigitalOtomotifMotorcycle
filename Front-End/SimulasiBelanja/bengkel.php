<?php
	$koneksi = mysqli_connect("localhost","root","","dom_bengkel") or die("Gagal Koneksi Database");
	echo "";	
    ?>
    
<!doctype html>
<html lang='en'>
  <head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>

    <title>Digital Otomotif Motorcycle</title>
    <style>
      .satu{
        max-width: 950px;
        height: 90vh;
      }
      .dua{
        height:100%;
        overflow: auto;
      }
  
      
    </style>
  </head>
  <body>
    
  <!--Navigasi-->
  <div class='container-fluid'>
    <nav class='navbar navbar-expand-lg navbar-light bg-light'>
    <a class='navbar-brand' href='peta.php'>DOM</a>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="peta.php">Peta <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="bengkel.php">Bengkel</a>
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
                $nama = $data['NamaLokasi'];
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>


    <?php
		$query = "select * from bengkel ";
		$data = mysqli_query($koneksi,$query) or die("Gagal query:".$query);?>                       

<table>
        <tr>
          <td>
    <form action="aksiup.php" method="post">
      <div class="container-fluid ">
        <div class="row satu">
          <div class="col-sm-4 dua">    
            <?php while($v=mysqli_fetch_array($data)):;?>
           <div class="card text-center">
                <div class="card-header p-3 mb-2 bg-primary text-white">
                    <h3><b><?php echo $v["NamaBengkel"];?></b></h3>
                </div>
            <div class="card-body p-3 mb-2 bg-info text-white">
            <h5 class="card-title"></h5>
            <p class="card-text">Kode Bengkel : <?php echo $v["NamaPerusahaan"];?></p>
            <p class="card-text">Kontak : <?php echo $v["kontak"];?></p>
            <p class="card-text">Status Bengkel : <?php echo $v["status_bengkel"];?></p>
            <p class="card-text">Nama Lokasi : <?php echo $v["NamaLokasi"];?></p>
            <a href="SimulasiBelanja/index.php" class="btn btn-primary">Lanjut Simulasi</a>
          </div>
        <?php endwhile;?>
      </div> 
      </div>
      </div>
  <form>
        </td>
        <td>
        <form action="aksiup.php" method="post">
      <div class="container-fluid ">
        <div class="row satu">
          <div class="col-sm-4 dua">    
            <?php while($v=mysqli_fetch_array($data)):;?>
           <div class="card text-center">
                <div class="card-header p-3 mb-2 bg-primary text-white">
                    <h3><b><?php echo $v["NamaBengkel"];?></b></h3>
                </div>
            <div class="card-body p-3 mb-2 bg-info text-white">
            <h5 class="card-title"></h5>
            <p class="card-text">Kode Bengkel : <?php echo $v["NamaPerusahaan"];?></p>
            <p class="card-text">Kontak : <?php echo $v["kontak"];?></p>
            <p class="card-text">Status Bengkel : <?php echo $v["status_bengkel"];?></p>
            <p class="card-text">Nama Lokasi : <?php echo $v["NamaLokasi"];?></p>
            <a href="SimulasiBelanja/index.php" class="btn btn-primary">Lanjut Simulasi</a>
          </div>
        <?php endwhile;?>
      </div> 
      </div>
      </div>
  <form>
        </td>
</table>

  </body>
</html>