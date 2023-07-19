<?php

if(isset($_GET['kode'])){
    $nik = $_GET['kode'];
}
?>

<?php
	$idUser = $_SESSION['ses_id'];
	$aktivitas = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"." (Menghapus data promosi)";

    $sql_hapus = "DELETE FROM tb_promosi WHERE nik='$nik';";
	$sql_hapus .= "INSERT INTO log_aktivitas VALUES (null, '$aktivitas', $idUser, null);";
    $query_hapus = mysqli_multi_query($koneksi, $sql_hapus);
    if($query_hapus) {
        echo "<script>
        Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-promosi-sales'
        ;}})</script>";
    }else{
        echo "<script>
        Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-promosi-sales'
        ;}})</script>";
    }
