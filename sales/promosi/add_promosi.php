<div class="row">
	<div class="col-8">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fa fa-plus"></i> Tambah Data Promosi</h3>
			</div>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="card-body">

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Nama</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nama" name="nama" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">NIK</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nik" name="nik" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Alamat</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="alamat" name="alamat" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Nomor HP</label>
						<div class="col-sm-8">
							<input type="number" class="form-control" id="no_hp" name="no_hp" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Jenis Paket</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="jenis_paket" name="jenis_paket" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Tanggal Deal</label>
						<div class="col-sm-8">
							<input type="date" class="form-control" id="tanggal" name="tanggal" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Latitude, Longitude</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="lalong_val" name="lalong_val" required autocomplete="off">
							<a href="http://www.google.com/maps" target="_blank"><i class="fas fa-search-location"></i>Cari Lokasi...</a>
						</div>
					</div>

					<!-- <div class="form-group row">
						<label class="col-sm-2 col-form-label">Foto</label>
						<div class="col-sm-6">
							<input type="file" id="foto" name="foto">
							<p class="help-block">
								<font color="red">"Format file Jpg/Png"</font>
							</p>
						</div>
					</div> -->

				</div>
				<div class="card-footer float-right">
					<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
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

    if (isset ($_POST['Simpan'])){
		$nik = $_POST['nik'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$noHP = $_POST['no_hp'];
		$jenisPaket = $_POST['jenis_paket'];
		$tanggal = date_create($_POST['tanggal']);
		$tanggalDeal = date_format($tanggal,"Y-m-d");
		(int)$idSales = $_SESSION['ses_id'];
		$lalongVal = $_POST['lalong_val'];
		$statusPasang = "BELUM";

		$idUser = $_SESSION['ses_id'];
		$aktivitas = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"." (Menambahkan data promosi)";

		$sql_simpan = "INSERT INTO tb_promosi VALUES ('$nik', '$nama', '$alamat', '$noHP', '$jenisPaket', '$tanggalDeal', $idSales, '$lalongVal', '$statusPasang');";
		$sql_simpan .= "INSERT INTO log_aktivitas VALUES (null, '$aktivitas', $idUser, null);";

		// var_dump($sql_simpan);
		
        $query_simpan = mysqli_multi_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

		if ($query_simpan) {
			echo "<script>
			Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=data-promosi-sales';
				}
			})</script>";
		}else{
			echo "<script>
			Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=add-promosi-sales';
				}
			})</script>";
		}
	}
     //selesai proses simpan data
