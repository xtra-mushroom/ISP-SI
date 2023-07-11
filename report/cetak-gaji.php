<?php
	include "../inc/koneksi.php";
	
	$nik = $_GET['nik'];

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

			$sql_tampil = "select * from tb_gaji where nik='$nik'";
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
		?>
	</center>

	<center>
		<h4>
			<u>DATA GAJI</u>
		</h4>
	</center>

	<table border="1" cellspacing="0" style="width: 90%" align="center">
		<tbody>
		<tr>
				<td>nik</td>
				<td>:</td>
				<td>
					<?php echo $data['nik']; ?>
				</td>
			</tr>
			<tr>
				<td>nama</td>
				<td>:</td>
				<td>
					<?php echo $data['nama']; ?>
				</td>
	
			</tr>
			<tr>
				<td>jumlah gaji pokok</td>
				<td>:</td>
				<td>
					<?php echo $data['jumlah_gaji_pokok']; ?>
				</td>
			</tr>
			<tr>
				<td>jumlah bonus</td>
				<td>:</td>
				<td>
					<?php echo $data['jumlah_bonus']; ?>
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