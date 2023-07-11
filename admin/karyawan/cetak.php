<?php
ob_start();

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
	return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

?>

<html>

<head>
    <title>Cetak PDF</title>
    <style>
        .table {
            border-collapse: collapse;
            table-layout: fixed;
            width: 630px;
        }

        .table th {
            padding: 5px;
        }

        .table td {
            word-wrap: break-word;
            width: 20%;
            padding: 5px;
        }
    </style>
</head>

<body>
    <?php
    // Load file koneksi.php
    include "../../inc/koneksi.php";
  
    $tipe = @$_GET['tipe'];
    if(empty($tipe)){
        $query = "SELECT * FROM tb_karyawan";
        $url_cetak = "admin/karyawan/cetak.php";
        $label = "Tipe Karyawan : <b>Semua Tipe</b>";
    }elseif($tipe == "Pengguna Sistem"){  
        $query = "SELECT * FROM tb_karyawan WHERE posisi = 'Admin' OR posisi = 'Sales' OR posisi = 'Teknisi Pemasangan' OR posisi = 'Teknisi Perbaikan'";
        $url_cetak = "admin/karyawan/cetak.php?tipe=Pengguna+Sistem";
        $label = 'Tipe Karyawan : <b>Pengguna Sistem</b>';
    }elseif($tipe == "Non Pengguna Sistem"){
		$query = "SELECT * FROM tb_karyawan WHERE posisi != 'Admin' AND posisi != 'Sales' AND posisi != 'Teknisi Pemasangan' AND posisi != 'Teknisi Perbaikan'";
        $url_cetak = "admin/karyawan/cetak.php?tipe=Non+Pengguna+Sistem";
        $label = 'Tipe Karyawan : <b>Non Pengguna Sistem</b>';
	}
    ?>

    <img src="../assets/images/logo2.png" align=left width="180">
    <img src="../assets/images/logo3.png" align=right height="80" width="120">

    <h2 style="text-align:center; margin-top: 20px;"> INDIHOME </h2>
    <h3 style="text-align:center; margin-top: 20px;">MARABAHAN</h3>
    
    <hr>
    <h3 style="text-align:center; margin-top: 20px;">LAPORAN DATA KARYAWAN</h3>
  
    <hr>
    <div style="width:100%;text-align:right;"><?php echo $label ?></div>

    <table class="table" align=center width="670" border="1" style="margin-top: 20px; text-align:center;">
        <tr>
           <th width="40">No</th>
			<th width="100">NIK</th>
			<th width="150">Nama</th>
			<th width="80">Jenis Kelamin</th>
			<th width="140">Tempat, Tanggal Lahir</th>
			<th width="130">Alamat</th>
			<th width="110">Nomor HP</th>
			<th width="140">Posisi/Jabatan</th>
        </tr>

        <?php
        $no = 1;
        $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                echo "<tr>";
				echo "<td>" . $no++ . "</td>";
				echo "<td>" . $data['nik_karyawan'] . "</td>";
				echo "<td>" . $data['nama_karyawan'] . "</td>";
				echo "<td>" . $data['jenis_kelamin'] . "</td>";
				echo "<td>" . $data['tempat_lahir'].", ".tgl_indo($data['tanggal_lahir']) . "</td>";
				echo "<td>" . $data['alamat_karyawan'] . "</td>";
				echo "<td>" . $data['no_hp_karyawan'] . "</td>";
				echo "<td align='center'>" . $data['posisi'] . "</td>";
                echo "</tr>";
            }
        } else { // Jika data tidak ada
            echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
        }
        ?>
    </table>

    <br />
	<br />
	<br />
	<table align="right" width="100%">
        <tr>
            <td width="40%"></td>
            <td width="20%"></td>
            <td align="center">Marabahan, <?php echo tgl_indo(date('Y-m-d')); ?></td>
        </tr>
        <tr>
            <td align="center"><br><br><br></td>
            <td></td>
            <td align="center">Kepala kantor<br><br><br><br></td>
        </tr>
        <tr>
            <td align="center"></td>
            <td></td>
            <td align="center"><u>Demitri Erlangga, SE</u><br>NIK 1987654321</td>
        </tr>
    </table>
    <script>
		window.print();
	</script>
</body>

</html>
<?php

?>