<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Promosi</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-promosi-sales" class="btn btn-primary">
					<i class="fa fa-plus"></i> Tambah Data Promosi
				</a>	
			</div>
			<br>
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
			  	$sql = $koneksi->query("SELECT * from tb_promosi");
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
						<td align="center">
							<?php echo $data['tanggal_deal']; ?>
						</td>
						<td align="center">
							<?php 
							if($data['status_pasang'] == "BELUM"){
								echo "<span class='badge badge-danger'>".$data['status_pasang']."</span>";
							}elseif($data['status_pasang'] == "SUDAH"){
								echo "<span class='badge badge-success'>".$data['status_pasang']."</span>";
							}else{
								echo "-";
							}
							?>
						</td>
						
						<td>
							<?php 
							if($data['status_pasang'] == "BELUM"){
							?>
								<a href="?page=view-promosi-sales&kode=<?php echo $data['nik']; ?>" title="Detail" class="btn btn-info btn-sm">
									<i class="fa fa-eye"></i>
								</a>
								<a href="?page=edit-promosi-sales&kode=<?php echo $data['nik']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-promosi-sales&kode=<?php echo $data['nik']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
									title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
								</a>
							<?php 
							}elseif($data['status_pasang'] == "SUDAH"){
							?>
								<a href="?page=view-promosi-sales&kode=<?php echo $data['nik']; ?>" title="Detail" class="btn btn-info btn-sm">
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