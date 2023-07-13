<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pelanggan (Read Only)</h3>
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
					</tr>
				</thead>
				<tbody>

				<?php
				$no = 1;
				$sql = $koneksi->query("SELECT * from tb_pelanggan");
				while ($data= $sql->fetch_assoc()) {
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
						<td align="center">
							<?php echo $data['jenis_paket']; ?>
						</td>
						<td align="center">
							<?php echo $data['status_langganan']; ?>
						</td>
						
						<!-- <td>
							<a href="?page=view-pelanggan-teknisipemasangan&kode=" title="Detail"
							 class="btn btn-info btn-sm">
								<i class="fa fa-eye"></i>
							</a>
						</td> -->
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