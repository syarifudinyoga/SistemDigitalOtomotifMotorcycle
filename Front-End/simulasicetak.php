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

<script>
		    window.print();
        </script>

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


    <?php
						
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
									</form><br>
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
						 <a  href="bengkel1.php?action=empty">kosongkan keranjang</a>
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



