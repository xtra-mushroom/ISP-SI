<?php
$sql_cek = "SELECT * FROM tb_karyawan WHERE id=$data_id";
$query_cek = mysqli_query($koneksi, $sql_cek);
$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
?>
<div class="row">
	<div class="col-md-8">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Profil Anda</h3>

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
								<b>ID Karyawan</b>
							</td>
							<td>:
								<?php echo $data_cek['id']; ?>
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
								<b>Jenis Kelamin</b>
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
								<b>Alamat</b>
							</td>
							<td>:
								<?php echo $data_cek['alamat_karyawan']; ?>
							</td>
						</tr>
						
						<tr>
							<td>
								<b>Posisi</b>
							</td>
							<td>:
								<?php echo $data_cek['posisi']; ?>
							</td>
						</tr>

                        <tr>
							<td>
								<b>Nomor HP</b>
							</td>
							<td>:
								<?php echo $data_cek['no_hp_karyawan']; ?>
							</td>
						</tr>
										
					</tbody>
				</table>
				<div class="card-footer float-right">
                    <a href="?page=edit-data-profil&id=<?php echo $data_cek['id']; ?>" class="btn btn-success">Edit Profil</a>
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
					<img src="profil&gaji/fotokaryawan/<?php echo $data_cek['foto']; ?>" height="255px" />
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

<div class="row">
	<div class="col-md-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Riwayat Gaji Anda</h3>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead align="center">
							<tr>
								<th>No</th>
								<th>ID Karyawan</th>
								<th>Gaji Pokok</th>
								<th>Bonus</th>
								<th>Total Gaji</th>
								<th>Bulan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT * from tb_gaji WHERE id_karyawan=$data_id");
						while ($data= $sql->fetch_assoc()) {
						?>
							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['id_karyawan']; ?>
								</td>
								<td align="right">
									<?php echo rupiah($data['gaji_pokok']); ?>
								</td>
								<td align="right">
									<?php echo rupiah($data['bonus']); ?>
								</td>
								<td align="right">
									<?php 
									$totalGaji = $data['gaji_pokok'] + $data['bonus'];
									echo rupiah($totalGaji);
									?>
								</td>
								<td align="center">
									<?php 
									$bulan = $data['bulan']."-".$data['tahun'];
									echo $bulan;
									?>
								</td>
								
								<td align="center">
									<a href="./profil&gaji/cetak-slip-gaji.php?kode=<?php echo $data['id_gaji']; ?>&karyawan=<?php echo $data_id; ?>" title="Cetak Slip Gaji" target="_blank" class="btn btn-warning btn-sm">
										<i class="fa fa-print"></i>
									</a>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>