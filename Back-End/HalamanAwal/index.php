<?php
	$koneksi = mysqli_connect("localhost","root","","dom_bengkel") or die("Gagal Koneksi Database");
	echo "Sukses Koneksi database";	
?>

<html>
<head>
<title>Bengkel</title>
</head>
<body>
	<table border="3">
		<tr>
			<th>Nama Perusahaan</th>
			<th>Kontak</th>
			<th>Status bengkel</th>
			<th>Jumlah teknisi</th>
			<th>Nama Lokasi</th>
			<th>Action</th>
		</tr>
		<?php

			$query = "select * from bengkel";
			
			$data = mysqli_query($koneksi,$query) or die("Gagal query:".$query);
		?>
		<?php while($v=mysqli_fetch_array($data)):;?>
		<tr>
			<td><?php echo $v["NamaPerusahaan"];?></td>
			<td><?php echo $v["kontak"];?></td>
			<td><?php echo $v["status_bengkel"];?></td>
			<td><?php echo $v["jumlah_teknisi"];?></td>
			<td><?php echo $v["NamaLokasi"];?></td>
			<td><name="tambah" data-target="#editDataBengkel" data-toggle="modal" class="btn btn-warning"></td>
			
		</tr>
		<?php endwhile;?>
	</table>
</body>
</html>