<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-plus"></i> Tambah Data Karyawan</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama" name="nama" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nik" name="nik" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-5">
					<select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
						<option value="">--Pilih Jenis Kelamin--</option>
						<option value="Laki-Laki">Laki-Laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Lahir</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="alamat" name="alamat" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor HP</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nomor_hp" name="nomor_hp" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Posisi/Jabatan</label>
				<div class="col-sm-5">
					<select class="form-control" id="posisi" name="posisi" required>
						<option value="">--Pilih Jabatan--</option>
						<!-- <option value="Admin">Admin</option>
						<option value="Sales">Sales</option>
						<option value="Teknisi Pemasangan">Teknisi Pemasangan</option>
						<option value="Teknisi Perbaikan">Teknisi Perbaikan</option> -->
						<option value="IT Support">IT Support</option>
						<option value="Supervisor">Supervisor</option>
						<option value="Customer Service">Customer Service</option>
						<option value="Teknisi Jaringan">Teknisi Jaringan</option>
						<option value="Software Developer">Software Developer</option>
						<option value="Satpam/Security">Satpam/Security</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto</label>
				<div class="col-sm-5">
					<input class="form-control" type="file" id="foto" name="foto">
					<span class="text-sm text-danger">*format file .jpg atau .png</span>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-karyawan" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if(isset($_POST['Simpan'])){
	$sumber = @$_FILES['foto']['tmp_name'];
	
	if(!empty($sumber)){
		$nama = $_POST['nama'];
		$nik = $_POST['nik'];
		$jenisKel = $_POST['jenis_kelamin'];
		$tempatLahir = $_POST['tempat_lahir'];
		$tanggalLahir = $_POST['tanggal_lahir'];
		$alamat = $_POST['alamat'];
		$noHP = $_POST['nomor_hp'];
		$posisi = $_POST['posisi'];
		$id = $_SESSION['ses_id'];
		$aktivitas = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"." (Menambahkan data karyawan baru)";

		$sqlID = "SELECT id FROM tb_karyawan ORDER BY id DESC LIMIT 1";
		$resultID = mysqli_query($koneksi, $sqlID);
		$fetchID = mysqli_fetch_assoc($resultID);
		$idKar = (int)$fetchID['id']+1;
		// var_dump($id);

		$target = "profil&gaji/fotokaryawan/";
		$foto = @$_FILES['foto']['name'];
		move_uploaded_file($sumber, $target.$foto);

		$sql_simpan = "INSERT INTO tb_karyawan VALUES ($idKar, '$nama', '$jenisKel', '$posisi', '$alamat', '$nik', '$noHP', '$tempatLahir', '$tanggalLahir', '$foto');";
		$sql_simpan .= "INSERT INTO log_aktivitas VALUES (null, '$aktivitas', $id, null);";


		$query_simpan = mysqli_multi_query($koneksi, $sql_simpan);
		// var_dump($sql_simpan);
		mysqli_close($koneksi);

		if($query_simpan){
			echo "<script>
			Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=data-karyawan';
				}
			})</script>";
		}else{
			echo "<script>
			Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=add-karyawan';
				}
			})</script>";
		}

	}elseif(empty($sumber)){
		echo "<script>
		Swal.fire({title: 'Gagal! Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {if (result.value) {
			window.location = 'index.php?page=add-karyawan';
			}
		})</script>";
	}
}
//selesai proses simpan data
