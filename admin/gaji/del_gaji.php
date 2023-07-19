<?php

if(isset($_GET['kode'])){
    $sql_cek = "SELECT * FROM tb_gaji WHERE id_gaji='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<?php
    $idGaji = $_GET['kode'];
    $id = $_SESSION['ses_id'];
    $aktivitas = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"." (Menghapus data gaji)";

    $sql_hapus = "DELETE FROM tb_gaji WHERE id_gaji=$idGaji;";
	$sql_hapus .= "INSERT INTO log_aktivitas VALUES (null, '$aktivitas', $id, null);";
    $query_hapus = mysqli_multi_query($koneksi, $sql_hapus);

    if ($query_hapus) {
        echo "<script>
        Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-gaji'
        ;}})</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-gaji'
        ;}})</script>";
    }
