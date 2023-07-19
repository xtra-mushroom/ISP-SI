<?php
$id = $_GET['id'];
if(isset($id)){
    $sql_cek = "SELECT * FROM tb_karyawan WHERE id=$id";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Profil Anda</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama_karyawan']; ?>" required/>
				</div>
			</div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data['nik_karyawan']; ?>" required/>
				</div>
			</div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Lahir</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" required/>
				</div>
			</div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" required/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-5">
					<?php 
                    if($data['jenis_kelamin'] == "Perempuan"){
                        $selectP = "selected";
                        $selectL = "";
                    }elseif($data['jenis_kelamin'] == "Laki-Laki"){
                        $selectL = "selected";
                        $selectP = "";
                    }else{
                        $selectL = $selectP = "";
                    }
                    ?>
                    <select class="form-control" name="jenis_kel" id="jenis_kel" required>
                        <option value="">--Pilih Jenis Kelamin--</option>
                        <option value="Laki-Laki" <?php echo $selectL ?>>Laki-Laki</option>
                        <option value="Perempuan" <?php echo $selectP ?>>Perempuan</option>
                    </select>
				</div>
			</div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat_karyawan']; ?>" required/>
				</div>
			</div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor HP</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="<?php echo $data['no_hp_karyawan']; ?>" required/>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto</label>
				<div class="col-sm-6">
					<img src="profil&gaji/fotokaryawan/<?php echo $data['foto']; ?>" width="160px" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Ubah Foto</label>
				<div class="col-sm-5">
					<input type="file" class="form-control" id="foto" name="foto">
					<span class="text-sm text-danger">*format file .jpg atau .png</span>
				</div>
			</div>
		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
			<a href="?page=data-profil-gaji" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
	
if(isset($_POST['Ubah'])){
	$nama = $_POST['nama'];
	$nik = $_POST['nik'];
	$tempatLahir = $_POST['tempat_lahir'];
	$tanggalLahir = $_POST['tanggal_lahir'];
	$jenisKel = $_POST['jenis_kel'];
	$alamat = $_POST['alamat'];
	$noHP = $_POST['nomor_hp'];
	$idUser = $_SESSION['ses_id'];
	$aktivitas = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"." (Mengubah data profil)";

	$sumber = @$_FILES['foto']['tmp_name'];
	
    if(!empty($sumber)){
		$target = "profil&gaji/fotokaryawan/";
		$foto = @$_FILES['foto']['name'];
		$moved = move_uploaded_file($sumber, $target.$foto);

        if($moved == true){
			$fotoLama = $data['foto'];
            unlink("profil&gaji/fotokaryawan/$fotoLama");
		}
        $sql_ubah = "UPDATE tb_karyawan SET nama_karyawan='$nama', jenis_kelamin='$jenisKel', alamat_karyawan='$alamat', nik_karyawan='$nik', no_hp_karyawan='$noHP', tempat_lahir='$tempatLahir', tanggal_lahir='$tanggalLahir', foto='$foto' WHERE id=$id;";
		$sql_ubah .= "UPDATE tb_pengguna SET nama_pengguna='$nama' WHERE id_pengguna=$id;";
		$sql_ubah .= "INSERT INTO log_aktivitas VALUES (null, '$aktivitas', $idUser, null);";
        $query_ubah = mysqli_multi_query($koneksi, $sql_ubah);
		// var_dump($sql_ubah);

	}elseif(empty($sumber)){
		$sql_ubah = "UPDATE tb_karyawan SET nama_karyawan='$nama', jenis_kelamin='$jenisKel', alamat_karyawan='$alamat', nik_karyawan='$nik', no_hp_karyawan='$noHP', tempat_lahir='$tempatLahir', tanggal_lahir='$tanggalLahir' WHERE id=$id;";
		$sql_ubah .= "UPDATE tb_pengguna SET nama_pengguna='$nama' WHERE id_pengguna=$id;";
		$sql_ubah .= "INSERT INTO log_aktivitas VALUES (null, '$aktivitas', $idUser, null);";
		// var_dump($sql_ubah);
        $query_ubah = mysqli_multi_query($koneksi, $sql_ubah);
    }

    if($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-profil-gaji';
            }
        })</script>";
    }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=edit-data-profil&id=$id';
            }
        })</script>";
    }
}

