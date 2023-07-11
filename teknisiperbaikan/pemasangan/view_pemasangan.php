<?php
if(isset($_GET['kode'])){
    $sql_cek = "SELECT * from tb_pemasangan WHERE nik='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>
<div class="row">

	<div class="col-md-8">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Data Pemasangan</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 150px">
								<b>Nama</b>
							</td>
							<td>:
								<?php echo $data_cek['nama']; ?>
							</td>
						</tr>

						<tr>
							<td style="width: 150px">
								<b>NIK</b>
							</td>
							<td>:
								<?php echo $data_cek['nik']; ?>
							</td>
						</tr>

						<tr>
							<td style="width: 150px">
								<b>ID Pelanggan</b>
							</td>
							<td>:
								<?php echo $data_cek['id_pelanggan']; ?>
							</td>
						</tr>
						
						<tr>
							<td style="width: 150px">
								<b>Bonus</b>
							</td>
							<td>:
								<?php echo $data_cek['bonus']; ?>
							</td>
						</tr>
						
						<tr>
							<td style="width: 150px">
								<b>Keterangan</b>
							</td>
							<td>:
								<?php echo $data_cek['keterangan']; ?>
							</td>
						</tr>
										
					</tbody>
				</table>
				<div class="card-footer">
					<a href="?page=data-pemasangan-teknisiperbaikan" class="btn btn-warning">Kembali</a>

					<a href="./report/cetak_pemasangan.php?nik=<?php echo $data_cek['nik']; ?>" target=" _blank"
					 title="Cetak Data Pemasangan" class="btn btn-primary">Print</a>
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
					<img src="foto/<?php echo $data_cek['foto']; ?>" width="280px" />
				</div>

				<h3 class="profile-username text-center">
					<?php echo $data_cek['nama']; ?>
					-
					<?php echo $data_cek['id_pelanggan']; ?>
				</h3>
			</div>
		</div>
	</div>

</div>