<?php
if(isset($_GET['kode'])){
    $id = $_GET['kode'];
    $idUser = $_SESSION['ses_id'];
	$aktivitas = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"." (Menghapus data pengguna sistem)";

    $sql_hapus = "DELETE FROM tb_pengguna WHERE id_pengguna=$id;";
	$sql_hapus .= "INSERT INTO log_aktivitas VALUES (null, '$aktivitas', $idUser, null);";
    $query_hapus = mysqli_multi_query($koneksi, $sql_hapus);

    if($query_hapus){
        echo "<script>
        Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pengguna';
            }
        })</script>";
    }else{
        echo "<script>
        Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pengguna';
            }
        })</script>";
    }
}

