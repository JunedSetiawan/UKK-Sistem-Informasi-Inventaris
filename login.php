<?php
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
  <title>SIGN IN</title>
  <!-- Simple bar CSS -->
  <link rel="stylesheet" href="css/simplebar.css">
  <!-- Fonts CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- Icons CSS -->
  <link rel="stylesheet" href="css/feather.css">
  <!-- Date Range Picker CSS -->
  <link rel="stylesheet" href="css/daterangepicker.css">
  <!-- App CSS -->
  <link rel="stylesheet" href="css/app-light.css" id="lightTheme" disabled>
  <link rel="stylesheet" href="css/app-dark.css" id="darkTheme">
</head>

<body class="dark ">
  <div class="wrapper vh-100">
    <div class="row align-items-center h-100">
      <form action="" method="POST" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
          <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
            <g>
              <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
              <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
              <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
            </g>
          </svg>
        </a>
        <h1 class="h6 mb-3">Sign in</h1>
        <div class="form-group">
          <label for="username" class="sr-only">Username</label>
          <input type="text" id="username" class="form-control form-control-lg" name="username" placeholder="Username" required="" autofocus="">
        </div>
        <div class="form-group">
          <label for="password" class="sr-only">Password</label>
          <input type="password" id="password" class="form-control form-control-lg" name="password" placeholder="Password" required="">
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Masuk</button>
        <p class="mt-5 mb-3 text-muted">© 2022 | <a target="_blank" href="http://github.com/JunedSetiawan">Jnd</a></p>
      </form>
    </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/moment.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/simplebar.min.js"></script>
  <script src='js/daterangepicker.js'></script>
  <script src='js/jquery.stickOnScroll.js'></script>
  <script src="js/tinycolor-min.js"></script>
  <script src="js/config.js"></script>
  <script src="js/apps.js"></script>
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Alert -->
  <script src="plugins/alert.js"></script>
</body>

</html>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
  $user_admin = mysqli_real_escape_string($koneksi, $_POST['username']);
  $pass_admin = mysqli_real_escape_string($koneksi, $_POST['password']);
  //anti inject sql
  $username = mysqli_real_escape_string($koneksi, $_POST['username']);
  $password = mysqli_real_escape_string($koneksi, md5($_POST['password']));

  //query login
  $sql_admin = "SELECT * FROM admin WHERE BINARY username='$user_admin' AND password='$pass_admin' && id_level = 1";
  $sql_login = "SELECT * FROM admin WHERE BINARY username='$username' AND password='$password' && id_level = 2";
  $sql_login_oper = "SELECT operator.*, jurusan.nama_jurusan FROM operator 
  INNER JOIN jurusan ON operator.kode_jurusan = jurusan.kode_jurusan WHERE BINARY username='$username' AND password='$password'";

  $query_admin = mysqli_query($koneksi, $sql_admin);
  $query_login = mysqli_query($koneksi, $sql_login);
  $query_oper = mysqli_query($koneksi, $sql_login_oper);

  $data_admin = mysqli_fetch_array($query_admin, MYSQLI_BOTH);
  $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
  $data_oper = mysqli_fetch_array($query_oper, MYSQLI_BOTH);

  $jumlah_admin = mysqli_num_rows($query_admin);
  $jumlah_login = mysqli_num_rows($query_login);
  $jumlah_oper = mysqli_num_rows($query_oper);


  if ($jumlah_admin == 1) {
    if ($data_admin['id_level']  == 1) {

      session_start();
      $_SESSION["ses_id"] = $data_admin["id_admin"];
      $_SESSION["ses_nama"] = $data_admin["nama"];
      $_SESSION["ses_username"] = $data_admin["username"];
      $_SESSION["ses_password"] = $data_admin["password"];
      $_SESSION["ses_hp"] = $data_admin["no_hp"];
      $_SESSION["ses_ket"] = $data_admin["keterangan"];
      $_SESSION["ses_level"] = $data_admin["id_level"];
    }
    echo "<script>
  Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
  }).then((result) => {if (result.value)
    {window.location = 'index.php';}
  })</script>";
  } else {
    echo "<script>
  Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
  }).then((result) => {if (result.value)
    {window.location = 'login.php';}
  })</script>";
  }
  if ($jumlah_login == 1) {
    if ($data_login['id_level'] == 2) {

      session_start();
      $_SESSION["ses_id"] = $data_login["id_admin"];
      $_SESSION["ses_nama"] = $data_login["nama"];
      $_SESSION["ses_username"] = $data_login["username"];
      $_SESSION["ses_password"] = $data_login["password"];
      $_SESSION["ses_hp"] = $data_login["no_hp"];
      $_SESSION["ses_ket"] = $data_login["keterangan"];
      $_SESSION["ses_level"] = $data_login["id_level"];

      echo "<script>
			Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'index.php';}
			})</script>";
    } else {
      echo "<script>
			Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'login.php';}
			})</script>";
    }
  }
  if ($jumlah_oper == 1) {
    if ($data_oper['id_level'] == 3) {

      session_start();
      $_SESSION["ses_id"] = $data_oper["id_operator"];
      $_SESSION["ses_nama"] = $data_oper["nama_oper"];
      $_SESSION["ses_username"] = $data_oper["username"];
      $_SESSION["ses_password"] = $data_oper["password"];
      $_SESSION["ses_hp"] = $data_oper["no_hp"];
      $_SESSION["ses_ket"] = $data_oper["keterangan"];
      $_SESSION["ses_idjurusan"] = $data_oper["kode_jurusan"];
      $_SESSION["ses_jurusan"] = $data_oper["nama_jurusan"];
      $_SESSION["ses_level"] = $data_oper["id_level"];

      echo "<script>
        Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
          {window.location = 'operator/index.php';}
        })</script>";
    } else {
      echo "<script>
        Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
          {window.location = 'login.php';}
        })</script>";
    }
  }
}
