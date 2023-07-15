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

function rupiah($angka){
	$hasil_rupiah = "Rp. " . number_format($angka,0,',','.');
	return $hasil_rupiah;
}

$tgl_awal = @$_GET['tgl_awal'];
$tgl_akhir = @$_GET['tgl_akhir'];

?>

<html>

<head>
    <title>Report Data Biaya Pemasangan (<?php echo $tgl_awal." sd ".$tgl_akhir ?>)</title>
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
  
    if(empty($tgl_awal) && empty($tgl_akhir)){
        $query = "SELECT tb_pemasangan.*, tb_promosi.* FROM tb_pemasangan INNER JOIN tb_promosi ON tb_pemasangan.nik = tb_promosi.nik";
        $query1 = "SELECT id_pemasangan, SUM(total_biaya) AS sum_biaya, AVG(total_biaya) AS avg_biaya FROM tb_pemasangan LIMIT 10;";
        $label = "Semua Data Pemasangan";
    }else{  
        $query = "SELECT tb_pemasangan.*, tb_promosi.* FROM tb_pemasangan INNER JOIN tb_promosi ON tb_pemasangan.nik = tb_promosi.nik WHERE tb_pemasangan.tanggal_pasang BETWEEN '$tgl_awal' AND '$tgl_akhir'";
        $query1 = "SELECT id_pemasangan, SUM(total_biaya) AS sum_biaya, AVG(total_biaya) AS avg_biaya FROM tb_pemasangan WHERE tanggal_pasang BETWEEN '$tgl_awal' AND '$tgl_akhir';";
        $label = "Data Pemasangan Periode Tanggal : <b>".tgl_indo($tgl_awal)."</b> s/d <b>".tgl_indo($tgl_akhir)."</b>";
    }
    ?>

    <img src="../assets/images/logo2.png" align=left width="180">
    <img src="../assets/images/logo3.png" align=right height="80" width="120">

    <h2 style="text-align:center; margin-top: 20px;">INDIHOME</h2>
    <h3 style="text-align:center; margin-top: 20px;">MARABAHAN</h3>
    
    <hr>
    <h3 style="text-align:center; margin-top: 20px;">LAPORAN DATA BIAYA PEMASANGAN</h3>
  
    <hr>
    <div style="width:100%;text-align:right;"><?php echo $label ?></div>

    <table class="table" align=center width="670" border="1" style="margin-top: 20px; text-align:center;">
        <tr style="background:#62d9c7">
            <th width="40">No</th>
			<th width="110">ID Pemasangan</th>
			<th width="110">NIK</th>
			<th width="150">Nama</th>
			<th width="130">Alamat</th>
			<th width="80">Jenis Paket</th>
			<th width="120">Total Biaya</th>
			<th width="100">Tanggal Pasang</th>
			<th width="50">ID Teknisi</th>
        </tr>

        <?php
        $no = 1;
        $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            $sql1 = mysqli_query($koneksi, $query1);
            $data1 = mysqli_fetch_array($sql1);
            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                echo "<tr>";
				echo "<td>" . $no++ . "</td>";
				echo "<td>" . $data['id_pemasangan'] . "</td>";
				echo "<td>" . $data['nik'] . "</td>";
				echo "<td align='left'>" . $data['nama'] . "</td>";
				echo "<td align='left'>" . $data['alamat'] . "</td>";
				echo "<td align='center'>" . $data['jenis_paket'] . "</td>";
				echo "<td align='right' width='120'>" . rupiah($data['total_biaya']). "</td>";
				echo "<td align='center'>" . tgl_indo($data['tanggal_pasang']) . "</td>";
				echo "<td align='center'>" . $data['id_teknisipemasangan'] . "</td>";
				echo "</tr>";
            }
            $sumBiaya = $data1['sum_biaya'];
            $avgBiaya = $data1['avg_biaya'];
            echo "<tr>";
            echo "<td colspan='5' align='right'><b>Total Biaya Pemasangan Masuk</b></td>";
            echo "<td colspan='2' align='right'><b>".rupiah($sumBiaya)."</b></td>";
            echo "<td colspan='2'></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td colspan='5' align='right'><b>Rata-Rata Biaya Pemasangan Masuk</b></td>";
            echo "<td colspan='2' align='right'><b>".rupiah($avgBiaya)."</b></td>";
            echo "<td colspan='2'></td>";
            echo "</tr>";
        } else { // Jika data tidak ada
            echo "<tr><td colspan='9'>Data tidak ada</td></tr>";
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
