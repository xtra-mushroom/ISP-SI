<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-plus"></i> Tambah Data
		</h3>
	</div>
	<form action="" method="post">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Lengkap</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama" name="nama" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="username" name="username" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-5">
					<input type="password" class="form-control" id="password" name="password" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Level/Jabatan</label>
				<div class="col-sm-3">
					<select name="level" id="level" class="form-control">
						<option>--Pilih Level/Jabatan--</option>
						<option value="Admin">Admin</option>
						<option value="Sales">Sales</option>
						<option value="Teknisi Pemasangan">Teknisi Pemasangan</option>
						<option value="Teknisi Perbaikan">Teknisi Perbaikan</option>
					</select>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pengguna" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {
	//mulai proses simpan data
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$level = $_POST['level'];

	$sqlID = "SELECT id FROM tb_karyawan ORDER BY id DESC LIMIT 1";
	$resultID = mysqli_query($koneksi, $sqlID);
	$fetchID = mysqli_fetch_assoc($resultID);
	$id = (int)$fetchID['id']+1;

	$sql_simpan = "INSERT INTO tb_pengguna VALUES ($id, '$nama', '$username', md5('$password'), '$level');";
	$sql_simpan .= "INSERT INTO tb_karyawan (id, nama_karyawan, posisi) VALUES ($id, '$nama', '$level');";
	$query_simpan = mysqli_multi_query($koneksi, $sql_simpan);
	// var_dump($sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pengguna';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pengguna';
          }
      })</script>";
	}
}
     //selesai proses simpan data
