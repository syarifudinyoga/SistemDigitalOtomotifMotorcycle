<!doctype html>

<?php
session_start();
require_once("dbcontroller.php");
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
    

    <title>Digital Otomotif Motorcycle</title>
  </head>
  <body>
   
   
   <div class="container-fluid">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../peta.php">DOM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../peta.php">Peta <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../bengkel.php">Bengkel</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../about.php">About DOM</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Back-End/login/index.php">Login</a>
      </li>
    </ul>
  </div>
</nav>
</div>

<div class="container">
	<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../peta.php">Home</a></li>
    <li class="breadcrumb-item"><a href="../bengkel.php">Bengkel</a></li>
    <li class="breadcrumb-item active" aria-current="page">Simulasi harga</li>
  </ol>
</nav>	
</div>

<div class="container">
	<div class="row">
		<?php
	$product_array = $db_handle->runQuery("SELECT * FROM sukucadang ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="my-list">
		<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<img src="../../Back-End/HalamanAwal/sucang/<?php echo $product_array[$key]["image"]; ?>" style="width:100px;">
			<h3><?php echo $product_array[$key]["name"]; ?></h3>
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
 <div class="container">
 <a  href="index.php?action=empty">kosongkan keranjang</a><a href="simulasicetak.php" target="_BLANK" align="right"> | Cetak Simulasi Harga</a>
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
    	<td><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
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
    
    
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  
</html>