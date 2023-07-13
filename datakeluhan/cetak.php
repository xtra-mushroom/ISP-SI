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

$tgl_awal = @$_GET['tgl_awal'];
$tgl_akhir = @$_GET['tgl_akhir'];

?>

<html>

<head>
    <title>Report Data Keluhan (<?php echo $tgl_awal." sd ".$tgl_akhir ?>)</title>
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
  
    if(empty($tgl_awal) && empty($tgl_akhir)){
        $query = "SELECT tb_keluhan.*, tb_pelanggan.nama_pelanggan, tb_pelanggan.alamat_pelanggan, tb_pelanggan.no_hp_pelanggan FROM tb_keluhan INNER JOIN tb_pelanggan ON tb_keluhan.id_pelanggan = tb_pelanggan.id_pelanggan";
        $label = "Semua Data Keluhan";
    }else{  
        $query = "SELECT tb_keluhan.*, tb_pelanggan.nama_pelanggan, tb_pelanggan.alamat_pelanggan, tb_pelanggan.no_hp_pelanggan FROM tb_keluhan INNER JOIN tb_pelanggan ON tb_keluhan.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_keluhan.tanggal_keluhan BETWEEN '$tgl_awal' AND '$tgl_akhir'";
        $label = "Data Keluhan Periode Tanggal : <b>".tgl_indo($tgl_awal)."</b> s/d <b>".tgl_indo($tgl_akhir)."</b>";
    }
    ?>

    <img src="../admin/assets/images/logo2.png" align=left width="180">
    <img src="../admin/assets/images/logo3.png" align=right height="80" width="120">

    <h2 style="text-align:center; margin-top: 20px;">INDIHOME</h2>
    <h3 style="text-align:center; margin-top: 20px;">MARABAHAN</h3>
    
    <hr>
    <h3 style="text-align:center; margin-top: 20px;">LAPORAN DATA KELUHAN</h3>
  
    <hr>
    <div style="width:100%;text-align:right;"><?php echo $label ?></div>

    <table class="table" align=center width="670" border="1" style="margin-top: 20px; text-align:center;">
        <tr style="background:#62d9c7">
           <th width="40">No</th>
			<th width="110">ID Pelanggan</th>
			<th width="110">Nama</th>
			<th width="130">Alamat</th>
			<th width="110">Nomor HP</th>
			<th width="100">Tanggal Keluhan</th>
			<th width="160">Isi Keluhan</th>
			<th width="80">ID Karyawan</th>
			<th width="90">Status Penanganan</th>
        </tr>

        <?php
        $no = 1;
        $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                echo "<tr>";
				echo "<td>" . $no++ . "</td>";
				echo "<td>" . $data['id_pelanggan'] . "</td>";
				echo "<td>" . $data['nama_pelanggan'] . "</td>";
				echo "<td>" . $data['alamat_pelanggan'] . "</td>";
				echo "<td>" . $data['no_hp_pelanggan'] . "</td>";
				echo "<td align='center'>" . tgl_indo($data['tanggal_keluhan']). "</td>";
				echo "<td>" . $data['isi_keluhan'] . "</td>";
                echo "<td align='center'>" . $data['id_karyawan'] . "</td>";
				if($data['status_penanganan'] == "Sudah Ditangani"){
                    echo "<td align='center' style='color:green'>" . $data['status_penanganan'] . "</td>";
				}elseif($data['status_penanganan'] == "Belum Ditangani"){
                    echo "<td align='center' style='color:red'>" . $data['status_penanganan'] . "</td>";
				}
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
