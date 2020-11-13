<?php
	$koneksi = mysqli_connect("localhost","root","","dom_bengkel") or die("Gagal Koneksi Database");
	$NamaPerusahaan =$_GET['NamaPerusahaan'];
	$query="delete from bengkel where NamaPerusahaan='$NamaPerusahaan'";
	$sql=mysqli_query($koneksi,$query) or die("Gagal Hapus".$query);
	header("location:Bengkel.php");
?>