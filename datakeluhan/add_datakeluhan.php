<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-plus mr-2"></i>Tambah Data Keluhan</h3>
	</div>
	<div class="card-body">
		<form action="" method="get">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Cari Data Pelanggan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" placeholder="Masukkan ID Pelanggan" autocomplete="off">
				</div>
				<div class="col-sm-2">
					<button type="submit" class="form-control btn-success" value="add-keluhan" name="page">Generate</button>
				</div>
			</div>
		</form>
		
		<?php 
			if(isset($_GET['id_pelanggan'])){
				$id = $_GET['id_pelanggan'];
				$text = "ID Pelanggan : $id";
				$queryGenerate = "SELECT nama_pelanggan, alamat_pelanggan, no_hp_pelanggan FROM tb_pelanggan WHERE id_pelanggan='$id' AND status_langganan='Aktif'";
				$result = mysqli_query($koneksi, $queryGenerate);
				$pelanggan = mysqli_fetch_assoc($result);
				$namaPelanggan = $pelanggan['nama_pelanggan'];
				$alamatPelanggan = $pelanggan['alamat_pelanggan'];
				$noHpPelanggan = $pelanggan['no_hp_pelanggan'];
				// var_dump($pelanggan);
		?>

		<hr>
		<span class=text-bold><?php echo $text ?></span>
		<div class="form-group row mt-3">
			<label class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="nama_pelanggan" name="nama" value="<?php echo $namaPelanggan ?>" readonly> 
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Alamat</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="alamat_pelanggan" name="alamat" value="<?php echo $alamatPelanggan ?>" readonly>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Nomor HP</label>
			<div class="col-sm-5">
				<input type="number" class="form-control" id="no_hp_pelanggan" name="no_hp" value="<?php echo $noHpPelanggan ?>" readonly>
			</div>
		</div>
		<hr>

		<?php } ?>

	<form action="" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Keluhan</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="tanggal_keluhan" name="tanggal_keluhan">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Isi Keluhan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="isi_keluhan" name="isi_keluhan">
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-keluhan" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
        function autofill(){
            var id_pelanggan = $("#id_pelanggan").val();
            $.ajax({
                url: 'getData.php',
                data:"id_pelanggan="+id_pelanggan,
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                $('#nama_pelanggan').val(obj.nama_pelanggan);
                $('#alamat_pelanggan').val(obj.alamat_pelanggan);
                $('#no_hp_pelanggan').val(obj.no_hp_pelanggan); 
            });
        }
    </script> -->
</div>

<?php
    if (isset ($_POST['Simpan'])){
		$idPelanggan = $_GET['id_pelanggan'];
		$tanggal = date_create($_POST['tanggal_keluhan']);
		$tanggalKeluhan = date_format($tanggal,"Y-m-d");
		(int)$idTeknisi = $_SESSION['ses_id'];
		$isiKeluhan = $_POST['isi_keluhan'];
		$statusPenanganan = "Belum Ditangani";

		$sql_simpan = "INSERT INTO tb_keluhan VALUES (NULL, '$idPelanggan', '$tanggalKeluhan', '$isiKeluhan', '$statusPenanganan', $idTeknisi)";
		// var_dump($sql_simpan);
		
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

		if ($query_simpan) {
			echo "<script>
			Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=data-keluhan';
				}
			})</script>";
		}else{
			echo "<script>
			Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=add-keluhan';
				}
			})</script>";
		}
	}
     //selesai proses simpan data
