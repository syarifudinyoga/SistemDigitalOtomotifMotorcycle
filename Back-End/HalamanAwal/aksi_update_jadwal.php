<?php
	$koneksi = mysqli_connect("localhost","root","","dom_bengkel") or die("Gagal Koneksi Database");
	$idjadwal=$_POST['idjadwal'];
	$hari=$_POST['hari'];
	$jambuka=$_POST['jambuka'];
	$jamtutup=$_POST['jamtutup'];
	$NamaPerusahaan=$_POST['NamaPerusahaan'];


	$query = "update jadwal set idjadwal='$idjadwal',hari='$hari',jambuka='$jambuka',jamtutup='$jamtutup',NamaPerusahaan='$NamaPerusahaan' where idjadwal='$idjadwal'";
	$sql=mysqli_query($koneksi,$query) or die("Gagal input".$query);
	header("location:jadwal.php");
?>