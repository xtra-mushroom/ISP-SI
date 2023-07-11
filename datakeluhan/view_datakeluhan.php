<?php
if(isset($_GET['kode']) && isset($_GET['pel'])){
	$idKeluhan = $_GET['kode'];
	$idPelanggan = $_GET['pel'];
    $sql_cek = "SELECT tb_keluhan.id_keluhan, tb_keluhan.id_pelanggan, tb_keluhan.tanggal_keluhan, tb_keluhan.isi_keluhan, tb_keluhan.id_karyawan, tb_keluhan.status_penanganan, tb_pelanggan.nama_pelanggan, tb_pelanggan.alamat_pelanggan FROM tb_keluhan INNER JOIN tb_pelanggan ON tb_keluhan.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_keluhan.id_keluhan=$idKeluhan";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>
<div class="row">
	<div class="col-md-12">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Data Keluhan</h3>
				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 250px">
								<b>ID Pelanggan</b>
							</td>
							<td>:
								<?php echo $data_cek['id_pelanggan']; ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>Nama Pelanggan</b>
							</td>
							<td>:
								<?php echo $data_cek['nama_pelanggan']; ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>Alamat Pelanggan</b>
							</td>
							<td>:
								<?php echo $data_cek['alamat_pelanggan']; ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>ID Keluhan</b>
							</td>
							<td>:
								<?php echo $data_cek['id_keluhan']; ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>Tanggal Keluhan</b>
							</td>
							<td>:
								<?php echo $data_cek['tanggal_keluhan']; ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>Isi Keluhan</b>
							</td>
							<td>:
								<?php echo $data_cek['isi_keluhan']; ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>ID Karyawan</b>
							</td>
							<td>:
								<?php echo $data_cek['id_karyawan']; ?>
							</td>
						</tr>
                        <tr>
                            <td>
                                <b>Status Penanganan</b>
                            </td>
                            <td>:
                                <?php 
                                if($data_cek['status_penanganan'] == "Belum Ditangani"){
                                    echo "<span class='badge badge-danger'>".$data_cek['status_penanganan']."</span>";
                                }elseif($data_cek['status_penanganan'] == "Sudah Ditangani"){
                                    echo "<span class='badge badge-success'>".$data_cek['status_penanganan']."</span>";
                                }else{
                                    echo "-";
                                }
                                ?>
                            </td>
                        </tr>
					</tbody>
				</table>
				<div class="card-footer float-right">
					<a href="?page=data-keluhan" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</div>
	</div>
</div>