<?php
	include "../inc/koneksi.php";

    function rupiah($angka){
        $hasil_rupiah = "Rp. " . number_format($angka,0,',','.');
        return $hasil_rupiah;
     
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
	
$nik = $_GET['nik'];

$sql_cek = "SELECT * FROM tb_profil";
$query_cek = mysqli_query($koneksi, $sql_cek);
$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
{
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    $idKaryawan = $_GET['karyawan'];
    $idGaji = $_GET['kode'];
    $bulan = substr($idGaji,0,1);
    $tahun = substr($idGaji,1,4);
    $bulanGaji = $bulan."-".$tahun;
    ?>
	<title>slip-gaji-<?php echo $bulanGaji."-".$idKaryawan ?></title>
</head>

<body>
	<img src="../dist/img/logo2.webp" align=left width="180" style="margin-left:2%;">
	<center style="margin-left:2%;">

        <h2>
            <?php echo $data_cek['nama_perusahaan']; ?> <br>
			<?php echo $data_cek['nama_produk']; ?>
		</h2>
		<h4>
			<?php echo $data_cek['alamat']; ?>
			<br />
			<br />
			<hr size="3px" color="black"/>
        </h4>
    </center>

	<?php
		}
        $sql_tampil = "SELECT tb_gaji.*, tb_karyawan.* FROM tb_gaji INNER JOIN tb_karyawan ON tb_gaji.id_karyawan = tb_karyawan.id WHERE tb_gaji.id_gaji = $idGaji";
		$query_tampil = mysqli_query($koneksi, $sql_tampil);
		while($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)){
	?>

	<center>
		<h3>
			<u>SLIP GAJI</u>
		</h3>
	</center>

	<table border="0" cellspacing="0" style="width: 90%" align="center">
		<tbody>
			<tr>
				<td width="200px">Nama</td>
				<td>:</td>
				<td>
					<?php echo $data['nama_karyawan']; ?>
				</td>
			</tr>
            <tr>
				<td>ID Karyawan</td>
				<td>:</td>
				<td>
					<?php echo $data['id_karyawan']; ?>
				</td>
			</tr>
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td>
					<?php echo $data['nik_karyawan']; ?>
				</td>
			</tr>
			<tr>
				<td>Tempat, Tanggal lahir</td>
				<td>:</td>
				<td>
					<?php echo $data['tempat_lahir'].", ".tgl_indo($data['tanggal_lahir']); ?>
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td>
					<?php echo $data['jenis_kelamin']; ?>
				</td>
			</tr>
			<tr>
				<td>Posisi Jabatan</td>
				<td>:</td>
				<td>
					<?php echo $data['posisi']; ?>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td>
					<?php echo $data['alamat_karyawan']; ?>
				</td>
			</tr>
			<tr>
				<td>Nomor HP</td>
				<td>:</td>
				<td>
					<?php echo $data['no_hp_karyawan']; ?>
				</td>
			</tr>
			<tr>
				<td>Periode Gaji</td>
				<td>:</td>
				<td>
					<?php echo $data['bulan']."-".$data['tahun']; ?>
				</td>
			</tr>
		</tbody>
	</table>

    <br><hr><br>

    <table border="0" cellspacing="0" style="width:300px;margin-left:5%;" align="left">
		<tbody>
			<tr>
				<td>Gaji Pokok</td>
				<td>:</td>
				<td align="right">
					<?php echo rupiah($data['gaji_pokok']); ?>
				</td>
                <td></td>
			</tr>
            <tr>
				<td>Bonus</td>
				<td>:</td>
				<td align="right">
					<?php echo rupiah($data['bonus']); ?>
				</td>
                <td></td>
			</tr>
			<tr>
				<td>Tunjangan</td>
				<td>:</td>
				<td align="right">
					-
				</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr size="2px" color="black"/>
                </td>
                <td style="font-weight:bold;color:black;">+</td>
            </tr>
            <tr>
				<td align="right" colspan="3">
					<?php $gaji = $data['gaji_pokok']+$data['bonus']; echo rupiah($gaji); ?>
				</td>
            </tr>
            <tr>
				<td>Potongan</td>
				<td>:</td>
				<td align="right">
					-
				</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr size="2px" color="black"/>
                </td>
                <td style="font-weight:bold;color:black;">-</td>
            </tr>
            <tr style="color:black;font-weight:bold;">
				<td>Total Gaji</td>
				<td>:</td>
				<td align="right">
					<?php echo rupiah($gaji) ?>
				</td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <?php } ?>

    <br>
    <table border="0" cellspacing="0" style="width:80%;margin-left:5%;margin-top:20px;margin-bottom:50px;" align="left">
        <tbody>
            <tr style="color:black;font-weight:bold;background-color:grey;">
				<td>Terbilang :</td>
				<td></td>
				<td align="center">
					<?php echo Terbilang($gaji) ?>
				</td>
                <td></td>
            </tr>
        </tbody>
    </table>

	<br>

	<table width="100%">
        <tr>
            <td width="40%"></td>
            <td width="20%"></td>
            <td align="center">Marabahan, <?php echo tgl_indo(date('Y-m-d')); ?></td>
        </tr>
        <tr>
            <td align="center"><br><br><br></td>
            <td></td>
            <td align="center">Kepala kantor<br><br><br></td>
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