<?php
	$koneksi = mysqli_connect("localhost","root","","dom_bengkel") or die("Gagal Koneksi Database");
	$id=$_GET['NamaLokasi'];
	$query="delete from lokasi where NamaLokasi='$id'";
	$sql=mysqli_query($koneksi,$query) or die("Gagal Hapus".$query);
	header("location:lokasi.php");
?>