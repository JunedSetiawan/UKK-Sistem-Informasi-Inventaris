<?php
$kode = base64_decode($_GET['kode']);
$kde = base64_decode($_GET['kde']);
if (isset($kode)) {
    $sql_cek = "select * from perbaikan where id_perbaikan='" . $kode . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
$date = date("Y-m-d");
$date_end = date('Y-m-d', strtotime(date('Y-m-d') . ' + 2 weeks'));
$query_cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM perbaikan WHERE id_inventaris='$kde'"));

    $sql_ubah = "UPDATE perbaikan SET
  status_perbaikan='" . "2" . "'
WHERE id_perbaikan='" . $kode . "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        mysqli_query($koneksi, "INSERT INTO aktivitas_log (tanggal_log,ip,agent,browser,status,id_level)VALUES('$currentDateTime','$ip','$agent','$browser','$verif','$data_level')");
        echo "<script>
        Swal.fire({title: 'Data Berhasil Disetujui',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=perbaikan'
        ;}})</script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=perbaikan'
        ;}})</script>";
    }
