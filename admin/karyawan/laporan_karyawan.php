<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-newspaper"></i> Laporan Data Karyawan
		</h3>
	</div>

	<?php
	$query = "SELECT * FROM tb_karyawan";
	// $url_cetak = "admin/karyawan/cetak.php";
	?>

	<div style="padding: 15px;">
		<form method="POST">
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="form-group">
					</div>
				</div>
			</div>
		</form>
		<div>
			</h6>
			

			<form method="get" action="">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group my-2">
							<label>Filter Tipe</label>
                            <div class="input-group">
                                <select name="tipe" id="tipe" class="form-control">
									<?php
									$cari = $_GET['tipe'];
									$select1 = $select2 = "";
									if($cari == "Pengguna Sistem"){
										$select1 = "selected";
									}elseif($cari == "Non Pengguna Sistem"){
										$select2 = "selected";
									}
									?>
                                    <option value="">--Pilih Tipe--</option>
                                    <option value="Pengguna Sistem" <?php echo $select1 ?>>Pengguna Sistem</option>
                                    <option value="Non Pengguna Sistem" <?php echo $select2 ?>>Non Pengguna Sistem</option>
                                </select>
                                <button type="submit" name="page" value="laporan-karyawan" class="btn btn-primary ml-3">TAMPILKAN</button>
							</div>
                        </div>   
                    </div>
                </div>
                                        
                <?php
                if(isset($_GET['tipe']))
                    echo '<a href="index.php?page=laporan-karyawan" class="btn btn-sm btn-default">RESET</a>';
                ?>
            </form>
		</div>

			<?php 
            $tipe = @$_GET['tipe'];
            if(empty($tipe)){
                $query = "SELECT * FROM tb_karyawan";
                $url_cetak = "admin/karyawan/cetak.php";
                $label = "Tipe Karyawan : <b>Semua Tipe</b>";
            }elseif($tipe == "Pengguna Sistem"){  
                $query = "SELECT * FROM tb_karyawan WHERE posisi = 'Admin' OR posisi = 'Sales' OR posisi = 'Teknisi Pemasangan' OR posisi = 'Teknisi Perbaikan'";
                $url_cetak = "admin/karyawan/cetak.php?tipe=Pengguna+Sistem";
                $label = 'Tipe Karyawan : <b>Pengguna Sistem</b>';
            }elseif($tipe == "Non Pengguna Sistem"){
				$query = "SELECT * FROM tb_karyawan WHERE posisi != 'Admin' AND posisi != 'Sales' AND posisi != 'Teknisi Pemasangan' AND posisi != 'Teknisi Perbaikan'";
                $url_cetak = "admin/karyawan/cetak.php?tipe=Non+Pengguna+Sistem";
                $label = 'Tipe Karyawan : <b>Non Pengguna Sistem</b>';
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
							<th>NIK</th>
							<th>Nama</th>
							<th>Jenis Kelamin</th>
							<th>Tempat, Tanggal Lahir</th>
							<th>Alamat</th>
							<th>Nomor HP</th>
							<th>Posisi/Jabatan</th>
							<!-- <th>Rata-Rata Gaji Pokok</th>	 -->
						</tr>
					</thead>

					<tbody>
						<?php
						$no = 1;
						$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
						$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
						if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
							while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
								echo "<tr>";
								echo "<td>" . $no++ . "</td>";
								echo "<td>" . $data['nik_karyawan'] . "</td>";
								echo "<td>" . $data['nama_karyawan'] . "</td>";
								echo "<td>" . $data['jenis_kelamin'] . "</td>";
								echo "<td>" . $data['tempat_lahir'].", ".tgl_indo($data['tanggal_lahir']) . "</td>";
								echo "<td>" . $data['alamat_karyawan'] . "</td>";
								echo "<td>" . $data['no_hp_karyawan'] . "</td>";
								echo "<td align='center'>" . $data['posisi'] . "</td>";
								// echo "<td>" . rupiah($data['rerata_gaji_pokok']) . "</td>";
								
								echo "</tr>";
							}
						} else { // Jika data tidak ada
							echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
						}
						?>
					</tbody>
					</tfoot>
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
		</body>

		</html>