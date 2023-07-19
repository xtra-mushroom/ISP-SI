<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-plus"></i> Tambah Data Gaji Karyawan</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Karyawan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="id_karyawan" name="id_karyawan" required autocomplete="off">
					<span class="text-sm text-danger">*masukkan ID Karyawan yang sudah terdaftar</span>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Posisi / Jabatan</label>
				<div class="col-sm-5">
					<select name="posisi" id="posisi" class="form-control" required>
						<option value="">--Pilih Posisi / Jabatan--</option>
						<option value="Admin">Admin</option>
						<option value="Sales">Sales</option>
						<option value="Teknisi Pemasangan">Teknisi Pemasangan</option>
						<option value="Teknisi Perbaikan">Teknisi Perbaikan</option>
						<option value="Supervisor">Supervisor</option>
						<option value="Direktur">Direktur</option>
						<option value="Satpam">Satpam</option>
					</select>
					<span class="text-sm text-danger">*pilih posisi sesuai ID Karyawan yang terdaftar</span>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Gaji Pokok</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" required autocomplete="off">
					<span class="text-danger text-sm">*hanya angka</span>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Bonus</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="bonus" name="bonus" required autocomplete="off">
					<span class="text-danger text-sm">*hanya angka</span>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Bulan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="bulan" name="bulan" required autocomplete="off">
					<span class="text-danger text-sm">*hanya angka (1 sampai 12)</span>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tahun</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="tahun" name="tahun" required autocomplete="off">
					<span class="text-danger text-sm">*hanya angka</span>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-gaji" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
    if(isset($_POST['Simpan'])){
		$idKaryawan = $_POST['id_karyawan'];
		$posisi = $_POST['posisi'];
		$gajiPokok = $_POST['gaji_pokok'];
		$bonus = $_POST['bonus'];
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
		$id = $_SESSION['ses_id'];
		$aktivitas = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"." (Menambahkan data gaji baru)";

		if(strlen((string)$bulan) < 2){
			$zeroBulan = "0".$bulan;
		}
		$idGaji = (string)$zeroBulan.(string)$tahun.(string)rand(1111,9999); (int)$idGaji;

        $sql_simpan = "INSERT INTO tb_gaji VALUES ($idGaji, $idKaryawan, '$posisi', $gajiPokok, $bonus, $bulan, $tahun);";
		$sql_simpan .= "INSERT INTO log_aktivitas VALUES (null, '$aktivitas', $id, null);";

		var_dump($sql_simpan);
        $query_simpan = mysqli_multi_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

		if($query_simpan){
			echo "<script>
			Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=data-gaji';
				}
			})</script>";
		}else{
			echo "<script>
			Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=add-gaji';
				}
			})</script>";
		}
	}
		  
     //selesai proses simpan data
