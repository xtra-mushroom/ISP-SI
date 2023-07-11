<?php
if(isset($_GET['kode']) && isset($_GET['pel'])){
	$idPerbaikan = $_GET['kode'];
	$idPelanggan = $_GET['pel'];
    $sql_cek = "SELECT tb_keluhan.id_keluhan, tb_keluhan.id_pelanggan, tb_keluhan.tanggal_keluhan, tb_keluhan.isi_keluhan, tb_perbaikan.tanggal_perbaikan, tb_perbaikan.penanganan, tb_perbaikan.lama_perbaikan, tb_perbaikan.id_teknisi, tb_pelanggan.nama_pelanggan, tb_pelanggan.alamat_pelanggan FROM tb_keluhan INNER JOIN tb_perbaikan ON tb_keluhan.id_keluhan = tb_perbaikan.id_keluhan INNER JOIN tb_pelanggan ON tb_perbaikan.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_keluhan.status_penanganan='Sudah Ditangani'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>
<div class="row">
	<div class="col-md-12">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Data Perbaikan</h3>
				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 250px">
								<b>ID Pelanggan</b>
							</td>
							<td>:
								<?php echo $data_cek['id_pelanggan']; ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>Nama Pelanggan</b>
							</td>
							<td>:
								<?php echo $data_cek['nama_pelanggan']; ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>Alamat Pelanggan</b>
							</td>
							<td>:
								<?php echo $data_cek['alamat_pelanggan']; ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>ID Keluhan</b>
							</td>
							<td>:
								<?php echo $data_cek['id_keluhan']; ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>Tanggal Keluhan</b>
							</td>
							<td>:
								<?php echo $data_cek['tanggal_keluhan']; ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>Isi Keluhan</b>
							</td>
							<td>:
								<?php echo $data_cek['isi_keluhan']; ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>Tanggal Perbaikan</b>
							</td>
							<td>:
								<?php echo $data_cek['tanggal_perbaikan']; ?>
							</td>
						</tr>

						<tr>
							<td>
								<b>Penanganan / Perbaikan</b>
							</td>
							<td>:
								<?php echo $data_cek['penanganan']; ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>Lama Perbaikan</b>
							</td>
							<td>:
								<?php echo $data_cek['lama_perbaikan']; ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>ID Teknisi Perbaikan</b>
							</td>
							<td>:
								<?php echo $data_cek['id_teknisi']; ?>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="card-footer float-right">
					<a href="?page=data-perbaikan-sales" class="btn btn-warning">Kembali</a>

					<a href="./report/cetak_perbaikan.php?nik=<?php echo $data_cek['nik']; ?>" target="_blank"
					 title="Cetak Data Perbaikan" class="btn btn-primary">Print</a>
				</div>
			</div>
		</div>
	</div>
</div>