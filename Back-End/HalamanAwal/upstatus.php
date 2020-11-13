<?php
	$koneksi = mysqli_connect("localhost","root","","dom_bengkel") or die("Gagal Koneksi Database");
	$NamaPerusahaan=$_GET['NamaPerusahaan'];
	$query="select * from bengkel where NamaPerusahaan='$NamaPerusahaan'";
	$data=mysqli_query($koneksi,$query) or die("Gagal Menampilkan".$query);
	$sql=mysqli_fetch_array($data);
?>

<html>
	<body>
		<legend><h3>Ubah Data</h3></legend>
		<table>
			<form action="aksiup.php" method="post">
					<td><label>Nama Bengkel : </label></td>
					<td><input type="text" name="NamaPerusahaan" placeholder="Nama Perusahaan" autofocus value="<?php echo $sql['NamaPerusahaan'];?>"/></td>
				</tr>
				<tr>
					<td><label>Kontak : </label></td>
					<td><input type="text" name="kontak" placeholder="kontak" autofocus value="<?php echo $sql['kontak'];?>"/></td>
				</tr>
				<tr>
					<td><label>Status Bengkel : </label></td>
					<td><input type="text" name="status_bengkel" placeholder="Status Bengkel" autofocus value="<?php echo $sql['status_bengkel'];?>"/></td>
				</tr>
				<tr>
					<td><label>Jumlah Teknisi : </label></td>
					<td><input type="text" name="jumlah_teknisi" placeholder="jumlah teknisi" autofocus value="<?php echo $sql['jumlah_teknisi'];?>"/></td>
				</tr>
				<tr>
					<td><label>Nama Lokasi : </label></td>
					<td><input type="text" name="NamaLokasi" placeholder="NamaLokasi" autofocus value="<?php echo $sql['NamaLokasi'];?>"/></td>
				</tr>
				<tr>
					<td colspan="4" align="center">
						<input type="submit" name="submit" value="Submit" onClick="return confirm('Apakah Data akan disimpan?')"/>
					</td>
				</tr>
		
			</form>
		</table>
	</body>
</html>