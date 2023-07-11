<?php
if(isset($_GET['kode']) && isset($_GET['nik'])){
    $idPasang = $_GET['kode'];
    $nik = $_GET['nik'];
    // $sql_cek = "SELECT * FROM tb_pemasangan WHERE nik='".$_GET['kode']."'";
    // $query_cek = mysqli_query($koneksi, $sql_cek);
    // $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<?php
    // $foto= $data_cek['foto'];
    // if (file_exists("foto/$foto")){
    //     unlink("foto/$foto");
    // }

    $sql = "DELETE FROM tb_pemasangan WHERE id_pemasangan='$idPasang';";
    $sql .= "DELETE FROM tb_pelanggan WHERE nik_pelanggan='$nik';";
    $sql .= "UPDATE tb_promosi SET status_pasang='BELUM' WHERE nik='$nik';";
    $query_hapus = mysqli_multi_query($koneksi, $sql);
    if($query_hapus){
        echo "<script>
        Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-pemasangan-teknisipemasangan'
        ;}})</script>";
    }else{
        echo "<script>
        Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-pemasangan-teknisipemasangan'
        ;}})</script>";
    }
