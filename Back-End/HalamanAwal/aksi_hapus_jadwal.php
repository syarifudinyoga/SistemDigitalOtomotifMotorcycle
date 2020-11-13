<?php
	$koneksi = mysqli_connect("localhost","root","","dom_bengkel") or die("Gagal Koneksi Database");
	$idjadwal=$_GET['idjadwal'];
	$query="delete from jadwal where idjadwal='$idjadwal'";
	$sql=mysqli_query($koneksi,$query) or die("Gagal Hapus".$query);
	header("location:jadwal.php");
?>