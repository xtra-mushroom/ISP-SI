<?php 
require "inc/koneksi.php";

$id_pelanggan = $_GET['id_pelanggan'];

// var_dump($id_pelanggan);

$query = mysqli_query($koneksi, "SELECT nama_pelanggan, alamat_pelanggan, no_hp_pelanggan FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan';");
$pelanggan = mysqli_fetch_array($query);
$data = array(
    'nama_pelanggan' => @$pelanggan['nama_pelanggan'],
    'alamat_pelanggan' => @$pelanggan['alamat_pelanggan'],
    'no_hp_pelanggan' => @$pelanggan['no_hp_pelanggan']);

echo json_encode($data);