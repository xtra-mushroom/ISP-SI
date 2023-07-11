<?php
if(isset($_GET['kode'])){
	$idGaji = $_GET['kode'];
    $sql_cek = "SELECT * FROM tb_gaji WHERE id_gaji=$idGaji";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data Gaji</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Karyawan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="id_karyawan" name="id_karyawan" required autocomplete="off" value="<?php echo $data['id_karyawan'] ?>"> 
				</div>
			</div>

			<?php 
			$selectAdmin = $selectSales = $selectPemasangan = $selectPerbaikan = $selectSuper = $selectDirektur = $selectSatpam = "";
			if($data['posisi'] == 'Admin'){
				$selectAdmin = "selected";
			}elseif($data['posisi'] == 'Sales'){
				$selectSales = "selected";
			}elseif($data['posisi'] == 'Teknisi Pemasangan'){
				$selectPemasangan = "selected";
			}elseif($data['posisi'] == 'Teknisi Perbaikan'){
				$selectPerbaikan = "selected";
			}elseif($data['posisi'] == 'Supervisor'){
				$selectSuper = "selected";
			}elseif($data['posisi'] == 'Direktur'){
				$selectDirektur = "selected";
			}elseif($data['posisi'] == 'Satpam'){
				$selectSatpam = "selected";
			}
			?>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Posisi / Jabatan</label>
				<div class="col-sm-5">
					<select name="posisi" id="posisi" class="form-control" required>
						<option value="">--Pilih Posisi / Jabatan--</option>
						<option value="Admin" <?php echo $selectAdmin ?>>Admin</option>
						<option value="Sales" <?php echo $selectSales ?>>Sales</option>
						<option value="Teknisi Pemasangan" <?php echo $selectPemasangan ?>>Teknisi Pemasangan</option>
						<option value="Teknisi Perbaikan" <?php echo $selectPerbaikan ?>>Teknisi Perbaikan</option>
						<option value="Supervisor" <?php echo $selectSuper ?>>Supervisor</option>
						<option value="Direktur" <?php echo $selectDirektur ?>>Direktur</option>
						<option value="Satpam" <?php echo $selectSatpam ?>>Satpam</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Gaji Pokok</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" required autocomplete="off" value="<?php echo $data['gaji_pokok'] ?>">
					<span class="text-danger text-sm">*hanya angka</span>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Bonus</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="bonus" name="bonus" required autocomplete="off" value="<?php echo $data['bonus'] ?>">
					<span class="text-danger text-sm">*hanya angka</span>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Bulan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="bulan" name="bulan" required autocomplete="off" value="<?php echo $data['bulan'] ?>">
					<span class="text-danger text-sm">*hanya angka (1-12)</span>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tahun</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="tahun" name="tahun" required autocomplete="off" value="<?php echo $data['tahun'] ?>">
					<span class="text-danger text-sm">*hanya angka</span>
				</div>
			</div>
		</div>	

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-gaji" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if(isset($_POST['Ubah'])){
		$idKaryawan = $_POST['id_karyawan'];
		$posisi = $_POST['posisi'];
		$gajiPokok = $_POST['gaji_pokok'];
		$bonus = $_POST['bonus'];
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];

        $sql_ubah = "UPDATE tb_gaji SET id_karyawan=$idKaryawan, posisi='$posisi', gaji_pokok=$gajiPokok, bonus=$bonus, bulan=$bulan, tahun=$tahun WHERE id_gaji=$idGaji";
		// var_dump($sql_ubah);
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
        mysqli_close($koneksi);

		if($query_ubah) {
			echo "<script>
			Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=data-gaji';
				}
			})</script>";
		}else{
			echo "<script>
			Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=edit-gaji';
				}
			})</script>";
		}
	}


