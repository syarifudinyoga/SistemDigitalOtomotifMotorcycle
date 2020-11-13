<?php
	$koneksi = mysqli_connect("localhost","root","","dom_bengkel") or die("Gagal Koneksi Database");
	$idjadwal=$_POST['idjadwal'];
	$hari=$_POST['hari'];
	$jambuka=$_POST['jambuka'];
	$jamtutup=$_POST['jamtutup'];	
	$NamaPerusahaan=$_POST['NamaPerusahaan'];

	$query = "insert into jadwal values('$idjadwal','$hari','$jambuka','$jamtutup','$NamaPerusahaan')";
	$sql=mysqli_query($koneksi,$query) or die("Gagal input".$query);
	header("location:jadwal.php");
?>