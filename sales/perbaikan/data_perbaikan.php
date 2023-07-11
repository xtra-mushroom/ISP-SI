<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Perbaikan (Read Only)</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="example2" class="table table-bordered table-striped">
				<thead>
					<tr align="center">
						<th>No</th>
						<th>ID Pelanggan</th>
						<th>ID Keluhan</th>		
						<th>Tanggal Keluhan</th>
						<th>Tanggal Perbaikan</th>
						<th>Status Penanganan</th>
						<th>ID Teknisi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

				<?php
              	$no = 1;
			  	$sql2 = $koneksi->query("SELECT tb_keluhan.id_keluhan, tb_keluhan.tanggal_keluhan, tb_keluhan.id_pelanggan, tb_keluhan.status_penanganan, tb_perbaikan.id_perbaikan, tb_perbaikan.tanggal_perbaikan, tb_perbaikan.id_teknisi FROM tb_keluhan INNER JOIN tb_perbaikan ON tb_keluhan.id_keluhan = tb_perbaikan.id_keluhan WHERE tb_keluhan.status_penanganan='Sudah Ditangani'");
              	while ($data2 = $sql2->fetch_assoc()) {
            	?>
					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data2['id_pelanggan']; ?>
						</td>
						<td>
							<?php echo $data2['id_keluhan']; ?>
						</td>
						<td>
							<?php echo $data2['tanggal_keluhan']; ?>
						</td>
						<td>
							<?php echo $data2['tanggal_perbaikan']; ?>
						</td>
						<td>
							<span class="badge badge-success"><?php echo $data2['status_penanganan']; ?></span>
						</td>
						<td>
							<?php echo $data2['id_teknisi']; ?>
						</td>
						<td>
							<a href="?page=view-perbaikan-sales&kode=<?php echo $data2['id_perbaikan'];?>&pel=<?php echo $data2['id_pelanggan'];?>" title="Detail"
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
</div>