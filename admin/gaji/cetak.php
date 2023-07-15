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

$bulan = @$_GET['bulan'];
$tahun = @$_GET['tahun'];

?>

<html>

<head>
    <title>Report Data Gaji (<?php echo $bulan."-".$tahun ?>)</title>
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
  
    if(empty($bulan) && empty($bulan)){
        $query = "SELECT * FROM tb_gaji LIMIT 30";
        $query1 = "SELECT (SUM(gaji_pokok) + SUM(bonus)) AS sum_gaji, (AVG(gaji_pokok) + AVG(bonus)) AS avg_gaji FROM tb_gaji LIMIT 30";
        $label = "30 Data Gaji Terbaru";
    }else{  
        $query = "SELECT * FROM tb_gaji WHERE bulan = $bulan AND tahun = $tahun";
        $query1 = "SELECT (SUM(gaji_pokok) + SUM(bonus)) AS sum_gaji, (AVG(gaji_pokok) + AVG(bonus)) AS avg_gaji FROM tb_gaji WHERE bulan = $bulan AND tahun = $tahun";
        $label = "Data Gaji Periode Bulan <b>".$bulan."</b> dan Tahun <b>".$tahun."</b>";
    }
    ?>

    <img src="../assets/images/logo2.png" align=left width="180">
    <img src="../assets/images/logo3.png" align=right height="80" width="120">

    <h2 style="text-align:center; margin-top: 20px;">INDIHOME</h2>
    <h3 style="text-align:center; margin-top: 20px;">MARABAHAN</h3>
    
    <hr>
    <h3 style="text-align:center; margin-top: 20px;">LAPORAN DATA GAJI</h3>
  
    <hr>
    <div style="width:100%;text-align:right;"><?php echo $label ?></div>

    <table class="table" align=center width="670" border="1" style="margin-top: 20px; text-align:center;">
        <tr style="background:#62d9c7">
            <th width="40">No</th>
			<th width="110">ID Gaji</th>
			<th width="110">ID Karyawan</th>
			<th width="150">Posisi/Jabatan</th>
			<th width="120">Gaji Pokok</th>
			<th width="120">Bonus</th>
			<th width="120">Total Gaji</th>
			<th width="60">Bulan</th>
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
                echo "<td align='center'>" . $data['id_gaji'] . "</td>";
                echo "<td align='center'>" . $data['id_karyawan'] . "</td>";
                echo "<td>" . $data['posisi'] . "</td>";
                echo "<td align='right' width='120'>" . rupiah($data['gaji_pokok']). "</td>";
                echo "<td align='right' width='120'>" . rupiah($data['bonus']). "</td>";
                echo "<td align='right' width='120'>" . rupiah($data['bonus']+$data['gaji_pokok']). "</td>";
                echo "<td align='center'>" . $data['bulan']."-".$data['tahun'] . "</td>";
                echo "</tr>";
            }
            $sumGaji = $data1['sum_gaji'];
            $avgGaji = $data1['avg_gaji'];
            echo "<tr>";
            echo "<td colspan='4' align='right'><b>Total Pengeluaran Gaji</b></td>";
            echo "<td colspan='3' align='right'><b>".rupiah($sumGaji)."</b></td>";
            echo "<td colspan='2'></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td colspan='4' align='right'><b>Rata-Rata Pengeluaran Gaji Untuk Satu Karyawan</b></td>";
            echo "<td colspan='3' align='right'><b>".rupiah($avgGaji)."</b></td>";
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
