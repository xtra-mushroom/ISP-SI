<?php

if(isset($_GET['kode'])){
    $id = $_GET['kode'];
}

$sql_hapus = "DELETE FROM tb_keluhan WHERE id_keluhan=$id";
$query_hapus = mysqli_query($koneksi, $sql_hapus);
if ($query_hapus) {
    echo "<script>
    Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value) {window.location = 'index.php?page=data-keluhan'
    ;}})</script>";
}else{
    echo "<script>
    Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value) {window.location = 'index.php?page=data-keluhan'
    ;}})</script>";
}
