<?php
include '../koneksi/koneksi.php';
$sql      = "SELECT * FROM t_user where username='" . $_SESSION['nama'] . "'";
$query    = mysqli_query($db, $sql);
$data     = mysqli_fetch_array($query);

?>

<?php
$sql = mysqli_query($db, "SELECT COUNT(status) as total FROM t_user WHERE status=''");
$row = mysqli_fetch_assoc($sql)
?>


<?php
$sql1 = mysqli_query($db, "SELECT COUNT(keterangan) as total FROM tb_telahaan WHERE keterangan='-Mohon Tunggu Ya, Admin Akan Memberikan Keterangan-'");
$row1 = mysqli_fetch_assoc($sql1)
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>DPMPTSP Kota Banjarmasin</title>
    <link rel="shortcut icon" href="../assets/logo/atas.png">

  <!-- Bootstrap Core CSS -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="../assets/css/metisMenu.min.css" rel="stylesheet">

  <!-- Timeline CSS -->
  <link href="../assets/css/timeline.css" rel="stylesheet">

  <link href="../assets/leaflet/leaflet.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../assets/css/startmin.css" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <link href="../assets/css/morris.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="../assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <link href="../assets/package/dist/sweetalert2.min.css" rel="stylesheet" type="text/css">

  <script>
    tinymce.init({
      selector: 'textarea'
    });
  </script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>

  <div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">DPMPTSP KOTA BANJARMASIN</a>
      </div>


      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      

      <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown navbar-inverse">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> <?= $_SESSION['nama'] ?> <b class="caret"></b>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li>
              <a href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fa fa-sign-out fa-fw"></i>
                Logout
              </a>
            </li>
          </ul>
        </li>
      </ul>

      <!-- /.navbar-top-links -->