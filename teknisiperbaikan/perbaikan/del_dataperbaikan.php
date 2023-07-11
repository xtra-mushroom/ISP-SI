<?php

if(isset($_GET['kode'])){
    $idPerbaikan = $_GET['kode'];
    $sql_cek = "SELECT * FROM tb_perbaikan WHERE id_perbaikan=$idPerbaikan";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<?php
    $idKeluhan = $data_cek['id_keluhan'];
    $sql_hapus = "DELETE FROM tb_perbaikan WHERE id_perbaikan=$idPerbaikan;";
    $sql_hapus .= "UPDATE tb_keluhan SET status_penanganan = 'Belum Ditangani' WHERE id_keluhan = $idKeluhan;";
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
