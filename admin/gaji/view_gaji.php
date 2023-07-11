<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_gaji WHERE nik='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="row">

	<div class="col-md-8">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Gaji</h3>

				
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 150px">
								<b>Nama</b>
							</td>
							<td>:
								<?php echo $data_cek['nama']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>NIK</b>
							</td>
							<td>:
								<?php echo $data_cek['nik']; ?>
							</td>
						</tr>
						
						<tr>
							<td style="width: 150px">
								<b>Jumlah Gaji Pokok</b>
							</td>
							<td>:
								<?php echo $data_cek['jumlah_gaji_pokok']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Jumlah Bonus</b>
							</td>
							<td>:
								<?php echo $data_cek['jumlah_bonus']; ?>
							</td>
						</tr>
						
						
						
					</tbody>
				</table>
				<div class="card-footer">
					<a href="?page=data-gaji" class="btn btn-warning">Kembali</a>

					<a href="./report/cetak-gaji.php?nik=<?php echo $data_cek['nik']; ?>" target=" _blank"
					 title="Cetak Data Gaji" class="btn btn-primary">Print</a>
				</div>
			</div>
		</div>
	</div>

	

</div>