<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-newspaper"></i> Laporan Data Pelanggan
		</h3>
	</div>

	<?php
	$query = "SELECT * FROM tb_pelanggan";
	?>

	<div class="card-body">
			<form method="get" action="">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group my-2">
							<label>Filter Status Pelanggan</label>
                            <div class="input-group">
                                <select name="status" id="status" class="form-control">
									<?php
									$cari = $_GET['status'];
									$select1 = $select2 = "";
									if($cari == "Aktif"){
										$select1 = "selected";
									}elseif($cari == "Tidak Aktif"){
										$select2 = "selected";
									}elseif($cari == "Blacklist"){
										$select3 = "selected";
									}
									?>
                                    <option value="">--Pilih Status--</option>
                                    <option value="Aktif" <?php echo $select1 ?>>Aktif</option>
                                    <option value="Tidak Aktif" <?php echo $select2 ?>>Tidak Aktif</option>
                                    <option value="Blacklist" <?php echo $select3 ?>>Blacklist</option>
                                </select>
                                <button type="submit" name="page" value="laporan-pelanggan" class="btn btn-primary ml-3">TAMPILKAN</button>
							</div>
                        </div>   
                    </div>
                </div>
                                        
                <?php
                if(isset($_GET['status']))
                    echo '<a href="index.php?page=laporan-pelanggan" class="btn btn-sm btn-warning">RESET</a>';
                ?>
            </form>

			<?php 
            $status = @$_GET['status'];
            if(empty($status)){
                $query = "SELECT * FROM tb_pelanggan";
                $url_cetak = "admin/pelanggan/cetak.php";
                $label = "Status Pelanggan : <b>Semua Status Pelanggan</b>";
            }elseif($status == "Aktif"){  
                $query = "SELECT * FROM tb_pelanggan WHERE status_langganan = 'Aktif'";
                $url_cetak = "admin/pelanggan/cetak.php?status=Aktif";
                $label = 'Status Pelanggan : <b>Aktif</b>';
            }elseif($status == "Tidak Aktif"){
				$query = "SELECT * FROM tb_pelanggan WHERE status_langganan = 'Tidak Aktif'";
                $url_cetak = "admin/pelanggan/cetak.php?status=Tidak+Aktif";
                $label = 'Status Pelanggan : <b>Tidak Aktif</b>';
			}elseif($status == "Blacklist"){
				$query = "SELECT * FROM tb_pelanggan WHERE status_langganan = 'Blacklist'";
                $url_cetak = "admin/pelanggan/cetak.php?status=Blacklist";
                $label = 'Status Pelanggan : <b>Blacklist</b>';
			}
            ?> 

		<hr>

		<a href="<?php echo $url_cetak ?>" target="_blank">
			<button class="btn btn-success">Cetak PDF</button>
		</a>

		<div class="card-body">
			<?php echo $label ?>
			<div class="table-responsive mt-4">
				<table class="table table-bordered table-striped">
					<thead>
						<tr style="background-color: #343A40; color :aliceblue;" align="center">
							<th>No</th>
							<th>ID Pelanggan</th>
							<th>Nama</th>
							<th>Nik</th>
							<th>Alamat</th>
							<th>Nomor HP</th>
							<th>Jenis Paket</th>
							<th>Status Langganan</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$no = 1;
						$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
						$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
						if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
							while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
								echo "<tr>";
								echo "<td>" . $no++ . "</td>";
								echo "<td>" . $data['id_pelanggan'] . "</td>";
								echo "<td>" . $data['nama_pelanggan'] . "</td>";
								echo "<td>" . $data['nik_pelanggan'] . "</td>";
								echo "<td>" . $data['alamat_pelanggan'] . "</td>";
								echo "<td>" . $data['no_hp_pelanggan'] . "</td>";
								echo "<td align='center'>" . $data['jenis_paket'] . "</td>";
								echo "<td align='center'>" . $data['status_langganan'] . "</td>";
								echo "</tr>";
							}
						}else{ // Jika data tidak ada
							echo "<tr><td colspan='8' align='center' style='color:grey;font-style:italic'>Data tidak ditemukan</td></tr>";
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- Include File JS Bootstrap -->
		<script src="../assets/js/bootstrap.min.js"></script>
		<!-- Include library Bootstrap Datepicker -->
		<script src="../assets/libraries/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
		<!-- Include File JS Custom (untuk fungsi Datepicker) -->
		<script src="../assets/js/custom.js"></script>
		<script>
			$(document).ready(function() {
				setDateRangePicker(".nip", ".nip")
			})
		</script>
	</div>
</div>
