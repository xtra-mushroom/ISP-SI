<div class="row">
	<div class="col-8">
		<div class="card card-warning">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fa fa-plus"></i> Tambah Data Promosi Penjualan Modem Wi-Fi</h3>
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
						<label class="col-sm-4 col-form-label">Harga Modem</label>
						<div class="col-sm-8">
							<input type="number" class="form-control" id="harga_modem" name="harga_modem" required autocomplete="off">
							<span class="text-sm text-secondary">*hanya angka</span>
						</div>
					</div>

				</div>
				<div class="card-footer float-right">
					<input type="submit" name="Simpan" value="Simpan" class="btn btn-warning">
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
		$hargaModem = $_POST['harga_modem'];
		$idPemasangan = NULL;
		$statusPasang = "-";

		$sql_simpan = "INSERT INTO tb_promosi VALUES ('$nik', '$nama', '$alamat', '$noHP', '$jenisPaket', '$tanggalDeal', $hargaModem, $idSales, null, null, '$statusPasang')";
		// var_dump($sql_simpan);
		
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
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
				window.location = 'index.php?page=add-promosi-modem-sales';
				}
			})</script>";
		}
	}
     //selesai proses simpan data
