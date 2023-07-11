<?php
if(isset($_GET['kode'])){
    $nik = $_GET['kode'];
    $sql_cek = "SELECT * FROM tb_promosi INNER JOIN tb_karyawan ON id_sales = id WHERE nik='$nik'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    // var_dump($sql_cek);
}
?>
<div class="row">
	<div class="col-md-8">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Data Antrian Pemasangan</h3>
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
								<b>Nama Sales</b>
							</td>
							<td>:
								<?php echo $data['nama_karyawan']; ?>
							</td>
						</tr>
                        <tr>
							<td style="width: 150px">
								<b>Nomor HP Sales</b>
							</td>
							<td>:
								<?php echo $data['no_hp_karyawan']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Status Pasang</b>
							</td>
							<td>:
								<span class="badge badge-danger"><?php echo $data['status_pasang'] ?></span>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="card-footer float-right">
					<a href="?page=data-pemasangan-teknisipemasangan" class="btn btn-warning">Kembali</a>
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