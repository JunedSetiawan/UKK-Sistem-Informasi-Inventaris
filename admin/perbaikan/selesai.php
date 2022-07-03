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

    $sql_ubah = "UPDATE perbaikan SET
    tanggal_selesai='" . $date . "',
  status_perbaikan='" . "3" . "'
WHERE id_perbaikan='" . $kode . "';";

    $sql_ubah .= "UPDATE inventaris SET
    kondisi='" . "Baik" . "'
    WHERE id_inventaris='" . $kde . "';";
    $query_ubah = mysqli_multi_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Barang Selesai Diperbaiki',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=perbaikan'
        ;}})</script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=perbaikan'
        ;}})</script>";
    }
