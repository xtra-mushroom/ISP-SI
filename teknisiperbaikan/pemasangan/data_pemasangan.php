<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pemasangan (Read Only)</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>NIK</th>
						<th>ID Pelanggan</th>
						<th>Bonus</th>
						<th>Keterangan</th>
						<th>Foto</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

				<?php
				$no = 1;
				$sql = $koneksi->query("SELECT * from tb_pemasangan");
				while ($data= $sql->fetch_assoc()) {
				?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						
						<td>
							<?php echo $data['nama']; ?>
						</td>
						<td>
							<?php echo $data['nik']; ?>
						</td>
						<td>
							<?php echo $data['id_pelanggan']; ?>
						</td>
						<td>
							<?php echo $data['bonus']; ?>
						</td>
						<td>
							<?php echo $data['keterangan']; ?>
						</td>
						
						<td align="center">
							<img src="foto/<?php echo $data['foto']; ?>" width="70px" />
						</td>
						
						<td>
						<a href="?page=view-pemasangan-teknisiperbaikan&kode=<?php echo $data['nik']; ?>" title="Detail"
							 class="btn btn-info btn-sm">
							<i class="fa fa-eye"></i>
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