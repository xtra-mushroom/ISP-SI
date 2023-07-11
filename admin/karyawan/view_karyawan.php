<?php
if(isset($_GET['kode'])){
    $sql_cek = "SELECT * FROM tb_karyawan WHERE id='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>
<div class="row">
	<div class="col-md-8">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Data karyawan</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 200px">
								<b>Nama</b>
							</td>
							<td>:
								<?php echo $data_cek['nama_karyawan']; ?>
							</td>
						</tr>

						<tr>
							<td>
								<b>NIK</b>
							</td>
							<td>:
								<?php echo $data_cek['nik_karyawan']; ?>
							</td>
						</tr>

						<tr>
							<td>
								<b>Jenis kelamin</b>
							</td>
							<td>:
								<?php echo $data_cek['jenis_kelamin']; ?>
							</td>
						</tr>

						<tr>
							<td>
								<b>Tempat, Tanggal Lahir</b>
							</td>
							<td>:
								<?php echo $data_cek['tempat_lahir'].", ".tgl_indo($data_cek['tanggal_lahir']); ?>
							</td>
						</tr>

						<tr>
							<td>
								<b>Jenis kelamin</b>
							</td>
							<td>:
								<?php echo $data_cek['jenis_kelamin']; ?>
							</td>
						</tr>
						
						<tr>
							<td>
								<b>Alamat</b>
							</td>
							<td>:
								<?php echo $data_cek['alamat_karyawan']; ?>
							</td>
						</tr>

						<tr>
							<td>
								<b>Posisi/Jabatan</b>
							</td>
							<td>:
								<?php echo $data_cek['posisi']; ?>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="card-footer float-right">
					<a href="?page=data-karyawan" class="btn btn-warning">Kembali</a>
					<!-- <a href="./report/cetak_karyawan.php?nik=" target=" _blank"
					 title="Cetak Data Karyawan" class="btn btn-primary">Print</a> -->
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card card-success">
			<div class="card-header">
				<center>
					<h3 class="card-title">
						Foto
					</h3>
				</center>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body">
				<div class="text-center">
					<img src="profil&gaji/fotokaryawan/<?php echo $data_cek['foto']; ?>" width="280px" />
				</div>

			</div>
			<div class="card-footer">
				<h5 class="text-center">
					<?php echo $data_cek['nama_karyawan']; ?>
					-
					<?php echo $data_cek['id']; ?>
				</h5>
			</div>
		</div>
	</div>

</div>