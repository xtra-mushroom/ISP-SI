<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pemasangan (Read Only)</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="example2" class="table table-bordered table-striped">
				<thead>
					<tr align="center">
						<th>No</th>
						<th>ID Pemasangan</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Jenis Paket</th>
						<th>Total Biaya</th>
						<th>Tanggal Pasang</th>
						<th>Keterangan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

				<?php
              	$no = 1;
			  	$sql2 = $koneksi->query("SELECT pro.nama, pro.nik, pro.alamat, pro.jenis_paket, pem.id_pemasangan, pem.total_biaya, pem.tanggal_pasang, pem.keterangan FROM tb_promosi AS pro INNER JOIN tb_pemasangan AS pem ON pro.nik=pem.nik WHERE pro.status_pasang='SUDAH'");
              	while ($data= $sql2->fetch_assoc()) {
            	?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['id_pemasangan']; ?>
						</td>
						<td>
							<?php echo $data['nama']; ?>
						</td>
						<td>
							<?php echo $data['alamat']; ?>
						</td>
						<td>
							<?php echo $data['jenis_paket']; ?>
						</td>
						<td>
							<?php echo $data['total_biaya']; ?>
						</td>
						<td>
							<?php echo $data['tanggal_pasang']; ?>
						</td>
						<td>
							<?php echo $data['keterangan']; ?>
						</td>
						<td>
							<a href="?page=view-pemasangan&kode=<?php echo $data['id_pemasangan'];?>" title="Detail"
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