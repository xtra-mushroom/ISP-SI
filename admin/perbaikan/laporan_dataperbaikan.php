<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-newspaper"></i> Laporan Data Perbaikan
		</h3>
	</div>

	<?php
	$query = "SELECT tb_keluhan.id_keluhan, tb_keluhan.id_pelanggan, tb_keluhan.tanggal_keluhan, tb_keluhan.isi_keluhan, tb_perbaikan.tanggal_perbaikan, tb_perbaikan.penanganan, tb_perbaikan.lama_perbaikan, tb_perbaikan.id_teknisi, tb_pelanggan.nama_pelanggan, tb_pelanggan.alamat_pelanggan FROM tb_keluhan INNER JOIN tb_perbaikan ON tb_keluhan.id_keluhan = tb_perbaikan.id_keluhan INNER JOIN tb_pelanggan ON tb_perbaikan.id_pelanggan = tb_pelanggan.id_pelanggan";
	?>

	<div class="card-body">
			<form method="get" action="">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group my-2">
							<label>Filter Tanggal : <span class="text-secondary">yyyy-mm-dd</span></label>
                            <div class="input-group">
								<input type="text" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" class="form-control text-center tgl_awal" placeholder="Tanggal Awal">
                                <span class="input-group-text">s/d</span>
                                <input type="text" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" class="form-control text-center tgl_akhir" placeholder="Tanggal Akhir">
                                <button type="submit" name="page" value="laporan-perbaikan" class="btn btn-primary ml-3">TAMPILKAN</button>
							</div>
                        </div>   
                    </div>
                </div>
                                        
                <?php
                if(isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir']))
                    echo '<a href="index.php?page=laporan-perbaikan" class="btn btn-sm btn-warning">RESET</a>';
                ?>
            </form>

			<?php 
            $tgl_awal = @$_GET['tgl_awal'];
			$tgl_akhir = @$_GET['tgl_akhir'];
			if(empty($tgl_awal) or empty($tgl_akhir)){
				$query = "SELECT tb_keluhan.id_keluhan, tb_keluhan.id_pelanggan, tb_keluhan.tanggal_keluhan, tb_keluhan.isi_keluhan, tb_perbaikan.tanggal_perbaikan, tb_perbaikan.penanganan, tb_perbaikan.lama_perbaikan, tb_perbaikan.id_teknisi, tb_pelanggan.nama_pelanggan, tb_pelanggan.alamat_pelanggan FROM tb_keluhan INNER JOIN tb_perbaikan ON tb_keluhan.id_keluhan = tb_perbaikan.id_keluhan INNER JOIN tb_pelanggan ON tb_perbaikan.id_pelanggan = tb_pelanggan.id_pelanggan";
				$url_cetak = "admin/perbaikan/cetak.php";
				$label = "Semua Data Perbaikan";
			}else{  
				$query = "SELECT tb_keluhan.id_keluhan, tb_keluhan.id_pelanggan, tb_keluhan.tanggal_keluhan, tb_keluhan.isi_keluhan, tb_perbaikan.tanggal_perbaikan, tb_perbaikan.penanganan, tb_perbaikan.lama_perbaikan, tb_perbaikan.id_teknisi, tb_pelanggan.nama_pelanggan, tb_pelanggan.alamat_pelanggan FROM tb_keluhan INNER JOIN tb_perbaikan ON tb_keluhan.id_keluhan = tb_perbaikan.id_keluhan INNER JOIN tb_pelanggan ON tb_perbaikan.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_perbaikan.tanggal_perbaikan BETWEEN '$tgl_awal' AND '$tgl_akhir'";
				$url_cetak = "admin/perbaikan/cetak.php?tgl_awal=$tgl_awal&tgl_akhir=$tgl_akhir&filter=true";
				$label = "Data Perbaikan Periode Tanggal <b>".tgl_indo($tgl_awal)."</b> s/d <b>".tgl_indo($tgl_akhir)."</b>";
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
							<th>Alamat</th>
							<th>Tanggal Keluhan</th>
							<th>Isi Keluhan</th>
							<th>Tanggal Perbaikan</th>
							<th>Penanganan</th>
							<th>ID Teknisi</th>
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
								echo "<td>" . $data['alamat_pelanggan'] . "</td>";
								echo "<td align='center'>" . tgl_indo($data['tanggal_keluhan']). "</td>";
								echo "<td>" . $data['isi_keluhan'] . "</td>";
								echo "<td align='center'>" . tgl_indo($data['tanggal_perbaikan']). "</td>";
								echo "<td>" . $data['penanganan'] . "</td>";
                                echo "<td align='center'>" . $data['id_teknisi'] . "</td>";
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
