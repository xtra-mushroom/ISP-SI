<?php
if(isset($_GET['kode'])){
    $idPerbaikan = $_GET['kode'];
    $sql_cek = "SELECT * FROM tb_perbaikan WHERE id_perbaikan=$idPerbaikan";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}

	$idTeknisi = $_SESSION['ses_id'];
    $idKeluhan = $data_cek['id_keluhan'];
	$aktivitas = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"." (Menghapus data perbaikan)";

    $sql_hapus = "DELETE FROM tb_perbaikan WHERE id_perbaikan=$idPerbaikan;";
    $sql_hapus .= "UPDATE tb_keluhan SET status_penanganan = 'Belum Ditangani' WHERE id_keluhan = $idKeluhan;";
	$sql_hapus .= "INSERT INTO log_aktivitas VALUES (null, '$aktivitas', $idTeknisi, null);";

    $query_hapus = mysqli_multi_query($koneksi, $sql_hapus);
    if ($query_hapus) {
        echo "<script>
        Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-perbaikan-teknisiperbaikan'
        ;}})</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-perbaikan-teknisiperbaikan'
        ;}})</script>";
    }
