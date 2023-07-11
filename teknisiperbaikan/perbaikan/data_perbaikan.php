<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Antrian Perbaikan</h3>
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
						<th>Alamat</th>
						<th>Nomor HP</th>
						<th>Tanggal Keluhan</th>
						<th>Isi Keluhan</th>
						<th>Status Penanganan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

				<?php
              	$no = 1;
			  	$sql = $koneksi->query("SELECT tb_keluhan.*, tb_pelanggan.nama_pelanggan, tb_pelanggan.alamat_pelanggan, tb_pelanggan.no_hp_pelanggan FROM tb_keluhan INNER JOIN tb_pelanggan ON tb_keluhan.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_keluhan.status_penanganan='Belum Ditangani'");
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
							<?php echo $data['alamat_pelanggan']; ?>
						</td>
						<td>
							<?php echo $data['no_hp_pelanggan']; ?>
						</td>
						<td>
							<?php echo $data['tanggal_keluhan']; ?>
						</td>
						<td>
							<?php echo $data['isi_keluhan']; ?>
						</td>
						<td align="center">
							<span class="badge badge-danger"><?php echo $data['status_penanganan'] ?></span>
						</td>
						
						<td>
							<a href="?page=view-keluhan&kode=<?php echo $data['id_keluhan']; ?>" title="Detail"
								class="btn btn-info btn-sm">
								<i class="fa fa-eye"></i>
							</a>
							<a href="?page=add-perbaikan&kode=<?php echo $data['id_keluhan'];?>&pel=<?php echo $data['id_pelanggan'];?>" title="Input Data Perbaikan" class="btn btn-success btn-sm">
								<i class="fa fa-plus"></i> Input Perbaikan
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

<!-- /.card-body -->
<div class="card card-info mt-3">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Perbaikan (Sudah Diperbaiki)</h3>
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
							<a href="?page=view-perbaikan-teknisiperbaikan&kode=<?php echo $data2['id_perbaikan'];?>&pel=<?php echo $data2['id_pelanggan'];?>" title="Detail"
								class="btn btn-info btn-sm">
								<i class="fa fa-eye"></i>
							</a>
							<a href="?page=edit-perbaikan-teknisiperbaikan&kode=<?php echo $data2['id_perbaikan'];?>&pel=<?php echo $data2['id_pelanggan'];?>" title="Edit" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-perbaikan-teknisiperbaikan&kode=<?php echo $data2['id_perbaikan'];?>&pel=<?php echo $data2['id_pelanggan'];?>" title="Delete" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class="btn btn-danger btn-sm">
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
</div>