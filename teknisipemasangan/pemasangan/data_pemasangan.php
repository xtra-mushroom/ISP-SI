<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Antrian Pemasangan</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<!-- <div>
				<a href="?page=add-pemasangan-teknisipemasangan" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data
				</a>
			<br> -->
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr align="center">
						<th>No</th>
						<th>Nama</th>		
						<th>Alamat</th>
						<th>Jenis Paket</th>
						<th>Tanggal Deal</th>
						<th>Status Pasang</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

				<?php
              	$no = 1;
			  	$sql = $koneksi->query("SELECT * FROM tb_promosi WHERE status_pasang = 'BELUM'");
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
							<?php echo $data['alamat']; ?>
						</td>
						<td>
							<?php echo $data['jenis_paket']; ?>
						</td>
						<td>
							<?php echo $data['tanggal_deal']; ?>
						</td>
						<td align="center">
							<?php 
							if($data['status_pasang'] == NULL){
								$status = "BELUM";
							}else{
								$status = $data['status_pasang'];
							}
							?>
							<span class="badge badge-danger"><?php echo $status ?></span>
						</td>
						
						<td>
							<a href="?page=view-antripemasangan-teknisipemasangan&kode=<?php echo $data['nik']; ?>" title="Detail"
								class="btn btn-info btn-sm">
								<i class="fa fa-eye"></i>
							</a>
							<a href="?page=add-pemasangan-teknisipemasangan&kode=<?php echo $data['nik']; ?>" title="Input Data Pemasangan" class="btn btn-success btn-sm">
								<i class="fa fa-plus"></i> Input Pemasangan
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
			<i class="fa fa-table"></i> Data Pemasangan (Sudah Terpasang)</h3>
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
							<?php echo rupiah($data['total_biaya']); ?>
						</td>
						<td>
							<?php echo $data['tanggal_pasang']; ?>
						</td>
						<td>
							<?php echo $data['keterangan']; ?>
						</td>
						<td>
							<a href="?page=view-pemasangan-teknisipemasangan&kode=<?php echo $data['id_pemasangan'];?>" title="Detail"
								class="btn btn-info btn-sm">
								<i class="fa fa-eye"></i>
							</a>
							<a href="?page=edit-pemasangan-teknisipemasangan&kode=<?php echo $data['id_pemasangan'];?>" title="Edit" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-pemasangan-teknisipemasangan&kode=<?php echo $data['id_pemasangan'];?>&nik=<?php echo $data['nik'];?>" title="Delete" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class="btn btn-danger btn-sm">
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