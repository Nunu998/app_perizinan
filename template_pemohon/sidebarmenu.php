<?php
include '../koneksi/koneksi.php';
$sql      = "SELECT * FROM t_user where username='" . $_SESSION['nama'] . "'";
$query    = mysqli_query($db, $sql);
$data     = mysqli_fetch_array($query);

?>

<br>
<div class="navbar-default sidebar" role="main">
  <div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
      <div class="input-group custom-search-form">
        <span class="input-group-btn">
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <center><img src="../assets/logo/logo2.png" width="70%" alt=""></center>
          </a>
        </span>
      </div>


      <!-- /input-group -->
      </li>
      <br>
      <li>
        <a href=" index.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
      </li>

      <li>
        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Data Proses<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">

          <li>
            <a href="pengajuan.php"> Pengajuan Izin Usaha</a>
          </li>
          <li>
            <a href="suratizin.php"> Surat Izin Usaha</a>
          </li>

        </ul>
        <!-- /.nav-second-level -->
      </li>
      <br>
    
      <li>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fa fa-sign-out fa-fw"></i>
          Logout
        </a>
      </li>
    </ul>
  </div>
</div>

</nav>