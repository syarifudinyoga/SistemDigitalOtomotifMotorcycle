<?php
	$koneksi = mysqli_connect("localhost","root","","dom_bengkel") or die("Gagal Koneksi Database");
	$id=$_GET['id'];
	$query="delete from sukucadang where id='$id'";
	$sql=mysqli_query($koneksi,$query) or die("Gagal Hapus".$query);
	header("location:SukuCadang.php");
?>