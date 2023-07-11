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
  
    $query = "select tb_promosi.*, tb_pelanggan.id_pelanggan,  tb_pelanggan.namapelanggan,  tb_pelanggan.alamat from tb_promosi
		inner join  tb_pelanggan on tb_promosi.id_pelanggan =  tb_pelanggan.id_pelanggan";
    ?>

<img src="../assets/images/logo2.png" align=left height="80" width="120">
    <img src="../assets/images/logo3.png" align=right height="80" width="120">

    <h2 style="text-align:center; margin-top: 20px;"> INDIHOME </h2>


    <h3 style="text-align:center; margin-top: 20px;">MARABAHAN</h3>
    
    <hr>
    <h3 style="text-align:center; margin-top: 20px;">LAPORAN DATA KARYAWAN</h3>
  

    <hr>
    <table class="table" align=center width="670" border="1" style="margin-top: 10px; text-align:center;">
        <tr>
           <th width="50">No</th>
           <th width="100">nama</th>
							
							 <th width="100">nik</th>
							 
							 <th width="100">nama pelanggan</th>
							 <th width="100">alamat</th>
           

        </tr>
        <?php
        $no = 1;
        $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
              
                
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $data['nama'] . "</td>";
                echo "<td>" . $data['nik'] . "</td>";
								
								echo "<td>" . $data['namapelanggan'] . "</td>";
								echo "<td>" . $data['alamat'] . "</td>";
							
              
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
            <td align="center">Marabahan, <?php echo date('d F Y'); ?></td>
        </tr>
        <tr>
            <td align="center"><br><br><br></td>
            <td></td>
            <td align="center">Kepala kantor<br><br><br></td>
        </tr>
        <tr>
            <td align="center"></td>
            <td></td>
            <td align="center"><u>Demitri Erlangga, SE</u><br></td>
        </tr>
    </table>
    <script>
		window.print();
	</script>
</body>

</html>
<?php

?>