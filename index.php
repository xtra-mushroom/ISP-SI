<?php
session_start();

if(isset($_SESSION["ses_username"]) == ""){
	header("location: login.php");
}else{
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
}

include "inc/koneksi.php"; // KONEKSI DB

$sql = $koneksi->query("SELECT * from tb_profil");
while($data = $sql->fetch_assoc()){

	$nama = $data['nama_perusahaan'];
	$nama = $data['nama_produk'];
}

function tgl_indo($tanggal){
	$bulan = array (
		1 => 'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

function Terbilang($x){   
	$bilangan = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");   
	if ($x < 12)   
	return " " . $bilangan[$x];   
	elseif ($x < 20)   
	return Terbilang($x - 10) . "belas";   
	elseif ($x < 100)   
	return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);   
	elseif ($x < 200)   
	return " seratus" . Terbilang($x - 100);   
	elseif ($x < 1000)   
	return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);   
	elseif ($x < 2000)   
	return " seribu" . Terbilang($x - 1000);   
	elseif ($x < 1000000)   
	return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);   
	elseif ($x < 1000000000)   
	return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);    
}   

function rupiah($angka){
	$hasil_rupiah = "Rp. " . number_format($angka,0,',','.');
	return $hasil_rupiah;
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SI INDIHOME MARABAHAN</title>
	<link rel="icon" href="dist/img/logo.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
	<!-- Leaflet Maps -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
	<!-- Leaflet Maps Style -->
	<style>
		html, body {
			height: 100%;
			margin: 0;
		}
		.leaflet-container {
			height: 400px;
			width: 600px;
			max-width: 100%;
			max-height: 100%;
		}
	</style>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-dark navbar-light sticky-top">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars text-blue"></i>
					</a>
				</li>

			</ul>

			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">


				<li class="nav-item d-none d-sm-inline-block">
					<font color="white">
						<b>
							PT. TELKOM INDONESIA
						</b>
					</font>
				</li>
			</ul>

		</nav>
		<!-- /.navbar -->
		<!-- Main Sidebar Container -->
		<div class="fixed-top h-100" style="width:20%"> <!-- membuat navbar penuh dan tidak bergerak -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index.php" class="brand-link">
				<span class="brand-text"> SI INDIHOME MARABAHAN</span>
			</a>
			
			<!-- Sidebar -->
			<div class="sidebar" style="background-image: linear-gradient(45deg, #000000, transparent)">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-2 pb-2 mb-2 d-flex">
					<div class="image">
						<img src="dist/img/user.png" class="img-circle elevation-1" alt="User Image">
					</div>
					<div class="info">
						<h6 class="d-block text-white">
							<?php echo $data_nama; ?>
						</h6>
						<h5>
							<span class="badge badge-success">
								<?php echo $data_level; ?>
							</span>
						</h5>
						
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- Level  -->
						<?php
						if ($data_level == "Admin") {
						?>
							<li class="nav-item">
								<a href="?page=Admin" class="nav-link">
									<i class="nav-icon fas fa-home"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-karyawan" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
									Data Karyawan	
									</p>
								</a>
							</li>
							
							<li class="nav-item">
								<a href="?page=data-gaji" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
									Data Gaji
									</p>
								</a>
							</li>	

							<li class="nav-item">
								<a href="?page=data-pemasangan" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
									Data Pemasangan	
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-keluhan" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
										Data Keluhan
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-perbaikan" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
									Data Perbaikan	
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-promosi" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
									Data Promosi
									</p>
								</a>
							</li>
							
							<li class="nav-item">
								<a href="?page=data-pelanggan" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
									Data Pelanggan
									</p>
								</a>
							</li>

							<li class="nav-item">
								<li class="nav-header">Report</li>
								
								<li class="nav-item">
									<a href="?page=laporan-karyawan" class="nav-link">
										<i class="far fa fa-newspaper nav-icon"></i>
										<p>Data Karyawan</p>
									</a>
								</li>
								
								<li class="nav-item">
									<a href="?page=laporan-promosi" class="nav-link">
										<i class="far fa fa-newspaper nav-icon"></i>
										<p>Data Promosi</p>
									</a>
								</li>

								<li class="nav-item">
									<a href="?page=laporan-pemasangan" class="nav-link">
										<i class="far fa fa-newspaper nav-icon"></i>
										<p>Data Pemasangan</p>
									</a>
								</li>

								<li class="nav-item">
									<a href="?page=laporan-pemasangan" class="nav-link">
										<i class="far fa fa-newspaper nav-icon"></i>
										<p>Data Pelanggan</p>
									</a>
								</li>

								<li class="nav-item">
									<a href="?page=laporan-pemasangan" class="nav-link">
										<i class="far fa fa-newspaper nav-icon"></i>
										<p>Data Keluhan</p>
									</a>
								</li>

								<li class="nav-item">
									<a href="?page=laporan-perbaikan" class="nav-link">
										<i class="far fa fa-newspaper nav-icon"></i>
										<p>Data Perbaikan</p>
									</a>
								</li>

								<li class="nav-item">
									<a href="?page=laporan-pemasangan" class="nav-link">
										<i class="far fa fa-newspaper nav-icon"></i>
										<p>Data Biaya Pemasangan</p>
									</a>
								</li>

								<li class="nav-item">
									<a href="?page=laporan-gaji" class="nav-link">
										<i class="far fa fa-newspaper nav-icon"></i>
										<p>Data Gaji</p>
									</a>
								</li>
							</li>

							<li class="nav-header">Setting</li>

							<li class="nav-item">
								<a href="?page=data-profil-gaji" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
									Profil & Gaji
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-profil" class="nav-link">
									<i class="nav-icon far fa fa-flag"></i>
									<p>
										Profil Perusahaan
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-pengguna" class="nav-link">
									<i class="nav-icon far fa fa-users"></i>
									<p>
										Pengguna Sistem
									</p>
								</a>
							</li>

						<!-- KARYAWAN -->
						<?php
						} elseif ($data_level == "Sales") {
						?>
							<li class="nav-item">
								<a href="?page=Sales" class="nav-link">
									<i class="nav-icon fas fa-home"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-profil-gaji" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
									Profil & Gaji
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-promosi-sales" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
									Data Promosi
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-pemasangan-sales" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
									Data Pemasangan
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-keluhan" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
										Data Keluhan
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-perbaikan-sales" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
									Data Perbaikan
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-pelanggan-sales" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
									Data Pelanggan
									</p>
								</a>
							</li>
								
							<li class="nav-header">Setting</li>

						<?php
						} elseif ($data_level == "Teknisi Pemasangan") {
						?>
							<li class="nav-item">
								<a href="?page=Teknisi Pemasangan" class="nav-link">
									<i class="nav-icon fas fa-home"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>
	
							<li class="nav-item">
								<a href="?page=data-profil-gaji" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
										Profil & Gaji
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-pemasangan-teknisipemasangan" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
										Data Pemasangan
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-keluhan" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
										Data Keluhan
									</p>
								</a>
							</li>
	
							<!-- <li class="nav-item">
								<a href="?page=data-promosi-teknisipemasangan" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
										Data Promosi
									</p>
								</a>
							</li>	 -->
	
							<!-- <li class="nav-item">
								<a href="?page=data-perbaikan-teknisipemasangan" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
										Data Perbaikan
									</p>
								</a>
							</li> -->
	
							<li class="nav-item">
								<a href="?page=data-pelanggan-teknisipemasangan" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
										Data Pelanggan
									</p>
								</a>
							</li>
									
							<li class="nav-header">Setting</li>
	
						<?php
						} elseif ($data_level == "Teknisi Perbaikan") {
						?>
							<li class="nav-item">
								<a href="?page=Teknisi Perbaikan" class="nav-link">
									<i class="nav-icon fas fa-home"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>
	
							<li class="nav-item">
								<a href="?page=data-profil-gaji" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
										Profil & Gaji
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-perbaikan-teknisiperbaikan" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
										Data Perbaikan
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-keluhan" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
										Data Keluhan
									</p>
								</a>
							</li>

							<!-- <li class="nav-item">
								<a href="?page=data-pemasangan-teknisiperbaikan" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
										Data Pemasangan
									</p>
								</a>
							</li> -->
	
							<li class="nav-item">
								<a href="?page=data-pelanggan-teknisiperbaikan" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
										Data Pelanggan
									</p>
								</a>
							</li>
									
							<li class="nav-header">Setting</li>
	
						<?php
						}
						?>

						<li class="nav-item">
							<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
								<i class="nav-icon far fa-circle text-danger"></i>
								<p>
									Logout
								</p>
							</a>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>
		</div>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">

					<?php
					if (isset($_GET['page'])) {
						$hal = $_GET['page'];

						switch ($hal) {
							// Klik Halaman Home Pengguna
							case 'Admin':
								include "home/Dashboard.php";
								break;
							case 'Sales':
								include "home/Dashboard.php";
								break;
							case 'Teknisi Pemasangan':
								include "home/Dashboard.php";
								break;
							case 'Teknisi Perbaikan':
								include "home/Dashboard.php";
								break;

							// Dashboard card 
							case 'data-deal-indihome':
								include "home/data_dealindihome.php";
								break;
							case 'data-teknisi-pemasangan':
								include "home/data_teknisipemasangan.php";
								break;
							case 'data-teknisi-perbaikan':
								include "home/data_teknisiperbaikan.php";
								break;
							case 'data-pengguna-sistem':
								include "home/data_penggunasistem.php";
								break;
								
							case 'laporan-data-karyawan':
								include "report/cetak_karyawan.php";
								break;

							case 'data-profil-gaji':
								include "profil&gaji/data-profil-gaji.php";
								break;
							case 'edit-data-profil':
								include "profil&gaji/edit-data-profil.php";
								break;
							case 'data-gaji':
								include "admin/gaji/data_gaji.php";
								break;
							
							// Keluhan
							case 'data-keluhan':
								include "datakeluhan/data_keluhan.php";
								break;
							case 'view-keluhan':
								include "datakeluhan/view_datakeluhan.php";
								break;
							case 'add-keluhan':
								include "datakeluhan/add_datakeluhan.php";
								break;
							case 'edit-keluhan':
								include "datakeluhan/edit_datakeluhan.php";
								break;
							case 'del-keluhan':
								include "datakeluhan/del_datakeluhan.php";
								break;

							// Perbaikan
							case 'data-perbaikan':
								include "admin/perbaikan/data_perbaikan.php";
								break;
							case 'data-perbaikan-sales':
								include "sales/perbaikan/data_perbaikan.php";
								break;
							case 'data-perbaikan-teknisipemasangan':
								include "teknisipemasangan/perbaikan/data_perbaikan.php";
								break;
							case 'data-perbaikan-teknisiperbaikan':
								include "teknisiperbaikan/perbaikan/data_perbaikan.php";
								break;
							case 'add-perbaikan':
								include "teknisiperbaikan/perbaikan/add_dataperbaikan.php";
								break;
							case 'add-perbaikan-teknisiperbaikan':
								include "teknisiperbaikan/perbaikan/add_dataperbaikan.php";
								break;
							case 'edit-perbaikan':
								include "admin/perbaikan/edit_dataperbaikan.php";
								break;
							case 'edit-perbaikan-teknisiperbaikan':
								include "teknisiperbaikan/perbaikan/edit_dataperbaikan.php";
								break;
							case 'del-perbaikan':
								include "admin/perbaikan/del_dataperbaikan.php";
								break;
							case 'del-perbaikan-teknisiperbaikan':
								include "teknisiperbaikan/perbaikan/del_dataperbaikan.php";
								break;
							case 'view-perbaikan':
								include "admin/perbaikan/view_perbaikan.php";
								break;
							case 'view-perbaikan-sales':
								include "sales/perbaikan/view_perbaikan.php";
								break;
							case 'view-perbaikan-teknisipemasangan':
								include "teknisipemasangan/perbaikan/view_perbaikan.php";
								break;
							case 'view-perbaikan-teknisiperbaikan':
								include "teknisiperbaikan/perbaikan/view_perbaikan.php";
								break;
							case 'laporan-perbaikan':
								include "admin/perbaikan/laporan_dataperbaikan.php";
								break;

							// Karyawan
							case 'data-karyawan':
								include "admin/karyawan/data_karyawan.php";
								break;
							case 'add-karyawan':
								include "admin/karyawan/add_karyawan.php";
								break;
							case 'edit-karyawan':
								include "admin/karyawan/edit_karyawan.php";
								break;
							case 'del-karyawan':
								include "admin/karyawan/del_karyawan.php";
								break;
							case 'view-karyawan':
								include "admin/karyawan/view_karyawan.php";
								break;
							case 'laporan-karyawan':
								include "admin/karyawan/laporan_karyawan.php";
								break;

							// Pemasangan
							case 'data-pemasangan':
								include "admin/pemasangan/data_pemasangan.php";
								break;
							case 'data-pemasangan-sales':
								include "sales/pemasangan/data_pemasangan.php";
								break;
							case 'data-pemasangan-teknisipemasangan':
								include "teknisipemasangan/pemasangan/data_pemasangan.php";
								break;
							case 'data-pemasangan-teknisiperbaikan':
								include "teknisiperbaikan/pemasangan/data_pemasangan.php";
								break;
							case 'add-pemasangan-sales':
								include "sales/pemasangan/add_pemasangan.php";
								break;
							case 'add-pemasangan-teknisipemasangan':
								include "teknisipemasangan/pemasangan/add_pemasangan.php";
								break;
							case 'edit-pemasangan-sales':
								include "sales/pemasangan/edit_pemasangan.php";
								break;
							case 'edit-pemasangan-teknisipemasangan':
								include "teknisipemasangan/pemasangan/edit_pemasangan.php";
								break;
							case 'del-pemasangan-sales':
								include "sales/pemasangan/del_pemasangan.php";
								break;
							case 'del-pemasangan-teknisipemasangan':
								include "teknisipemasangan/pemasangan/del_pemasangan.php";
								break;
							case 'view-pemasangan':
								include "admin/pemasangan/view_pemasangan.php";
								break;
							case 'view-pemasangan-sales':
								include "sales/pemasangan/view_pemasangan.php";
								break;
							case 'view-pemasangan-teknisipemasangan':
								include "teknisipemasangan/pemasangan/view_pemasangan.php";
								break;
							case 'view-antripemasangan-teknisipemasangan':
								include "teknisipemasangan/pemasangan/view_antripemasangan.php";
								break;
							case 'view-pemasangan-teknisiperbaikan':
								include "teknisiperbaikan/pemasangan/view_pemasangan.php";
								break;
							case 'laporan-pemasangan':
								include "admin/pemasangan/laporan_pemasangan.php";
								break;

							// Promosi
							case 'data-promosi':
								include "admin/promosi/data_promosi.php";
								break;
							case 'data-promosi-sales':
								include "sales/promosi/data_promosi.php";
								break;
							case 'data-promosi-teknisipemasangan':
								include "teknisipemasangan/promosi/data_promosi.php";
								break;
							case 'add-promosi-sales':
								include "sales/promosi/add_promosi.php";
								break;
							case 'add-promosi-modem-sales':
								include "sales/promosi/add_promosimodem.php";
								break;
							case 'edit-promosi-sales':
								include "sales/promosi/edit_promosi.php";
								break;
							case 'del-promosi-sales':
								include "sales/promosi/del_promosi.php";
								break;
							case 'view-promosi':
								include "admin/promosi/view_promosi.php";
								break;
							case 'view-promosi-sales':
								include "sales/promosi/view_promosi.php";
								break;
							case 'view-promosi-teknisipemasangan':
								include "teknisipemasangan/promosi/view_promosi.php";
								break;
							case 'laporan-promosi':
								include "admin/promosi/laporan_data_promosi.php";
								break;

							// Gaji
							case 'data-gaji':
								include "admin/gaji/data_gaji.php";
								break;
							case 'data-gaji_user2':
								include "admin/gaji/data_gaji_user2.php";
								break;
							case 'add-gaji':
								include "admin/gaji/add_gaji.php";
								break;
							case 'edit-gaji':
								include "admin/gaji/edit_gaji.php";
								break;
							case 'del-gaji':
								include "admin/gaji/del_gaji.php";
								break;
							case 'cetak-slip-gaji':
								include "profil&gaji/cetak-slip-gaji.php";
								break;
							case 'view-gaji':
								include "admin/gaji/view_gaji.php";
								break;
							case 'laporan-gaji':
								include "admin/gaji/laporan_data_gaji.php";
								break;
							
							// Pelanggan
							case 'data-pelanggan':
								include "admin/pelanggan/data_pelanggan.php";
								break;
							case 'data-pelanggan-sales':
								include "sales/pelanggan/data_pelanggan.php";
								break;
							case 'data-pelanggan-teknisipemasangan':
								include "teknisipemasangan/pelanggan/data_pelanggan.php";
								break;
							case 'data-pelanggan-teknisiperbaikan':
								include "teknisiperbaikan/pelanggan/data_pelanggan.php";
								break;
							case 'add-pelanggan':
								include "admin/pelanggan/add_pelanggan.php";
								break;
							case 'edit-pelanggan':
								include "admin/pelanggan/edit_pelanggan.php";
								break;
							case 'del-pelanggan':
								include "admin/pelanggan/del_pelanggan.php";
								break;
							case 'view-pelanggan':
								include "admin/pelanggan/view_pelanggan.php";
								break;
							case 'view-pelanggan-sales':
								include "sales/pelanggan/view_pelanggan.php";
								break;
							case 'view-pelanggan-teknisipemasangan':
								include "teknisipemasangan/pelanggan/view_pelanggan.php";
								break;
							case 'view-pelanggan-teknisiperbaikan':
								include "teknisiperbaikan/pelanggan/view_pelanggan.php";
								break;
							case 'laporan-pelanggan':
								include "admin/pelanggan/laporan_pelanggan.php";
								break;

							// Pengguna
							case 'data-pengguna':
								include "admin/pengguna/data_pengguna.php";
								break;
							case 'add-pengguna':
								include "admin/pengguna/add_pengguna.php";
								break;
							case 'edit-pengguna':
								include "admin/pengguna/edit_pengguna.php";
								break;
							case 'del-pengguna':
								include "admin/pengguna/del_pengguna.php";
								break;

							// Profil
							case 'data-profil':
								include "admin/profil/data_profil.php";
								break;
							case 'edit-profil':
								include "admin/profil/edit_profil.php";
								break;

							// Laporan
							case 'data-laporan':
								include "admin/laporan/perpanjang.php";
								break;
							case 'cetak':
								include "admin/laporan/cetak.php";
								break;

							// Laporan
							case 'data-report':
								include "report/cetak-data-member.php";
								break;
							case 'cetak':
								include "admin/laporan/cetak.php";
								break;

							// Default
							default:
								echo "<center><h1> ERROR 404: not found!</h1></center>";
								break;
							
								// Profil
								case 'data-profil':
									include "admin/profil/data_profil.php";
									break;
								case 'edit-profil':
									include "admin/profil/edit_profil.php";
									break;

								// laporan
								case 'data-laporan':
									include "admin/laporan/perpanjang.php";
									break;
								case 'cetak':
									include "admin/laporan/cetak.php";
									break;
									// laporan
								case 'data-report':
									include "report/cetak-data-member.php";
									break;
								case 'cetak':
									include "admin/laporan/cetak.php";
									break;
	
						}
					} else {
						// Auto Halaman Home Pengguna
						if ($data_level == "Admin_Karyawan") {
							include "home/Karyawan.php";
						}elseif($data_level == "Sales") {
							include "home/Sales.php";
						}elseif($data_level == "Teknisi_Pemasangan") {
							include "home/Teknisi_Pemasangan.php";
						}elseif($data_level == "Teknisi_Perbaikan") {
							include "home/Teknisi_Perbaikan.php";
						}
					}
					?>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer mt-5">
			<div class="float-right d-none d-sm-block">
				<span>PT TELKOM INDONESIA INDIHOME MARABAHAN</span>
			</div>
			<b>Marabahan 2023</b>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

</body>

</html>