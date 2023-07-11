<?php
if(isset($_GET['kode'])){
    $id = $_GET['kode'];
    $sql_cek = "SELECT tb_promosi.nama, tb_promosi.alamat, tb_promosi.nomor_hp, tb_promosi.jenis_paket, tb_promosi.lalong_val, tb_pemasangan.* FROM tb_promosi INNER JOIN tb_pemasangan ON tb_promosi.nik = tb_pemasangan.nik WHERE tb_pemasangan.id_pemasangan ='$id'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    // var_dump($sql_cek);
}
?>
<div class="row">
	<div class="col-md-8">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Data Pemasangan</h3>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 250px">
								<b>Nama</b>
							</td>
							<td>:
								<?php echo $data['nama']; ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>NIK</b>
							</td>
							<td>:
								<?php echo $data['nik']; ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>Alamat</b>
							</td>
							<td>:
								<?php echo $data['alamat']; ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>Nomor HP</b>
							</td>
							<td>:
								<?php echo $data['nomor_hp']; ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>Jenis Paket</b>
							</td>
							<td>:
								<?php echo $data['jenis_paket']; ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>Tanggal Pasang</b>
							</td>
							<td>:
								<?php echo $data['tanggal_pasang']; ?>
							</td>
						</tr>
                        <tr>
							<td>
								<b>Total Biaya Pemasangan</b>
							</td>
							<td>:
								<?php echo $data['total_biaya']; ?>
							</td>
						</tr>
                        <tr>
							<td>
								<b>ID Pelanggan</b>
							</td>
							<td>:
								<?php echo $data['id_pelanggan']; ?>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="card-footer float-right">
					<a href="?page=data-pemasangan-sales" class="btn btn-warning">Kembali</a>
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