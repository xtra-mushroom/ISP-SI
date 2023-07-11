<?php ob_start(); ?>

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
    include "koneksi.php";
   
        $query = "select tb_pegawai.*, tb_datapelajaran.id_ajar, tb_datapelajaran.mapel from tb_pegawai
		inner join tb_datapelajaran on tb_pegawai.id_ajar = tb_datapelajaran.id_ajar";

        $label = "Semua Data Guru PNS";
   
    ?>
<img src="../assets/images/mahesa2.png" align=left height="210" width="170">
    <img src="../assets/images/mahesa3.png" align=right height="210" width="170">

    <h3 style="font-size: 40px; align=center;: 200px;  font-weight: bold;"> PEMERINTAHAN KOTA BANJARMASIN </h3>
    <h2 style="font-size: 40px; align=center;: 200px;  font-weight: bold;"> DINAS PENDIDIKAN </h2>

    <p style="align=center;:300px; font-size: 20px;">Alamat : Jl. Kapten Piere Tendean No.29, RT.40, Gadang, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70231</p>
    <hr>
    <h3 style="text-align:center; margin-top: 20px;">LAPORAN DATA SEKOLAH</h3>
    <span style="margin-left: 520px;"><?php echo $label ?></span>

    <hr>
    <table class="table" align=center width="550" border="1" style="margin-top: 10px; text-align:center;">
        <tr>
            <th>No</th>
           
            <th>id_ajar</th>
							<th>Nama</th>
						
							<th>Mulai PNS</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
							<th>agama</th>
							<th>alamat</th>
							<th>no_hp</th>
							<th>Mata Pelajaran</th>
                            <th>Nama Sekolah</th>
           

        </tr>
        <?php
        $no = 1;
        $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
              
                
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                
                echo "<td>" . $data['id_ajar'] . "</td>";
								
								echo "<td>" . $data['nama'] . "</td>";
					
								echo "<td>" . $data['mulai_pns'] . "</td>";
                                echo "<td>" . $data['tempat_lahir'] . "</td>";
                                echo "<td>" . $data['tgl_lahir'] . "</td>";
								echo "<td>" . $data['agama'] . "</td>";
								echo "<td>" . $data['alamat'] . "</td>";
								echo "<td>" . $data['no_hp'] . "</td>";
								echo "<td>" . $data['mapel'] . "</td>";
                                echo "<td>" . $data['nama_sekolah'] . "</td>";
              
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
            <td align="center">Banjarmasin, <?php echo date('d F Y'); ?></td>
        </tr>
        <tr>
            <td align="center"><br><br><br></td>
            <td></td>
            <td align="center">Kepala Dinas Pendidikan<br><br><br></td>
        </tr>
        <tr>
            <td align="center"></td>
            <td></td>
            <td align="center"><u>Nuryadi, S.Pd.,MA</u><br> id_ajar. 19670413198804 1 004</td>
        </tr>
    </table>

</body>

</html>
<?php
$html = ob_get_contents();

require '../assets/libraries/html2pdf/autoload.php';
ob_end_clean();
$pdf = new Spipu\Html2Pdf\Html2Pdf('L', 'F4', 'en');
$pdf->WriteHTML($html);
ob_end_clean();
$pdf->Output('Data Guru.pdf', 'I');
?>