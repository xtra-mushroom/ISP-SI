<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pengguna Sistem
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-pengguna" class="btn btn-primary">
					<i class="fa fa-plus"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr style="background-color:#343A40; color :aliceblue;" class="text-center">
						<th>No</th>
						<th>ID Karyawan</th>
						<th>Nama</th>
						<th>Username</th>
						<th>Level</th>
						<th>Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT * FROM tb_pengguna");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td align="center">
								<?php echo $no++; ?>
							</td>
							<td align='center'>
								<?php echo $data['id_pengguna']; ?>
							</td>
							<td>
								<?php echo $data['nama_pengguna']; ?>
							</td>
							<td>
								<?php echo $data['username']; ?>
							</td>
							<td align='center'>
								<?php echo $data['level']; ?>
							</td>
							<td align="center">
								<a href="?page=del-pengguna&kode=<?php echo $data['id_pengguna']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>

					<?php
					}
					?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->