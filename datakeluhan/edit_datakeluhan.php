<?php
if(isset($_GET['kode'])){
    $id = $_GET['kode'];
    $sql_cek = "SELECT tb_keluhan.*, tb_pelanggan.nama_pelanggan, tb_pelanggan.alamat_pelanggan, tb_pelanggan.no_hp_pelanggan FROM tb_keluhan INNER JOIN tb_pelanggan ON tb_keluhan.id_pelanggan = tb_pelanggan.id_pelanggan WHERE id_keluhan=$id";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>
<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit mr-2"></i>Ubah Data Keluhan</h3>
	</div>
	<div class="card-body">
	    <form action="" method="post">
            <div class="form-group row mt-3">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama_pelanggan" name="nama" value="<?php echo $data['nama_pelanggan'] ?>" readonly> 
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="alamat_pelanggan" name="alamat" value="<?php echo $data['alamat_pelanggan'] ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nomor HP</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" id="no_hp_pelanggan" name="no_hp" value="<?php echo $data['no_hp_pelanggan'] ?>" readonly>
                </div>
            </div>
	
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Keluhan</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="tanggal_keluhan" name="tanggal_keluhan" value="<?php echo $data['tanggal_keluhan'] ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Isi Keluhan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="isi_keluhan" name="isi_keluhan" value="<?php echo $data['isi_keluhan'] ?>" required>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
			<a href="?page=data-keluhan" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
    if (isset ($_POST['Ubah'])){
		$tanggal = date_create($_POST['tanggal_keluhan']);
		$tanggalKeluhan = date_format($tanggal,"Y-m-d");
		(int)$idTeknisi = $_SESSION['ses_id'];
		$isiKeluhan = $_POST['isi_keluhan'];

		$sql_ubah = "UPDATE tb_keluhan SET tanggal_keluhan = '$tanggalKeluhan', isi_keluhan='$isiKeluhan', id_karyawan='$idTeknisi' WHERE id_keluhan=$id";
		// var_dump($sql_simpan);
		
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
        mysqli_close($koneksi);

		if ($query_ubah) {
			echo "<script>
			Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=data-keluhan';
				}
			})</script>";
		}else{
			echo "<script>
			Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=edit-keluhan&kode=$id';
				}
			})</script>";
		}
	}
     //selesai proses simpan data
