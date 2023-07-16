<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Karyawan</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-karyawan" class="btn btn-primary">
					<i class="fa fa-plus"></i> Tambah Data</a>		
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama karyawan</th>
						<th>NIK</th>
						<th>Jenis Kelamin</th>
						<th>Tempat, Tanggal Lahir</th>
						<th>Alamat</th>
						<th>Nomor HP</th>
						<th>Posisi/Jabatan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

				<?php
				$no = 1;
				$sql = $koneksi->query("SELECT * from tb_karyawan");
				while ($data= $sql->fetch_assoc()) {
				?>
					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						
						<td>
							<?php echo $data['nama_karyawan']; ?>
						</td>
						<td>
							<?php echo $data['nik_karyawan']; ?>
						</td>
						<td>
							<?php echo $data['jenis_kelamin']; ?>
						</td>
						<td>
							<?php echo $data['tempat_lahir'].", ".tgl_indo($data['tanggal_lahir']); ?>
						</td>
						<td>
							<?php echo $data['alamat_karyawan']; ?>
						</td>
						<td>
							<?php echo $data['no_hp_karyawan']; ?>
						</td>
						<td>
							<?php echo $data['posisi']; ?>
						</td>
						<td>
							<?php 
							$pos = $data['posisi'];
							if($pos != 'Admin' AND $pos != 'Sales' AND $pos != 'Teknisi Pemasangan' AND $pos != 'Teknisi Perbaikan'){
							?>
							<a href="?page=view-karyawan&kode=<?php echo $data['id']; ?>" title="Detail"
							 class="btn btn-info btn-sm">
								<i class="fa fa-eye"></i>
							</a>
							</a>
							<a href="?page=edit-karyawan&kode=<?php echo $data['id']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-karyawan&kode=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
							</a>
							<?php
							}elseif($pos = 'Admin' AND $pos = 'Sales' AND $pos = 'Teknisi Pemasangan' AND $pos = 'Teknisi Perbaikan'){
							?>
							<a href="?page=view-karyawan&kode=<?php echo $data['id']; ?>" title="Detail"
							 class="btn btn-info btn-sm">
								<i class="fa fa-eye"></i>
							</a>
							<?php
							}
							?>
							
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