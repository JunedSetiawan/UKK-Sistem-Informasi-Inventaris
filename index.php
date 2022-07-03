<?php
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"]) == "") {
  header("location: login.php");
} else {
  $data_id = $_SESSION["ses_id"];
  $data_nama = $_SESSION["ses_nama"];
  $data_user = $_SESSION["ses_username"];
  $data_hp = $_SESSION["ses_hp"];
  $data_ket = $_SESSION["ses_ket"];
  $data_level = $_SESSION["ses_level"];
}
function get_client_ip()
{
  $ipaddress = '';
  if (getenv('HTTP_CLIENT_IP'))
    $ipaddress = getenv('HTTP_CLIENT_IP');
  else if (getenv('HTTP_X_FORWARDED_FOR'))
    $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
  else if (getenv('HTTP_X_FORWARDED'))
    $ipaddress = getenv('HTTP_X_FORWARDED');
  else if (getenv('HTTP_FORWARDED_FOR'))
    $ipaddress = getenv('HTTP_FORWARDED_FOR');
  else if (getenv('HTTP_FORWARDED'))
    $ipaddress = getenv('HTTP_FORWARDED');
  else if (getenv('REMOTE_ADDR'))
    $ipaddress = getenv('REMOTE_ADDR');
  else
    $ipaddress = 'IP tidak dikenali';
  return $ipaddress;
}

// Mendapatkan jenis web browser pengunjung
function get_client_browser()
{
  $browser = '';
  if (strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape'))
    $browser = 'Netscape';
  else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox'))
    $browser = 'Firefox';
  else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'))
    $browser = 'Chrome';
  else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera'))
    $browser = 'Opera';
  else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
    $browser = 'Internet Explorer';
  else
    $browser = 'Other';
  return $browser;
}

date_default_timezone_set("Asia/Jakarta");
$currentDateTime = date('Y-m-d H:i:s');
$ip = get_client_ip();
$browser = get_client_browser();
$agent = $_SERVER['HTTP_USER_AGENT'];
$tambah = "Menambah Barang Inventaris";
$update = "Mengubah Barang Inventaris";
$delete = "Menghapus Barang Inventaris";
$verif = "Mensetujui Barang Perbaikan";
//KONEKSI DB
include "inc/koneksi.php";
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <title>Inventaris</title>
  <!-- Simple bar CSS -->
  <link rel="stylesheet" href="css/simplebar.css">
  <!-- Fonts CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- Icons CSS -->
  <link rel="stylesheet" href="css/feather.css">
  <link rel="stylesheet" href="css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="css/select2.css">
  <link rel="stylesheet" href="css/dropzone.css">
  <link rel="stylesheet" href="css/uppy.min.css">
  <link rel="stylesheet" href="css/jquery.steps.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">
  <link rel="stylesheet" href="css/quill.snow.css">
  <!-- Date Range Picker CSS -->
  <link rel="stylesheet" href="css/daterangepicker.css">
  <!-- App CSS -->
  <link rel="stylesheet" href="css/app-light.css" id="lightTheme" disabled>
  <link rel="stylesheet" href="css/app-dark.css" id="darkTheme">
</head>

<body class="vertical  dark">
  <div class="wrapper">
    <nav class="topnav navbar navbar-light">
      <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
      </button>
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="dark">
            <i class="fe fe-sun fe-16"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="avatar avatar-sm mt-2">
              <img src="./assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#defaultModal">Log-out</a>
          </div>
          <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="defaultModalLabel">Log-Out</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">Apakah Anda Yakin Ingin Keluar ?</div>
                <div class="modal-footer">
                  <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                  <a href="logout.php" class="btn mb-2 btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </nav>
    <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
      <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
      </a>
      <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
            <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
              <g>
                <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
              </g>
            </svg>
          </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
          <li class="nav-item dropdown">
            <a href="index.php" class="nav-link">
              <i class="fe fe-home fe-16"></i>
              <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
            </a>
          </li>
        </ul>
        <?php if ($data_level == 1) :  ?>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Inventaris</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="?page=data-invent" aria-expanded="false" class="nav-link">
                <i class="fe fe-box fe-16"></i>
                <span class="ml-3 item-text">Data Invent</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="?page=data-jurusan" aria-expanded="false" class="nav-link">
                <i class="fe fe-16 fe-key"></i>
                <span class="ml-3 item-text">Jurusan</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="?page=data-jenis" aria-expanded="false" class="nav-link">
                <i class="fe fe-16 fe-crosshair"></i>
                <span class="ml-3 item-text">Jenis</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="?page=data-ruang" aria-expanded="false" class="nav-link">
                <i class="fe fe-16 fe-monitor"></i>
                <span class="ml-3 item-text">Ruang</span>
              </a>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Acara Berita</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a type="button" data-toggle="modal" data-target=".modal-right" class="nav-link">
                <i class="fe fe-bell fe-16"></i>
                <span class="ml-3 item-text">Berita Penerimaan</span>
              </a>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-2 mb-1">
            <span>Persetujuan</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="?page=perb-invent">
                <i class="fe fe-plus fe-16"></i>
                <span class="ml-3 item-text">Tambah Ke Perawatan</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="?page=perawatan">
                <i class="fe fe-plus-circle fe-16"></i>
                <span class="ml-3 item-text">Perawatan</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="?page=perbaikan">
                <i class="fe fe-tool fe-16"></i>
                <span class="ml-3 item-text">Perbaikan</span>
              </a>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Laporan</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-printer fe-16"></i>
                <span class="ml-3 item-text">Laporan</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                <li class="nav-item">
                  <a class="nav-link pl-3" target="_blank" href="laporan/admin/lapor_perawatan.php"><span class="ml-1 item-text">Perawatan</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="laporan/admin/lapor_perbaikan.php"><span class="ml-1 item-text">Perbaikan</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Log Aktivitas</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#log" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-user-check fe-16"></i>
                <span class="ml-3 item-text">Log Activity</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="log">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="?page=log-manager"><span class="ml-1 item-text">Manager</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="?page=log-operator"><span class="ml-1 item-text">Operator</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-2 mb-1">
            <span>Users</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="?page=data-manager">
                <i class="fe fe-users fe-16"></i>
                <span class="ml-3 item-text">Manager</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="?page=data-operator">
                <i class="fe fe-user fe-16"></i>
                <span class="ml-3 item-text">Operator</span>
              </a>
            </li>
          </ul>
        <?php endif ?>
        <?php if ($data_level == 2) : ?>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Inventaris</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="?page=data-invent" aria-expanded="false" class="nav-link">
                <i class="fe fe-box fe-16"></i>
                <span class="ml-3 item-text">Data Invent</span>
              </a>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Acara Berita</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a type="button" data-toggle="modal" data-target=".modal-right" class="nav-link">
                <i class="fe fe-bell fe-16"></i>
                <span class="ml-3 item-text">Berita Penerimaan</span>
              </a>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-2 mb-1">
            <span>Persetujuan</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="?page=perbaikan">
                <i class="fe fe-check-circle fe-16"></i>
                <span class="ml-3 item-text">Perbaikan</span>
              </a>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Laporan</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-printer fe-16"></i>
                <span class="ml-3 item-text">Laporan</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                <li class="nav-item">
                  <a class="nav-link pl-3" target="_blank" href="laporan/admin/lapor_perawatan.php"><span class="ml-1 item-text">Perawatan</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="laporan/admin/lapor_perbaikan.php"><span class="ml-1 item-text">Perbaikan</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-2 mb-1">
            <span>Log Aktivitas</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="?page=log-operator">
                <i class="fe fe-user fe-16"></i>
                <span class="ml-3 item-text">Operator</span>
              </a>
            </li>
          </ul>
        <?php endif ?>
      </nav>
    </aside>
    <div class="modal fade modal-right modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="defaultModalLabel">Berita Penerimaan Inventaris</h5>
            <hr>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h6>Dengan Ini Acara Berita Penerimaan Barang Inventaris Telah Diterima Oleh : </h6>
            <?php
            $no = 1;
            $news = mysqli_query($koneksi, "SELECT * FROM berita");
            while ($acara = mysqli_fetch_array($news)) {
            ?>
              <div class="form-group row" style="border: 1px gray;">
                <label for="inputPassword3" class="col-sm-3 col-form-label">No : <?= $no++; ?></label>
                <div class="col-sm-9">
                  <?= $acara['berita']; ?>
                  <p class="text-muted text-right mt-2 mb-1">
                    <span><i class="fe fe-clock fe-4"></i> <?= $acara['tanggal']; ?></span>
                  </p>
                </div>
              </div>
            <?php }  ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <main role="main" class="main-content" style="min-height: 50vh;">
      <div class="container-fluid">
        <?php
        if (isset($_GET['page'])) {
          $hal = $_GET['page'];

          switch ($hal) {
              //Klik Halaman Home Pengguna
            case 'admin':
              include "home/admin.php";
              break;
              //INVENTARIS
            case 'data-invent':
              include "admin/invent/data_invent.php";
              break;
            case 'add-invent':
              include "admin/invent/add_invent.php";
              break;
            case 'del-invent':
              include "admin/invent/del_invent.php";
              break;
            case 'edit-invent':
              include "admin/invent/edit_invent.php";
              break;
              // JURUSAN
            case 'data-jurusan':
              include "admin/jurusan/data_jurusan.php";
              break;
            case 'add-jurusan':
              include "admin/jurusan/add_jurusan.php";
              break;
            case 'del-jurusan':
              include "admin/jurusan/del_jurusan.php";
              break;
            case 'edit-jurusan':
              include "admin/jurusan/edit_jurusan.php";
              break;
              // JENIS 
            case 'data-jenis':
              include "admin/jenis/data_jenis.php";
              break;
            case 'add-jenis':
              include "admin/jenis/add_jenis.php";
              break;
            case 'del-jenis':
              include "admin/jenis/del_jenis.php";
              break;
            case 'edit-jenis':
              include "admin/jenis/edit_jenis.php";
              break;
              // RUANG 
            case 'data-ruang':
              include "admin/ruang/data_ruang.php";
              break;
            case 'add-ruang':
              include "admin/ruang/add_ruang.php";
              break;
            case 'del-ruang':
              include "admin/ruang/del_ruang.php";
              break;
            case 'edit-ruang':
              include "admin/ruang/edit_ruang.php";
              break;
              // MANAGER 
            case 'data-manager':
              include "admin/users/manager/data_manager.php";
              break;
            case 'add-manager':
              include "admin/users/manager/add_manager.php";
              break;
            case 'del-manager':
              include "admin/users/manager/del_manager.php";
              break;
            case 'edit-manager':
              include "admin/users/manager/edit_manager.php";
              break;
              // OPERATOR 
            case 'data-operator':
              include "admin/users/operator/data_operator.php";
              break;
            case 'add-operator':
              include "admin/users/operator/add_operator.php";
              break;
            case 'del-operator':
              include "admin/users/operator/del_operator.php";
              break;
            case 'edit-operator':
              include "admin/users/operator/edit_operator.php";
              break;

              //INVENT-PERBAIKAN
            case 'perb-invent':
              include "admin/invent/perb_invent.php";
              break;
              //PERBAIKAN
            case 'perbaikan':
              include "admin/perbaikan/perbaikan.php";
              break;
            case 'persetujuan':
              include 'admin/perbaikan/persetujuan.php';
              break;
            case 'selesai':
              include 'admin/perbaikan/selesai.php';
              break;
              //PERAWATAN
            case 'perawatan':
              include "admin/perawatan/perawatan.php";
              break;
            case 'pengajuan-perbaikan':
              include 'admin/perbaikan/pengajuan.php';
              break;
              //LOG AKTIVITAS
            case 'log-manager':
              include "admin/log/log_manager.php";
              break;
            case 'log-operator':
              include "admin/log/log_operator.php";
              break;

              //Profil
            case 'data-profil':
              include "admin/profil/data_profil.php";
              break;
            case 'edit-profil':
              include "admin/profil/edit_profil.php";
              break;


              //default
            default:
              echo "<center><h1> ERROR !</h1></center>";
              break;
          }
        } else {
          // Auto Halaman Home Pengguna
          if ($data_level == "1") {
            include "home/admin.php";
          } elseif ($data_level == "2") {
            include "home/admin.php";
          }
        }
        ?>
      </div> <!-- .container-fluid -->
    </main> <!-- main -->
  </div> <!-- .wrapper -->

  <script src="js/alert.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/moment.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/simplebar.min.js"></script>
  <script src='js/daterangepicker.js'></script>
  <script src='js/jquery.stickOnScroll.js'></script>
  <script src="js/tinycolor-min.js"></script>
  <script src="js/config.js"></script>
  <script src="js/d3.min.js"></script>
  <script src="js/topojson.min.js"></script>
  <script src="js/datamaps.all.min.js"></script>
  <script src="js/datamaps-zoomto.js"></script>
  <script src="js/datamaps.custom.js"></script>
  <script src="js/Chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    /* defind global options */
    Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
    Chart.defaults.global.defaultFontColor = colors.mutedColor;
  </script>
  <script src="js/gauge.min.js"></script>
  <script src="js/jquery.sparkline.min.js"></script>
  <script src="js/apexcharts.min.js"></script>
  <script src="js/apexcharts.custom.js"></script>
  <script src="js/apps.js"></script>
  <script src='js/jquery.dataTables.min.js'></script>
  <script src='js/dataTables.bootstrap4.min.js'></script>
  <script>
    $('#dataTable-1').DataTable({
      autoWidth: true,
      "lengthMenu": [
        [16, 32, 64, -1],
        [16, 32, 64, "All"]
      ]
    });
  </script>
  <script src='js/jquery.mask.min.js'></script>
  <script src='js/select2.min.js'></script>
  <script src='js/jquery.steps.min.js'></script>
  <script src='js/jquery.validate.min.js'></script>
  <script src='js/jquery.timepicker.js'></script>
  <script src='js/dropzone.min.js'></script>
  <script src='js/uppy.min.js'></script>
  <script src='js/quill.min.js'></script>
  <script>
    $('.select2').select2({
      theme: 'bootstrap4',
    });
    $('.select2-multi').select2({
      multiple: true,
      theme: 'bootstrap4',
    });
    $('.drgpicker').daterangepicker({
      singleDatePicker: true,
      timePicker: false,
      showDropdowns: true,
      locale: {
        format: 'MM/DD/YYYY'
      }
    });
    $('.time-input').timepicker({
      'scrollDefault': 'now',
      'zindex': '9999' /* fix modal open */
    });
    /** date range picker */
    if ($('.datetimes').length) {
      $('.datetimes').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
          format: 'M/DD hh:mm A'
        }
      });
    }
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    $('#reportrange').daterangepicker({
      startDate: start,
      endDate: end,
      ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      }
    }, cb);
    cb(start, end);
    $('.input-placeholder').mask("00/00/0000", {
      placeholder: "__/__/____"
    });
    $('.input-zip').mask('00000-000', {
      placeholder: "____-___"
    });
    $('.input-money').mask("#.##0,00", {
      reverse: true
    });
    $('.input-phoneus').mask('(000) 000-0000');
    $('.input-mixed').mask('AAA 000-S0S');
    $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
      translation: {
        'Z': {
          pattern: /[0-9]/,
          optional: true
        }
      },
      placeholder: "___.___.___.___"
    });
    // editor
    var editor = document.getElementById('editor');
    if (editor) {
      var toolbarOptions = [
        [{
          'font': []
        }],
        [{
          'header': [1, 2, 3, 4, 5, 6, false]
        }],
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote', 'code-block'],
        [{
            'header': 1
          },
          {
            'header': 2
          }
        ],
        [{
            'list': 'ordered'
          },
          {
            'list': 'bullet'
          }
        ],
        [{
            'script': 'sub'
          },
          {
            'script': 'super'
          }
        ],
        [{
            'indent': '-1'
          },
          {
            'indent': '+1'
          }
        ], // outdent/indent
        [{
          'direction': 'rtl'
        }], // text direction
        [{
            'color': []
          },
          {
            'background': []
          }
        ], // dropdown with defaults from theme
        [{
          'align': []
        }],
        ['clean'] // remove formatting button
      ];
      var quill = new Quill(editor, {
        modules: {
          toolbar: toolbarOptions
        },
        theme: 'snow'
      });
    }
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
  <script>
    var uptarg = document.getElementById('drag-drop-area');
    if (uptarg) {
      var uppy = Uppy.Core().use(Uppy.Dashboard, {
        inline: true,
        target: uptarg,
        proudlyDisplayPoweredByUppy: false,
        theme: 'dark',
        width: 770,
        height: 210,
        plugins: ['Webcam']
      }).use(Uppy.Tus, {
        endpoint: 'https://master.tus.io/files/'
      });
      uppy.on('complete', (result) => {
        console.log('Upload complete! We’ve uploaded these files:', result.successful)
      });
    }
  </script>
</body>

</html>