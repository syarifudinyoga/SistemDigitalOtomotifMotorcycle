<?php
	$koneksi = mysqli_connect("localhost","root","","dom_bengkel") or die("Gagal Koneksi Database");
	$id=$_POST['id'];
	$name=$_POST['name'];
	$code=$_POST['code'];
	$image=$_FILES['image']['name'];

	$price=$_POST['price'];
	$NamaPerusahaan=$_POST['NamaPerusahaan'];

	if (is_uploaded_file($_FILES['image']['tmp_name'])) {
		move_uploaded_file($_FILES['image']['tmp_name'], "sucang/".$image);
	}
	$query = "update sukucadang set name='$name',code='$code',image='$image',price='$price',NamaPerusahaan='$NamaPerusahaan' where id='$id'";
	$sql=mysqli_query($koneksi,$query) or die("Gagal input".$query);
	header("location:SukuCadang.php");
?>