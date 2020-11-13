<?php 
$koneksi = mysqli_connect("localhost","root","","dom_bengkel") or die ("Gagal Koneksi Database");

$NamaPerusahaan = $_POST['NamaPerusahaan'];
$NamaBengkel = $_POST['NamaBengkel'];
$kontak = $_POST['kontak'];
$status_bengkel = $_POST['status_bengkel'];
$jumlah_teknisi = $_POST['jumlah_teknisi'];
$NamaLokasi = $_POST['NamaLokasi'];

$sql = "INSERT INTO bengkel VALUES('$NamaPerusahaan','$NamaBengkel','$kontak','$status_bengkel','$jumlah_teknisi','$NamaLokasi','')";
mysqli_query($koneksi,$sql);

header("location:finalreg.php");
?>