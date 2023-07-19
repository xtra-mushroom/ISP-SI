<?php
if(isset($_GET['kode'])){
    $sql_cek = "SELECT * FROM tb_pelanggan WHERE id_pelanggan='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data Pelanggan</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama_pelanggan']; ?>"/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data_cek['nik_pelanggan']; ?>"/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat_pelanggan']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor HP</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data_cek['no_hp_pelanggan']; ?>"/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Paket</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="jenis_paket" name="jenis_paket" value="<?php echo $data_cek['jenis_paket']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Langganan</label>
				<div class="col-sm-5">
					<?php 
					$select1 = $select2 = $select3 = "";
					if($data_cek['status_langganan'] == "Aktif"){
						$select1 = "selected";
					}elseif($data_cek['status_langganan'] == "Tidak Aktif"){
						$select2 = "selected";
					}elseif($data_cek['status_langganan'] == "Blacklist"){
						$select3 = "selected";
					}
					?>
					<select class="form-control" name="status" id="status">
						<option value="Aktif" <?php echo $select1 ?>>Aktif</option>
						<option value="Tidak Aktif" <?php echo $select2 ?>>Tidak Aktif</option>
						<option value="Blacklist" <?php echo $select3 ?>>Blacklist</option>
					</select>
				</div>
			</div>

		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
			<a href="?page=data-pelanggan" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
if(isset($_POST['Ubah'])){
	$id = $_GET['kode'];
	$nama = $_POST['nama'];
	$nik = $_POST['nik'];
	$alamat = $_POST['alamat'];
	$noHP = $_POST['no_hp'];
	$jenisPaket = $_POST['jenis_paket'];
	$status = $_POST['status'];
	$idUser = $_SESSION['ses_id'];
	$aktivitas = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"." (Mengubah data pelanggan)";

    $sql_ubah = "UPDATE tb_pelanggan SET nama_pelanggan='$nama', nik_pelanggan='$nik', alamat_pelanggan='$alamat', no_hp_pelanggan='$noHP', jenis_paket='$jenisPaket', status_langganan='$status' WHERE id_pelanggan='$id';"; // CAUTIONS FOR TRIGGER (log_data_pelanggan)
	$sql_ubah .= "INSERT INTO log_aktivitas VALUES (null, '$aktivitas', $idUser, null);";
    $query_ubah = mysqli_multi_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pelanggan';
            }
        })</script>";
        }else{
    echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pelanggan';
            }
        })</script>";
    }
}

