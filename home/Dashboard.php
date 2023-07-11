<?php
$sql_cek = "SELECT * FROM tb_profil";
$query_cek = mysqli_query($koneksi, $sql_cek);
$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);		
?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-flag"></i> Profil Perusahaan</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Perusahaan</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?php echo $data_cek['nama_perusahaan']; ?>"
					 readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Produk</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php echo $data_cek['nama_produk']; ?>"
					 readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>"
					 readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Bidang</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="bidang" name="bidang" value="<?php echo $data_cek['bidang']; ?>"
					 readonly/>
				</div>
			</div>

		</div>
	</form>
</div>

<?php
	// $sql = $koneksi->query("SELECT count(nik) as lokal1 from tb_karyawan");
	$sql = $koneksi->query("SELECT count(id_pengguna) as lokal4 from tb_pengguna");
	while ($data= $sql->fetch_assoc()) {
	
		$lokal4=$data['lokal4'];
	}
?>

<?php
		
	// $sql = $koneksi->query("SELECT count(nik) as lokal2 from tb_pemasangan");
	$sql = $koneksi->query("SELECT count(id_pengguna) as lokal2 from tb_pengguna WHERE level = 'Teknisi Pemasangan'");
	while ($data= $sql->fetch_assoc()) {
	
		$lokal2=$data['lokal2'];
	}
?>

<?php
		
	// $sql = $koneksi->query("SELECT count(nik) as lokal3 from tb_perbaikan");
	$sql = $koneksi->query("SELECT count(id_pengguna) as lokal3 from tb_pengguna WHERE level = 'Teknisi Perbaikan'");
	while ($data= $sql->fetch_assoc()) {
	
		$lokal3=$data['lokal3'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(nik) as lokal1 from tb_promosi");
	while ($data= $sql->fetch_assoc()) {
	
		$lokal1=$data['lokal1'];
	}
?>

<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-danger">
			<div class="inner">
				<h3>
					<?php echo $lokal1;  ?>
				</h3>
				<p>Jumlah Deal Indihome</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="index.php?page=data-deal-indihome" class="small-box-footer">Selengkapnya
				
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $lokal2;  ?>
				</h3>
				<p>Jumlah Teknisi Pemasangan</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="index.php?page=data-teknisi-pemasangan" class="small-box-footer">Selengkapnya
				
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-primary">
			<div class="inner">
				<h3>
					<?php echo $lokal3;  ?>
				</h3>
				<p>Jumlah Teknisi Perbaikan</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="index.php?page=data-teknisi-perbaikan" class="small-box-footer">
				Selengkapnya
			</a>
		</div>
	</div>
	
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>
					<?php echo $lokal4;  ?>
				</h3>
				<p>Jumlah Pengguna Sistem</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="index.php?page=data-pengguna-sistem" class="small-box-footer">
				Selengkapnya	
			</a>
		</div>
	</div>
</div>