<?php
$kode = base64_decode($_GET['kode']);
if(isset($kode)){
    $sql_cek = "select * from inventaris where kode_inventaris='".$kode."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    $sql_hapus = "DELETE FROM inventaris WHERE kode_inventaris='".$kode."'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);
    if ($query_hapus) {
        mysqli_query($koneksi, "INSERT INTO aktivitas_log (tanggal_log,ip,agent,browser,status,id_level)VALUES('$currentDateTime','$ip','$agent','$browser','$delete','$data_level')");
        echo "<script>
        Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-invent'
        ;}})</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-invent'
        ;}})</script>";
    }
