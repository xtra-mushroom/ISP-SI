<?php
if(isset($_GET['kode']) && isset($_GET['pel'])){
    $idKeluhan = $_GET['kode'];
    $idPelanggan = $_GET['pel'];
    $sql_cek = "SELECT tb_keluhan.*, tb_pelanggan.nama_pelanggan, tb_pelanggan.alamat_pelanggan FROM tb_keluhan INNER JOIN tb_pelanggan ON tb_keluhan.id_pelanggan = tb_pelanggan.id_pelanggan WHERE id_keluhan=$idKeluhan";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}

function sendSms($noHp, $pesan){
    $idMesin = "191"; // sesuaikan dengan ID Mesin di aplikasi SMS Gateway
    $pin = "015601"; // sesuaikan dengan PIN di aplikasi SMS Gateway

    $pesan = str_replace(" ", "%20", $pesan);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://sms.indositus.com/sendsms.php?idmesin=$idMesin&pin=$pin&to=$noHp&text=$pesan");
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $output = curl_exec($ch);

    curl_close($ch);

    return $output;
}
?>
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-plus mr-2"></i> Tambah Data Perbaikan</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama_pelanggan'] ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Alamat</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat_pelanggan'] ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Tanggal Keluhan</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="tanggal_keluhan" name="tanggal_keluhan" value="<?php echo $data['tanggal_keluhan'] ?>"readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Isi Keluhan</label>
				<div class="col-sm-5">
					<textarea class="form-control" id="isi_keluhan" name="isi_keluhan" readonly><?php echo $data['isi_keluhan']?>
					</textarea>
				</div>
			</div>

			<hr>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Tanggal Perbaikan</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="tanggal_perbaikan" name="tanggal_perbaikan" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Penanganan</label>
				<div class="col-sm-5">
					<textarea class="form-control" id="penanganan" name="penanganan" required></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Lama Perbaikan <span class="text-sm text-danger">*opsional</span></label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="lama_penanganan" name="lama_penanganan">
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-perbaikan-teknisiperbaikan" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
    if(isset($_POST['Simpan'])){
		$idKeluhan = $_GET['kode'];
		$idPelanggan = $_GET['pel'];
		$penanganan = $_POST['penanganan'];
		$tanggal = $_POST['tanggal_perbaikan'];
		$lamaPerbaikan = $_POST['lama_penanganan'];
		$idTeknisi = $_SESSION['ses_id'];
		$aktivitas = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"." (Menambahkan data perbaikan)";

        $sql = "INSERT INTO tb_perbaikan VALUES (null, '$idKeluhan', '$idPelanggan', '$penanganan', '$tanggal', '$lamaPerbaikan', $idTeknisi);";
		$sql .= "UPDATE tb_keluhan SET status_penanganan='Sudah Ditangani' WHERE id_keluhan='$idKeluhan';";
		$sql .= "INSERT INTO log_aktivitas VALUES (null, '$aktivitas', $idTeknisi, null);";

        $query_simpan = mysqli_multi_query($koneksi, $sql);

		// var_dump($sql_simpan);

		if ($query_simpan) {
			// kirim SMS
			$noHp = "082158412297";
			$pesan = "Terima kasih kepada Bapak/Ibu telah melakukan pembayaran biaya registrasi, bukti pembayaran anda telah diverifikasi. Silahkan masuk/login ke sistem dengan username dan password untuk melengkapi berkas anda.";
			// sendSms($noHp, $pesan);
			// kirim SMS end

			echo "<script>
			Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=data-perbaikan-teknisiperbaikan';
				}
			})</script>";
		}else{
			echo "<script>
			Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=add-perbaikan&kode=$idKeluhan&pel=$idPelanggan';
				}
			})</script>";
		}
	}
    //selesai proses simpan data
