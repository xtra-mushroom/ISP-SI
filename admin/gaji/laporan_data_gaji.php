<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Laporan Data Gaji
		</h3>
	</div>

	<!-- <style>
		. {}
	</style> -->

	<?php
	// Load file koneksi.php
	include "koneksi.php";
	
		$query = "select tb_gaji.*, tb_karyawan.nik,  tb_karyawan.bidang_pekerjaan from tb_gaji
		inner join  tb_karyawan on tb_gaji.nik =  tb_karyawan.nik";
		$url_cetak = "admin/gaji/cetak.php";
		$label = "( Semua Data Gaji )";
	
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
			<h6 style="margin-left: auto;"><b>Laporan Data Gaji</b>
				<?php echo $label ?>
			</h6>
			<a href="<?php echo $url_cetak ?>">
				<button class="btn btn-success">Cetak PDF</button>
			</a>
		</div>
		<hr />
		<div class="card-body">
			<div class="table-responsive" style="margin-top: auto;">
				<br>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr style="background-color: #343A40; color :aliceblue;">
							<th>No</th>
							
							<th>nama</th>
							<th>nik</th>
						
							<th>jumlah_gaji_pokok</th>
							<th>jumlah_bonus</th>
							<th>bidang</th>
							
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
								
								echo "<td>" . $data['nama'] . "</td>";
								
								echo "<td>" . $data['nik'] . "</td>";
							
								echo "<td>" . $data['jumlah_gaji_pokok'] . "</td>";
								echo "<td>" . $data['jumlah_bonus'] . "</td>";
								echo "<td>" . $data['bidang_pekerjaan'] . "</td>";
						
							
							
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
				setDateRangePicker(".tgl_awal", ".tgl_akhir")
			})
		</script>
		</body>

		</html>