<?php
	include "../inc/koneksi.php";
	
	$id_pelanggan = $_GET['id_pelanggan'];

	$sql_cek = "SELECT * FROM tb_profil";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
	{
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK</title>
</head>

<body>
	<img src="../dist/img/logo2.webp" align=left height="120" width="170">
	<center>

	<h2>
			<?php echo $data_cek['nama_perusahaan']; ?>
		</h2>
		<h2>
			<?php echo $data_cek['nama_produk']; ?>
		</h2>
		<h3>
			<?php echo $data_cek['alamat']; ?>
			<br />
			<br />
			<hr / size="2px" color="black">

			<?php
			}

			$sql_tampil = "select * from tb_pelanggan where id_pelanggan='$id_pelanggan'";
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
		?>
	</center>

	<center>
		<h4>
			<u>DATA PELANGGAN</u>
		</h4>
	</center>

	<table border="0" cellspacing="0" style="width: 90%" align="center">
		<tbody>
		<tr>
				<td>ID Pelanggan</td>
				<td>:</td>
				<td>
					<?php echo $data['id_pelanggan']; ?>
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<?php echo $data['namapelanggan']; ?>
				</td>
				<td rowspan="10" align="center">
					<img src="../foto/<?php echo $data['foto']; ?>" width="200px" />
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td>
					<?php echo $data['alamat']; ?>
				</td>
			</tr>
			<tr>
				<td>Jenis Paket</td>
				<td>:</td>
				<td>
					<?php echo $data['jenis']; ?>
				</td>
			</tr>
			
			<?php } ?>
		</tbody>
	</table>

	<br />
	<br />
	<br />
	<table width="100%">
        <tr>
            <td width="40%"></td>
            <td width="20%"></td>
            <td align="center">Marabahan, <?php echo date('d F Y'); ?></td>
        </tr>
        <tr>
            <td align="center"><br><br><br></td>
            <td></td>
            <td align="center">Kepala kantor<br><br><br></td>
        </tr>
        <tr>
            <td align="center"></td>
            <td></td>
            <td align="center"><u>Demitri Erlangga, SE</u><br>NIK 1987654321</td>
        </tr>
    </table>


	<script>
		window.print();
	</script>

</body>

</html>