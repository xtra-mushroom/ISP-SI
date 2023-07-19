<?php
if(isset($_GET['kode'])){
	$nik = $_GET['kode'];
    $sql_cek = "SELECT * FROM tb_promosi WHERE nik='$nik'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<div class="row">
	<div class="col-8">
		<div class="card card-success">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fa fa-plus"></i> Ubah Data Promosi</h3>
			</div>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="card-body">

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Nama</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama'] ?>" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">NIK</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data['nik'] ?>" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Alamat</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat'] ?>" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Nomor HP</label>
						<div class="col-sm-8">
							<input type="number" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data['nomor_hp'] ?>" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Jenis Paket</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="jenis_paket" name="jenis_paket" value="<?php echo $data['jenis_paket'] ?>" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Tanggal Deal</label>
						<div class="col-sm-8">
							<input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $data['tanggal_deal'] ?>" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Latitude, Longitude</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="lalong_val" name="lalong_val" value="<?php echo $data['lalong_val'] ?>" required autocomplete="off">
							<a href="http://www.google.com/maps" target="_blank"><i class="fas fa-search-location"></i>Cari Lokasi...</a>
						</div>
					</div>

				</div>
				<div class="card-footer float-right">
					<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
					<a href="?page=data-promosi-sales" title="Kembali" class="btn btn-secondary">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
	// $sumber = @$_FILES['foto']['tmp_name'];
	// $target = 'foto/';
	// $nama_file = @$_FILES['foto']['name'];
	// $pindah = move_uploaded_file($sumber, $target.$nama_file);
	
if(isset($_POST['Ubah'])){
	$nikBaru = $_POST['nik'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	(string)$noHP = $_POST['no_hp'];
	$jenisPaket = $_POST['jenis_paket'];
	$tanggal = date_create($_POST['tanggal']);
	$tanggalDeal = date_format($tanggal,"Y-m-d");
	(int)$idSales = $_SESSION['ses_id'];
	$lalongVal = $_POST['lalong_val'];
	$statusPasang = "BELUM";

	$idUser = $_SESSION['ses_id'];
	$aktivitas = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"." (Mengubah data promosi)";

    $sql_ubah = "UPDATE tb_promosi SET nik='$nikBaru', nama='$nama', alamat='$alamat', nomor_hp='$noHP', jenis_paket='$jenisPaket', tanggal_deal='$tanggalDeal', id_sales='$idSales', lalong_val='$lalongVal', status_pasang='$statusPasang' WHERE nik='$nik';";
	$sql_ubah .= "INSERT INTO log_aktivitas VALUES (null, '$aktivitas', $idUser, null);";
	$query_ubah = mysqli_multi_query($koneksi, $sql_ubah);
	// var_dump($sql_ubah);

    if($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-promosi-sales';
            }
        })</script>";
    }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-promosi-sales';
            }
        })</script>";
    }
}

