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

$limit = @$_GET['limit'];

?>

<html>

<head>
    <title>Report Data Log Aktvitas Pengguna Sistem</title>
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
    include "../inc/koneksi.php";
  
    if(empty($limit)){
        $query = "SELECT * FROM log_aktivitas ORDER BY timestamp DESC LIMIT 15";
        $label = "15 Log Aktivitas Terbaru";
    }else{  
        $query = "SELECT * FROM log_aktivitas ORDER BY timestamp DESC LIMIT $limit";
        $label = "$limit Log Aktivitas Terbaru";
    }
    ?>

    <img src="../admin/assets/images/logo2.png" align=left width="180">
    <img src="../admin/assets/images/logo3.png" align=right height="80" width="120">

    <h2 style="text-align:center; margin-top: 20px;">INDIHOME</h2>
    <h3 style="text-align:center; margin-top: 20px;">MARABAHAN</h3>
    
    <hr>
    <h3 style="text-align:center; margin-top: 20px;">LAPORAN DATA LOG AKTIVITAS PENGGUNA SISTEM</h3>
  
    <hr>
    <div style="width:100%;text-align:right;"><?php echo $label ?></div>

    <table class="table" align=center width="670" border="1" style="margin-top: 20px; text-align:center;">
        <tr style="background:#62d9c7">
            <th width='40'>No</th>
			<th width='70'>ID Pengguna</th>
			<th width='530'>Akses URL Server</th>
			<th width='200'>Keterangan Aktivitas</th>
			<th width='120'>Timestamp</th>
        </tr>

        <?php
        $no = 1;
        $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                $expl = explode(" ", $data['aktivitas']);
				echo "<tr>";
				echo "<td>" . $no++ . "</td>";
				echo "<td align='center'>" . $data['id_karyawan'] . "</td>";
				echo "<td>" . $expl[0] . "</td>";
				echo "<td>" . $expl[1]." ".$expl[2]." ".$expl[3]." ".$expl[4]. "</td>";
				echo "<td>" . $data['timestamp'] . "</td>";
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
