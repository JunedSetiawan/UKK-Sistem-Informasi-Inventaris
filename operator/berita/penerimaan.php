<?php
$kode = base64_decode($_GET['kode']);
if (isset($kode)) {
    $sql_cek = "select * from inventaris where id_inventaris='" . $kode . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
$berita = "Operator Dengan Nama : " . $data_nama . " Sudah Menerima Barang <i><b>" .$data_cek['nama']. "</i></b> dengan Jumlah : " . $data_cek['jumlah'];
$tanggal = date('Y-m-d');

$sql_hapus = "UPDATE inventaris SET
    stat = '" . 1 . "'
     WHERE id_inventaris='" . $kode . "';";

$sql_hapus .= "INSERT INTO berita (id_inventaris,tanggal,berita,id_operator,id_level) VALUES (
    '" . $kode . "',
      '" . $tanggal . "',
      '" . $berita . "',
      '" . $data_id . "',
      '" . $data_level . "');";

$sql_hapus .= "INSERT INTO aktivitas_log (tanggal_log,ip,agent,browser,status,id_level)VALUES('$currentDateTime','$ip','$agent','$browser','$acara_berita','$data_level');";

$query_hapus = mysqli_multi_query($koneksi, $sql_hapus);
if ($query_hapus) {
    echo "<script>
        Swal.fire({title: 'Inventaris Diterima',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-invent'
        ;}})</script>";
} else {
    echo "<script>
        Swal.fire({title: 'Inventaris Gagal Diterima',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-invent'
        ;}})</script>";
}
