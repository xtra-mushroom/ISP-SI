<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Keluhan</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-keluhan" class="btn btn-primary">
					<i class="fa fa-plus mr-2"></i>Tambah Data
				</a>	
			</div>
			<br>
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
			  	$sql = $koneksi->query("SELECT tb_keluhan.*, tb_pelanggan.nama_pelanggan, tb_pelanggan.alamat_pelanggan, tb_pelanggan.no_hp_pelanggan FROM tb_keluhan INNER JOIN tb_pelanggan ON tb_keluhan.id_pelanggan = tb_pelanggan.id_pelanggan");
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
						<td align="center">
							<?php echo $data['tanggal_keluhan']; ?>
						</td>
                        <td>
							<?php echo $data['isi_keluhan']; ?>
						</td>
						<td align="center">
							<?php 
							if($data['status_penanganan'] == "Belum Ditangani"){
								echo "<span class='badge badge-danger'>".$data['status_penanganan']."</span>";
							}elseif($data['status_penanganan'] == "Sudah Ditangani"){
								echo "<span class='badge badge-success'>".$data['status_penanganan']."</span>";
							}else{
								echo "-";
							}
							?>
						</td>
						
						<td>
							<?php 
							if($data['status_penanganan'] == "Belum Ditangani"){
							?>
								<a href="?page=view-keluhan&kode=<?php echo $data['id_keluhan']; ?>&pel=<?php echo $data['id_pelanggan']; ?>" title="Detail" class="btn btn-info btn-sm">
									<i class="fa fa-eye"></i>
								</a>
								<a href="?page=edit-keluhan&kode=<?php echo $data['id_keluhan']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-keluhan&kode=<?php echo $data['id_keluhan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
									title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
								</a>
							<?php
							}elseif($data['status_penanganan'] == "Sudah Ditangani"){
							?>
								<a href="?page=view-keluhan&kode=<?php echo $data['id_keluhan']; ?>&pel=<?php echo $data['id_pelanggan']; ?>" title="Detail" class="btn btn-info btn-sm">
									<i class="fa fa-eye"></i>
								</a>
							<?php } ?>
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