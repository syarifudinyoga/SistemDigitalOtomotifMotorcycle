<?php
	$koneksi = mysqli_connect("localhost","root","","dom_bengkel") or die("Gagal Koneksi Database");
	$id=$_GET['id'];
	$query="select * from sukucadang where id = '$id'";
	$data=mysqli_query($koneksi,$query) or die("Gagal Menampilkan".$query);
	$sql=mysqli_fetch_array($data);
?>

<html>
	<body>
		<legend><h3>Ubah Data</h3></legend>
		<table>
			<form action="aksi_updatesucang.php" method="post">
			<tr>
					<td><label>ID Suku Cadang : </label></td>
					<td><input type="text" name="id" placeholder="ID Suku Cadang" autofocus hidden value="<?php echo $sql['id'];?>"/></td>
				</tr>
				<tr>
					<td><label>Nama Suku Cadang : </label></td>
					<td><input type="text" name="name" placeholder="Nama Suku Cadang" autofocus value="<?php echo $sql['name'];?>"/></td>
				</tr>
				<tr>
					<td><label>Kode Suku Cadang : </label></td>
					<td><input type="text" name="code" placeholder="Kode Suku Cadang" autofocus value="<?php echo $sql['code'];?>"/></td>
				</tr>
				<tr>
					<td><label>Gambar Suku Cadang : </label></td>
					<td><input type="text" name="image" placeholder="Gambar Suku Cadang" autofocus hidden value="<?php echo $sql['image'];?>"/></td>
				</tr>
				<tr>
					<td><label>Harga Suku Cadang : </label></td>
					<td><input type="text" name="price" placeholder="Harga Suku Cadang" autofocus value="<?php echo $sql['price'];?>"/></td>
				</tr>
				<tr>
					<td><label>Nama Bengkel : </label></td>
					<td>
						<?php
							$koneksi = mysqli_connect("localhost","root","","dom_bengkel") or die("Gagal Koneksi Database");
							$query = "select * from bengkel";
							$data = mysqli_query($koneksi,$query) or die("Gagal query:".$query);			
						?>
						<select name="NamaPerusahaan">
							<option value="">Pilih Bengkel</option>
							<?php while($v=mysqli_fetch_array($data)):;?>
								<option value="<?php echo $v['NamaPerusahaan'];?>"><?php echo $v['NamaPerusahaan'];?></option>
							<?php endwhile;?>	
						</select>
				<tr>
					<td colspan="4" align="center">
						<input type="submit" name="submit" value="Submit" onClick="return confirm('Apakah Data akan disimpan?')"/>
					</td>
				</tr>
		
			</form>
		</table>
	</body>
</html>