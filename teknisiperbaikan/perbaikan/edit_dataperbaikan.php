<?php
if(isset($_GET['kode']) && isset($_GET['pel'])){
    $idKeluhan = $_GET['kode'];
    $idPelanggan = $_GET['pel'];
    $sql_cek = "SELECT tb_keluhan.*, tb_perbaikan.*, tb_pelanggan.nama_pelanggan, tb_pelanggan.alamat_pelanggan FROM tb_keluhan INNER JOIN tb_pelanggan ON tb_keluhan.id_pelanggan = tb_pelanggan.id_pelanggan INNER JOIN tb_perbaikan ON tb_keluhan.id_keluhan = tb_perbaikan.id_keluhan WHERE id_perbaikan=$idKeluhan";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>
<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit mr-2"></i> Ubah Data Perbaikan</h3>
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
					<input type="date" class="form-control" id="tanggal_keluhan" name="tanggal_keluhan" value="<?php echo $data['tanggal_keluhan'] ?>" readonly>
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
					<input type="date" class="form-control" id="tanggal_perbaikan" name="tanggal_perbaikan" value="<?php echo $data['tanggal_perbaikan'] ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Penanganan</label>
				<div class="col-sm-5">
					<textarea class="form-control" id="penanganan" name="penanganan" required><?php echo $data['penanganan']?></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Lama Perbaikan <span class="text-sm text-danger">*opsional</span></label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="lama_penanganan" name="lama_penanganan" value="<?php echo $data['lama_perbaikan'] ?>">
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
			<a href="?page=data-perbaikan-teknisiperbaikan" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
    if(isset($_POST['Ubah'])){
		$idPerbaikan = $_GET['kode'];
		$idPelanggan = $_GET['pel'];
		$penanganan = $_POST['penanganan'];
		$tanggal = $_POST['tanggal_perbaikan'];
		$lamaPerbaikan = $_POST['lama_penanganan'];
		$idTeknisi = $_SESSION['ses_id'];
		$aktivitas = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"." (Mengubah data perbaikan)";

        $sql = "UPDATE tb_perbaikan SET tanggal_perbaikan='$tanggal', penanganan='$penanganan', lama_perbaikan='$lamaPerbaikan', id_teknisi=$idTeknisi WHERE id_perbaikan=$idPerbaikan;";
		$sql .= "UPDATE tb_keluhan SET status_penanganan='Sudah Ditangani' WHERE id_keluhan='$idKeluhan';";
		$sql .= "INSERT INTO log_aktivitas VALUES (null, '$aktivitas', $idTeknisi, null);";
		
        $query_ubah = mysqli_multi_query($koneksi, $sql);
		// var_dump($sql_simpan);

		if ($query_ubah) {
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
				window.location = 'index.php?page=edit-perbaikan-teknisiperbaikan&kode=$idKeluhan&pel=$idPelanggan';
				}
			})</script>";
		}
	}
    //selesai proses simpan data
