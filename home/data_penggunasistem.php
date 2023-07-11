<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pengguna Sistem</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr align="center">
						<th>No</th>
						<th>Nama</th>		
						<th>Jenis Kelamin</th>		
						<th>Usia</th>		
						<th>Alamat</th>		
						<th>Posisi / Jabatan</th>		
						<th>Nomor HP</th>
					</tr>
				</thead>
				<tbody>

				<?php
              	$no = 1;
			  	$sql = $koneksi->query("SELECT * from tb_karyawan WHERE posisi='Teknisi Pemasangan' OR posisi='Admin' OR posisi='Sales' OR posisi='Teknisi Perbaikan'");
              	while ($data= $sql->fetch_assoc()) {
            	?>
					<tr align="center">
						<td>
							<?php echo $no++; ?>
						</td>
						<td align="left">
							<?php echo $data['nama_karyawan']; ?>
						</td>
                        <td>
							<?php echo $data['jenis_kelamin']; ?>
						</td>
                        <td>
							<?php 
                            $tglLahir = date_create($data['tanggal_lahir']);
                            $tahunLahir = date_format($tglLahir,"Y");
                            $tahunInt = (int)$tahunLahir;
                            $usia = 2023 - $tahunInt;
                            if($usia == 0){
                                echo "";
                            }else{
                                echo (string)$usia." Tahun";
                            }
                            ?>
						</td>
						<td align="left">
							<?php echo $data['alamat_karyawan']; ?>
						</td>
                        <td>
							<?php echo $data['posisi']; ?>
						</td>
						<td>
							<?php echo $data['no_hp_karyawan']; ?>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
	<!-- /.card-body -->