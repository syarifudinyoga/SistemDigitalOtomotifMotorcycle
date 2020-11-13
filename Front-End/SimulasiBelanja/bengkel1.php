<?php
	$koneksi = mysqli_connect("localhost","root","","dom_bengkel") or die("Gagal Koneksi Database");
	echo "";	
    ?>
		<?php
		session_start();
		require_once("dbcontroller.php");
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
        max-width: 850px;
        height: 90vh;
      }
      .dua{
        height:100%;
        overflow: auto;
      }
  		.tiga{
				position: relative;
				left: -260px;
			}
			.empat{
				max-width: 850px;
        height: 90vh;
      }
      .lima{
        height:100%;
        overflow: auto;
      }
			.enam{
        position: relative;
				left: -150px;
      }

    </style>
		<script languange="Javascript1.2">
					function pilih(NamaPerusahaan){
						location.replace("bengkel1.php?NamaPerusahaan="+NamaPerusahaan);
					}
</script>
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

    <!-- Bagian css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/ilmudetil.css">

    <!-- Bagian js -->
    <script src='assets/js/jquery-1.10.1.min.js'></script>

    <script src="assets/js/bootstrap.min.js"></script>
    <!-- akhir dari Bagian js -->
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAzl30do_fxVkWEw27mbsYggxwUB3IaNyQ&callback=initialize"></script>
    <!-- <script src="http://maps.google.com/maps/api/js?sensor=false"></script> -->

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
      <div class="container-fluid ">
        <div class="row satu">
          <div class="col-sm-6 dua">
            <?php while($v=mysqli_fetch_array($data)):;?>
           <div class="card text-center ">
                <div class="card-header text-white bg-danger mb-3">
                    <h3><b><?php echo $v["NamaBengkel"];?></b></h3>
                </div>
            <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">Kode Bengkel : <?php echo $v["NamaPerusahaan"];?></p>
            <p class="card-text">Kontak : <?php echo $v["kontak"];?></p>
            <p class="card-text">Status Bengkel : <?php echo $v["status_bengkel"];?></p>
            <p class="card-text">Nama Lokasi : <?php echo $v["NamaLokasi"];?></p>
          </div>
        <?php endwhile;?>
      </div>
      </div>
      </div>
  		<form>
  </td>
<td>
				<div class="tiga">
					<div class="row satu">
						<div class="lima">
						<?php
						$db_handle = new DBController();
						if(!empty($_GET["action"])) {
						switch($_GET["action"]) {
							case "add":
								if(!empty($_POST["quantity"])) {
									$productByCode = $db_handle->runQuery("SELECT * FROM sukucadang WHERE code='" . $_GET["code"] . "'");
									$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));

									if(!empty($_SESSION["cart_item"])) {
										if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
											foreach($_SESSION["cart_item"] as $k => $v) {
													if($productByCode[0]["code"] == $k) {
														if(empty($_SESSION["cart_item"][$k]["quantity"])) {
															$_SESSION["cart_item"][$k]["quantity"] = 0;
														}
														$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
													}
											}
										} else {
											$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
										}
									} else {
										$_SESSION["cart_item"] = $itemArray;
									}
								}
							break;
							case "remove":
								if(!empty($_SESSION["cart_item"])) {
									foreach($_SESSION["cart_item"] as $k => $v) {
											if($_GET["code"] == $k)
												unset($_SESSION["cart_item"][$k]);
											if(empty($_SESSION["cart_item"]))
												unset($_SESSION["cart_item"]);
									}
								}
							break;
							case "empty":
								unset($_SESSION["cart_item"]);
							break;
						}
						}
						?>
						<html lang="en">
						  <head>
						    <!-- Required meta tags -->
						    <meta charset="utf-8">
						    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

						    <!-- Bootstrap CSS -->

						   <link rel="stylesheet" href="css.css" type="text/css"/>
						    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

						<div class="container">
							<form action="b.php" method="post">
								<table>
									<tr>
										<td>
												Plih Bengkel
										</td>
										<td>
										<?php
												$query2 = "select * from bengkel";
												$data2 = mysqli_query($koneksi,$query2) or die("Gagal query:".$query2);			
																?>
														<select class="form-control" Name="NamaPerusahaan" id="NamaPerusahaan">
														  <option value="">Pilih Bengkel</option>
																	<?php while($v2=mysqli_fetch_array($data2)):?>
																		<option value="<?php echo $v2['NamaPerusahaan'];?>"><?php echo $v2['NamaPerusahaan'];?></option>
																	<?php endwhile;?>
														</select>
										</td>
										<td>
												<input type="submit" name="submit" value="submit">
										</td>
									</tr>
								</table>
							</form>
						</div><br>
						
						<div class="container">
							<div class="row">
								<?php
							
							
							//SELECT * FROM sukucadang where NamaPerusahaan like '%".ha."%'
							$product_array = $db_handle->runQuery("SELECT * FROM sukucadang");





							if (!empty($product_array)) {
								foreach($product_array as $key=>$value){
							?>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<div class="my-list">
								<form method="post" action="bengkel1.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
									<img src="../Back-End/HalamanAwal/sucang/<?php echo $product_array[$key]["image"]; ?>" style="width:100px;">
									<h5><?php echo $product_array[$key]["name"]; ?></h5>
									<span><?php echo "RP. ".$product_array[$key]["price"]; ?></span>
									<div class="form-group"><input type="text" name="quantity" value="1" size="2" />
									</div>
									<input type="submit" value="Add" class="btn btn-warning" />
									</form>
								</div>
								</div>
								<?php
									}
							}
							?>
								</div>
						    </div>
						   <hr align="center">
						</td>
						<td>
								 
						<div class="container enam">
						<div class="row satu">
						<div class="lima">
						
						<center><a href="https://api.whatsapp.com/send?phone=6289646621890&text=Halo%20gan,%20Saya%20mau%20Boking.....">
						<img src="https://lh3.googleusercontent.com/-N23V4qsFKs8/WMV9mGK5x5I/AAAAAAAAAPQ/BcC6qzLzJtcqKUWAX5TXX8KxuwDX5JXAgCLcB/h90/Button%2BChat%2Bvia%2BWhatsapp.png" 
						style="max-width: 40%;" / /></a>
						</center>

						 <a  href="bengkel1.php?action=empty">kosongkan keranjang</a><a href="simulasicetak.php" target="_BLANK" align="right"> | Cetak Simulasi Harga</a>
						<?php
						if(isset($_SESSION["cart_item"])){
						    $item_total = 0;
						?>

						   	<table class="table table-bordered">
						  <thead>
						    <tr>
						      <th scope="col">Nama Barang</th>
						      <th scope="col">Kode Barang</th>
						      <th scope="col">Banyak Barang</th>
						      <th scope="col">Kode Barang</th>
						      <th scope="col">Action</th>
						    </tr>

						  </thead>
						  <tbody>
						   <?php
						    foreach ($_SESSION["cart_item"] as $item){
								?>
						    <tr>
						      <th scope="row"><?php echo $item["name"]; ?></th>
						      <td><?php echo $item["code"]; ?></td>
						      <td><?php echo $item["quantity"]; ?></td>
						      <td><?php echo "Rp. ".$item["price"]; ?></td>
						    	<td><a href="bengkel1.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
						    </tr>
						    	<?php
						        $item_total += ($item["price"]*$item["quantity"]);}
								?>
								<tr>
						<td colspan="5" align=right><strong>Total:</strong> <?php echo "Rp. ".$item_total; ?></td>
						</tr>
						  </tbody>
						</table>
						 <?php
						}
						?>
						   </div>
						</div>
						</div>
						</td>
</tr>
</table>



						    <!-- Optional JavaScript -->
						    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
						    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
						    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
						    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
						  </body>

						</html>
					</div>
				</div>

				<div>
  </body>
</html>
