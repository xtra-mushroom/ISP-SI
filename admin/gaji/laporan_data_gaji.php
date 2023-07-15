<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-newspaper"></i> Laporan Data Gaji
		</h3>
	</div>

	<?php
	$query = "SELECT * FROM tb_gaji LIMIT 30";
	?>

	<div class="card-body">
			<form method="get" action="">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group my-2">
							<label>Filter Periode Gaji</label>
                            <div class="input-group">
								<input type="number" name="bulan" value="<?= @$_GET['bulan'] ?>" class="form-control text-center" placeholder="Bulan">
                                <span class="input-group-text">dan</span>
                                <input type="number" name="tahun" value="<?= @$_GET['tahun'] ?>" class="form-control text-center" placeholder="Tahun">
                                <button type="submit" name="page" value="laporan-gaji" class="btn btn-primary ml-3">TAMPILKAN</button>
							</div>
                        </div>   
                    </div>
                </div>
                                        
                <?php
                if(isset($_GET['bulan']) && isset($_GET['tahun']))
                    echo '<a href="index.php?page=laporan-gaji" class="btn btn-sm btn-warning">RESET</a>';
                ?>
            </form>

			<?php 
            $bulan = @$_GET['bulan'];
			$tahun = @$_GET['tahun'];
			if(empty($bulan) AND empty($tahun)){
				$query = "SELECT * FROM tb_gaji LIMIT 30";
                $query1 = "SELECT (SUM(gaji_pokok) + SUM(bonus)) AS sum_gaji, (AVG(gaji_pokok) + AVG(bonus)) AS avg_gaji FROM tb_gaji LIMIT 30";
				$url_cetak = "admin/gaji/cetak.php";
				$label = "30 Data Gaji Terbaru";
			}else{  
				$query = "SELECT * FROM tb_gaji WHERE bulan = $bulan AND tahun = $tahun";
                $query1 = "SELECT (SUM(gaji_pokok) + SUM(bonus)) AS sum_gaji, (AVG(gaji_pokok) + AVG(bonus)) AS avg_gaji FROM tb_gaji WHERE bulan = $bulan AND tahun = $tahun";
				$url_cetak = "admin/gaji/cetak.php?bulan=$bulan&tahun=$tahun";
				$label = "Data Gaji Periode Bulan <b>".$bulan."</b> dan Tahun <b>".$tahun."</b>";
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
							<th>ID Gaji</th>
							<th>ID Karyawan</th>
							<th>Posisi/Jabatan</th>
							<th>Gaji Pokok</th>
							<th>Bonus</th>
							<th>Total Gaji</th>
							<th>Bulan</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$no = 1;
						$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
						$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
						// var_dump($query);
						if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                            $sql1 = mysqli_query($koneksi, $query1);
                            $data1 = mysqli_fetch_array($sql1);
                            
							while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
								echo "<tr>";
								echo "<td>" . $no++ . "</td>";
								echo "<td align='center'>" . $data['id_gaji'] . "</td>";
								echo "<td align='center'>" . $data['id_karyawan'] . "</td>";
								echo "<td>" . $data['posisi'] . "</td>";
								echo "<td align='right' width='120'>" . rupiah($data['gaji_pokok']). "</td>";
								echo "<td align='right' width='120'>" . rupiah($data['bonus']). "</td>";
								echo "<td align='right' width='120'>" . rupiah($data['bonus']+$data['gaji_pokok']). "</td>";
								echo "<td align='center'>" . $data['bulan']."-".$data['tahun'] . "</td>";
								echo "</tr>";
							}

                            $sumGaji = $data1['sum_gaji'];
                            $avgGaji = $data1['avg_gaji'];
                            echo "<tr>";
                            echo "<td colspan='4' align='right'><b>Total Pengeluaran Gaji</b></td>";
                            echo "<td colspan='3' align='right'><b>".rupiah($sumGaji)."</b></td>";
                            echo "<td colspan='2'></td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td colspan='4' align='right'><b>Rata-Rata Pengeluaran Gaji Untuk Satu Karyawan</b></td>";
                            echo "<td colspan='3' align='right'><b>".rupiah($avgGaji)."</b></td>";
                            echo "<td colspan='2'></td>";
                            echo "</tr>";
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
