<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Promosi (Deal Indihome dan Penjualan Modem)</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr align="center">
						<th>No</th>
						<th>Nama</th>		
						<th>Alamat</th>
						<th>Jenis Paket</th>
						<th>Tanggal Deal</th>
						<th>Status Pasang</th>
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