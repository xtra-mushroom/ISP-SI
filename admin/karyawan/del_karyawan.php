<?php

if(isset($_GET['kode'])){
    $sql_cek = "SELECT * FROM tb_karyawan WHERE id='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<?php
    $foto= $data['foto'];
    if(file_exists("profil&gaji/fotokaryawan/$foto")){
        unlink("profil&gaji/fotokaryawan/$foto");
    }

    $sql_hapus = "DELETE FROM tb_karyawan WHERE id='".$_GET['kode']."'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);
    if ($query_hapus) {
        echo "<script>
        Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-karyawan'
        ;}})</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-karyawan'
        ;}})</script>";
    }
