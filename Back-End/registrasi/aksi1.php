<?php 
$koneksi = mysqli_connect("localhost","root","","dom_bengkel") or die ("Gagal Koneksi Database");

$NamaLokasi = $_POST['NamaLokasi'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$bengkel = $_POST['bengkel'];

$sql = "INSERT INTO lokasi VALUES('$NamaLokasi','$latitude','$longitude','$bengkel')";
mysqli_query($koneksi,$sql);

header("location:reg1.php");
?>