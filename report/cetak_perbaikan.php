<?php
include "../inc/koneksi.php";

function tgl_indo($tanggal){
	$bulan = array (
		1 => 'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);   
	return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

$sql = "SELECT * FROM tb_profil";
$query = mysqli_query($koneksi, $sql);
$data_cek = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK</title>
</head>

<body>
	<img src="../dist/img/logo2.webp" align=left width="180" style="margin-left:2%;">
	<center style="margin-left:2%;">
		<h2>
			<?php echo $data_cek['nama_perusahaan']; ?><br>
			<?php echo $data_cek['nama_produk']; ?>
		</h2>
		<h4>
			<?php echo $data_cek['alamat']; ?>
			<br />
			<br />
			<hr / size="3px" color="black">
		</h4>
	</center>

<?php
$idPerbaikan = $_GET['id'];
$sql_tampil = "SELECT tb_keluhan.id_keluhan, tb_keluhan.id_pelanggan, tb_keluhan.tanggal_keluhan, tb_keluhan.isi_keluhan, tb_perbaikan.tanggal_perbaikan, tb_perbaikan.penanganan, tb_perbaikan.lama_perbaikan, tb_perbaikan.id_teknisi, tb_pelanggan.nama_pelanggan, tb_pelanggan.alamat_pelanggan FROM tb_keluhan INNER JOIN tb_perbaikan ON tb_keluhan.id_keluhan = tb_perbaikan.id_keluhan INNER JOIN tb_pelanggan ON tb_perbaikan.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_perbaikan.id_perbaikan=$idPerbaikan";
$query_tampil = mysqli_query($koneksi, $sql_tampil);
$no=1;
while($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)){
?>

	<center>
		<h3>
			<u>DATA PERBAIKAN</u>
		</h3>
	</center>

	<table border="0" cellspacing="0" style="width: 90%" align="center">
		<tbody>
			<tr>
				<td width="200px">ID Pelanggan</td>
				<td>:</td>
				<td>
					<?php echo $data['id_pelanggan']; ?>
				</td>
			</tr>
			<tr>
				<td>Nama Pelanggan</td>
				<td>:</td>
				<td>
					<?php echo $data['nama_pelanggan']; ?>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td>
					<?php echo $data['alamat_pelanggan']; ?>
				</td>
			</tr>
			<tr>
				<td>ID Keluhan</td>
				<td>:</td>
				<td>
					<?php echo $data['id_keluhan']; ?>
				</td>
			</tr>
			<tr>
				<td>Tanggal Keluhan</td>
				<td>:</td>
				<td>
					<?php echo tgl_indo($data['tanggal_keluhan']); ?>
				</td>
			</tr>
			<tr>
				<td>Isi Keluhan</td>
				<td>:</td>
				<td>
					<?php echo $data['isi_keluhan']; ?>
				</td>
			</tr>
			<tr>
				<td>Tanggal Perbaikan</td>
				<td>:</td>
				<td>
					<?php echo tgl_indo($data['tanggal_perbaikan']); ?>
				</td>
			</tr>
			<tr>
				<td>Penanganan / Perbaikan</td>
				<td>:</td>
				<td>
					<?php echo $data['penanganan']; ?>
				</td>
			</tr>
			<tr>
				<td>Lama Perbaikan</td>
				<td>:</td>
				<td>
					<?php echo $data['lama_perbaikan']; ?>
				</td>
			</tr>
			<tr>
				<td>ID Teknisi Perbaikan</td>
				<td>:</td>
				<td>
					<?php echo $data['id_teknisi']; ?>
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
            <td align="center">Marabahan, <?php echo tgl_indo(date("Y-m-d")); ?></td>
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