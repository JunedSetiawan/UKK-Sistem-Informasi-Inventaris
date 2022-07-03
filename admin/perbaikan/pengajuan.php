<?php
$data_id = $_SESSION["ses_id"];
$kode = base64_decode($_GET['kode']);
$kde = base64_decode($_GET['kde']);
if (isset($kode)) {
  $sql_cek = "select * from perawatan where id_perawatan='" . $kode . "'";
  $query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
$date = date("Y-m-d");
$date_end = date('Y-m-d',strtotime(date('Y-m-d'). ' + 2 weeks'));
$query_cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM perbaikan WHERE id_perawatan='$kode'"));

if ($query_cek > 0) {
  echo "<script>window.alert('Barang Sudah Terdaftar di Perbaikan')
		window.location='index.php?page=perbaikan'</script>";
} else {
  $sql_hapus = "INSERT INTO perbaikan (id_perbaikan,id_perawatan,id_inventaris, tanggal_perbaikan, tanggal_selesai , status_perbaikan,id_operator,id_admin) values (
      '" . NULL . "',
      '" . $kode . "',
      '" . $kde . "',
      '" . $date . "',
      '" . NULL . "',
      '" . "1" . "',
      '" . NULL . "',
      '" . $data_id . "')";
  $query_hapus = mysqli_query($koneksi, $sql_hapus);
  if ($query_hapus) {
    echo "<script>
        Swal.fire({title: 'Data Berhasil Masuk Ke Perbaikan',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=perbaikan'
        ;}})</script>";
  } else {
    echo "<script>
        Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=perawatan'
        ;}})</script>";
  }
}
