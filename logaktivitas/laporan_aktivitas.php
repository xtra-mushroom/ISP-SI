<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-newspaper"></i> Laporan Data Log Aktivitas Pengguna Sistem
		</h3>
	</div>

	<?php
	$query = "SELECT * FROM log_aktivitas ORDER BY timestamp DESC LIMIT 15";
	?>

	<div class="card-body">
			<form method="get" action="">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group my-2">
							<label>Filter Limit Data :</label>
                            <div class="input-group">
								<input type="number" name="limit" value="<?= @$_GET['limit'] ?>" class="form-control text-center" placeholder="Limit Data">
                                <button type="submit" name="page" value="laporan-aktivitas" class="btn btn-primary ml-3">TAMPILKAN</button>
							</div>
                        </div>   
                    </div>
                </div>
                                        
                <?php
                if(isset($_GET['limit']))
                    echo '<a href="index.php?page=laporan-aktivitas" class="btn btn-sm btn-warning">RESET</a>';
                ?>
            </form>

			<?php 
			$limit = @$_GET['limit'];
			if(empty($limit)){
				$query = "SELECT * FROM log_aktivitas ORDER BY timestamp DESC LIMIT 15";
				$url_cetak = "logaktivitas/cetak.php";
				$label = "15 Log Aktivitas Terbaru";
			}else{  
				$query = "SELECT * FROM log_aktivitas ORDER BY timestamp DESC LIMIT $limit";
				$url_cetak = "logaktivitas/cetak.php?limit=$limit";
				$label = "$limit Log Aktivitas Terbaru";
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
							<th>ID Pengguna</th>
							<th>Akses URL Server</th>
							<th>Keterangan Aktivitas</th>
							<th>Timestamp</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$no = 1;
						$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
						$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
						if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
							while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                                $expl = explode(" ", $data['aktivitas']);
								echo "<tr>";
								echo "<td>" . $no++ . "</td>";
								echo "<td align='center'>" . $data['id_karyawan'] . "</td>";
								echo "<td>" . $expl[0] . "</td>";
								echo "<td>" . $expl[1]." ".$expl[2]." ".$expl[3]." ".$expl[4]. "</td>";
								echo "<td>" . $data['timestamp'] . "</td>";
								echo "</tr>";
							}
						}else{ // Jika data tidak ada
							echo "<tr><td colspan='9' align='center' style='color:grey;font-style:italic'>Data tidak ditemukan</td></tr>";
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
