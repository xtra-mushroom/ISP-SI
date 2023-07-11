<?php

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($rows = mysqli_fetch_assoc($result)){
        $rows[] = $rows;
    }
    return $rows;
}

function alertWindow($msg) {       
    echo "<script type ='text/JavaScript'>";  
    echo "alert('$msg');";  
    echo "</script>";   
}

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
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

function Terbilang($x)   
 {   
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

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function sendSms($noHp, $pesan){
    $idMesin = "191"; // sesuaikan dengan ID Mesin di aplikasi SMS Gateway
    $pin = "015601"; // sesuaikan dengan PIN di aplikasi SMS Gateway

    $pesan = str_replace(" ", "%20", $pesan);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://sms.indositus.com/sendsms.php?idmesin=$idMesin&pin=$pin&to=$noHp&text=$pesan");
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $output = curl_exec($ch);

    curl_close($ch);

    return $output;
}

function TimeAgo($waktu)
{
    $waktu      = time()-$waktu;
    $waktu      = ($waktu < 1) ? 1 : $waktu;
    $waktuarr   = array (
        31536000    => 'tahun',
        2592000     => 'bulan',
        604800      => 'minggu',
        86400       => 'hari',
        3600        => 'jam',
        60          => 'menit',
        1           => 'detik'
    );

    foreach($waktuarr as $ambilwaktu => $text) 
    {
        if ($waktu < $ambilwaktu) continue;

        return floor($waktu / $ambilwaktu).' '.$text;
    }
}
