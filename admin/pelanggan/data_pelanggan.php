<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pelanggan (Update Only)</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr align="center">
						<th>No</th>
						<th>ID Pelanggan</th>
						<th>Nama</th>
						<th>NIK</th>
						<th>Alamat</th>
						<th>Nomor HP</th>
						<th>Jenis Paket</th>
						<th>Status Pelanggan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

				<?php
				$no = 1;
				$sql = $koneksi->query("SELECT * from tb_pelanggan");
				while($data= $sql->fetch_assoc()){
				?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>

						<td>
							<?php echo $data['id_pelanggan']; ?>
						</td>
						
						<td>
							<?php echo $data['nama_pelanggan']; ?>
						</td>
						<td>
							<?php echo $data['nik_pelanggan']; ?>
						</td>
						<td>
							<?php echo $data['alamat_pelanggan']; ?>
						</td>
						<td>
							<?php echo $data['no_hp_pelanggan']; ?>
						</td>
						<td>
							<?php echo $data['jenis_paket']; ?>
						</td>
						<td align="center">
							<?php echo $data['status_langganan']; ?>
						</td>
						<td align="center">
							<a href="?page=edit-pelanggan&kode=<?php echo $data['id_pelanggan']; ?>" title="Edit" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
						</td>
					</tr>

					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
	<!-- /.card-body -->