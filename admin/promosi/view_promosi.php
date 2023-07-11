<?php
if(isset($_GET['kode'])){
    $sql_cek = "SELECT * from tb_promosi WHERE nik='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>
<div class="row">

	<div class="col-md-8">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Data Promosi</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 150px">
								<b>Nama</b>
							</td>
							<td>:
								<?php echo $data['nama']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>NIK</b>
							</td>
							<td>:
								<?php echo $data['nik']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Alamat</b>
							</td>
							<td>:
								<?php echo $data['alamat']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Nomor HP</b>
							</td>
							<td>:
								<?php echo $data['nomor_hp']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Jenis Paket</b>
							</td>
							<td>:
								<?php echo $data['jenis_paket']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Tanggal Deal</b>
							</td>
							<td>:
								<?php echo $data['tanggal_deal']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Jenis Paket</b>
							</td>
							<td>:
								<?php echo $data['jenis_paket']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Status Pasang</b>
							</td>
							<td>:
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
					</tbody>
				</table>
				<div class="card-footer">
					<a href="?page=data-promosi" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card card-success">
			<div class="card-header">
				<center>
					<h3 class="card-title">
						Peta Lokasi
					</h3>
				</center>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body">
				<div id="map" style="width: 600px; height: 400px;"></div>
                    <script>
                        var map = L.map('map').setView([<?= $data["lalong_val"] ?>], 13);

                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map);

                        L.marker([<?= $data["lalong_val"] ?>]).addTo(map)
                            .bindPopup('<?= $data["nama"] ?><br> <?= $data["alamat"] ?>')
                            .openPopup();
                    </script>
                </div>
			</div>
		</div>
	</div>

</div>