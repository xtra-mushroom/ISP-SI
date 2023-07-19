<?php
if(isset($_GET['kode'])){
    $nik = $_GET['kode'];
    $sql_cek = "SELECT * FROM tb_promosi WHERE nik='$nik'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>
<div class="row">
	<div class="col-md-6">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Data Calon Pelanggan</h3>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 150px">
								<b>Nama</b>
							</td>
							<td>:
								<?php echo $data['nama']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>NIK</b>
							</td>
							<td>:
								<?php echo $data['nik']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Alamat</b>
							</td>
							<td>:
								<?php echo $data['alamat']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Nomor HP</b>
							</td>
							<td>:
								<?php echo $data['nomor_hp']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Jenis Paket</b>
							</td>
							<td>:
								<?php echo $data['jenis_paket']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Tanggal Deal</b>
							</td>
							<td>:
								<?php echo $data['tanggal_deal']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Status Pasang</b>
							</td>
							<td>:
								<?php 
								if($data['status_pasang'] == NULL){
									$status = "BELUM";
								}else{
									$status = $data['status_pasang'];
								}
								?>
								<span class="badge badge-danger"><?php echo $status ?></span>
							</td>
						</tr>
					</tbody>
				</table>
				<!-- <div class="card-footer">
					<a href="?page=data-pemasangan-teknisipemasangan" class="btn btn-warning">Kembali</a>
				</div> -->
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="card card-success">
			<div class="card-header">
				<center>
					<h3 class="card-title">
						Input Data Pemasangan
					</h3>
				</center>

				<div class="card-tools">
				</div>
			</div>
			<form action="" method="post">
				<div class="card-body">
					<input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data['nik'] ?>" hidden>
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama'] ?>" hidden>
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat'] ?>" hidden>
					<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data['nomor_hp'] ?>" hidden>
					<input type="text" class="form-control" id="jenis_paket" name="jenis_paket" value="<?php echo $data['jenis_paket'] ?>" hidden>

					<div class="form-group row">
						<label class="col-sm-5 col-form-label">Tanggal Pasang</label>
						<div class="col-sm-7">
							<input type="date" class="form-control" id="tanggal" name="tanggal" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-5 col-form-label">Total Biaya</label>
						<div class="col-sm-7">
							<input type="number" class="form-control" id="biaya" name="biaya" required>
							<span class="text-sm text-secondary">*hanya angka, tanpa titik</span>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-5 col-form-label">Keterangan <span class="text-danger text-sm">*opsional</span></label>
						<div class="col-sm-7">
							<textarea class="form-control" id="keterangan" name="keterangan"></textarea>
						</div>
					</div>
				</div>

				<div class="card-footer">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
				<a href="?page=data-pemasangan-teknisipemasangan" title="Kembali" class="btn btn-secondary">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
    if(isset ($_POST['Simpan'])){
		$nik = $_POST['nik'];
		$namaPelanggan = $_POST['nama'];
		$alamatPelanggan = $_POST['alamat'];
		$noHpPelanggan = $_POST['no_hp'];
		$jenisPaket = $_POST['jenis_paket'];

		$totalBiaya = $_POST['biaya'];
		$ket = $_POST['keterangan'];
		$idTeknisi = $_SESSION['ses_id'];

		$tgl = date_create($_POST['tanggal']);
		$tglPasang = date_format($tgl, "Y-m-d");
		
		// algoritma untuk generate id pemasangan
		$sqlGetIdPasang = "SELECT id_pemasangan FROM tb_pemasangan ORDER BY id_pemasangan DESC LIMIT 1";
		$getIdPasang = mysqli_query($koneksi, $sqlGetIdPasang);
		
		if($getIdPasang->num_rows < 1){
			$idPasang = "261111";
		}else{
			$fetchID = mysqli_fetch_assoc($getIdPasang);
			$id = $fetchID['id_pemasangan'];
			$idDigits = substr($id,2,4);
			$increment = (int)$idDigits + 1;
			$idPasang = "26".(string)$increment;
			// var_dump($idDigits);
		}

		// algoritma untuk generate id pelanggan
		$hp = $_POST['no_hp'];
		$hpDigits = substr($hp,-6,6);
		$idPelanggan = "PI26".$hpDigits;

		$idUser = $_SESSION['ses_id'];
		$aktivitas = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"." (Menambahkan data pemasangan)";


        $sql = "INSERT INTO tb_pemasangan VALUES ('$nik', '$idPasang', '$idPelanggan', $totalBiaya, $idTeknisi, '$tglPasang', '$ket');";
		$sql .= "INSERT INTO tb_pelanggan VALUES ('$idPelanggan', '$namaPelanggan', '$nik', '$alamatPelanggan', '$noHpPelanggan', '$jenisPaket', '$tglPasang', 'Aktif');";
		$sql .= "UPDATE tb_promosi SET status_pasang='SUDAH' WHERE nik='$nik';";
		$sql .= "INSERT INTO log_aktivitas VALUES (null, '$aktivitas', $idUser, null);";
			// var_dump($sql);
        $query_simpan = mysqli_multi_query($koneksi, $sql);
        mysqli_close($koneksi);

		if($query_simpan){
			echo "<script>
			Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=data-pemasangan-teknisipemasangan';
				}
			})</script>";
		}else{
			echo "<script>
			Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=add-pemasangan-teknisipemasangan';
				}
			})</script>";
		}
	}
     //selesai proses simpan data
