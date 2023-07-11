<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Gaji Karyawan</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-gaji" class="btn btn-primary">
					<i class="fa fa-plus"></i> Tambah Data</a>	
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead align="center">
					<tr>
						<th>No</th>
						<th>ID Karyawan</th>
						<th>Posisi / Jabatan</th>
						<th>Gaji Pokok</th>
						<th>Bonus</th>
						<th>Total Gaji</th>
						<th>Bulan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

				<?php
              	$no = 1;
			  	$sql = $koneksi->query("SELECT * from tb_gaji");
              	while ($data= $sql->fetch_assoc()) {
            	?>
					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['id_karyawan']; ?>
						</td>
						<td>
							<?php echo $data['posisi']; ?>
						</td>
						<td align="right">
							<?php echo rupiah($data['gaji_pokok']); ?>
						</td>
						<td align="right">
							<?php echo rupiah($data['bonus']); ?>
						</td>
						<td align="right">
							<?php 
							$totalGaji = $data['gaji_pokok'] + $data['bonus'];
							echo rupiah($totalGaji);
							?>
						</td>
						<td>
							<?php 
							$bulan = $data['bulan']." - ".$data['tahun'];
							echo $bulan;
							?>
						</td>
						
						<td align="center">
							</a>
							<a href="?page=edit-gaji&kode=<?php echo $data['id_gaji']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-gaji&kode=<?php echo $data['id_gaji']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
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