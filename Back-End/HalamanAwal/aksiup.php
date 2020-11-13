<?php
	$koneksi = mysqli_connect("localhost","root","","dom_bengkel") or die("Gagal Koneksi Database");
	$NamaPerusahaan=$_POST['NamaPerusahaan'];
	$NamaBengkel=$_POST['NamaBengkel'];
	$kontak=$_POST['kontak'];
	$StatusBengkel=$_POST['status_bengkel'];
	$JumlahTeknisi=$_POST['jumlah_teknisi'];
	$NamaLokasi=$_POST['NamaLokasi'];
	$image=$_FILES['FotoBengkel']['name'];

	if (is_uploaded_file($_FILES['FotoBengkel']['tmp_name'])) {
		move_uploaded_file($_FILES['FotoBengkel']['tmp_name'], "bengkel/".$image);
	}


	$query = "update bengkel set NamaBengkel='$NamaBengkel',kontak='$kontak',status_bengkel='$StatusBengkel',jumlah_teknisi='$JumlahTeknisi',NamaLokasi='$NamaLokasi',FotoBengkel='$image' where NamaPerusahaan='$NamaPerusahaan'";
	$sql=mysqli_query($koneksi,$query) or die("Gagal input".$query);
	header("location:Bengkel.php");
?>