<!DOCTYPE html>
<?php
session_start();
include 'sesi-admin.php';
include 'koneksi.php';
include '../template/header.php';
include '../template/sidebarmenu.php';
?>


<div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                        echo $_SESSION['info'];
                                      }
                                      unset($_SESSION['info']); ?>"></div>
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
    <div class="col-lg-12 page-header">
                <center>
                    <h1 class="btn btn-warning">~ DASHBOARD ~</h1>
                </center>
            </div>
      <!-- /.col-lg-12 -->
    </div>
    <div class="alert alert-info">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Selamat datang <span><b><?php echo $_SESSION['nama']; ?>!</b></span> Anda bisa mengoperasikan sistem dengan wewenang sebagai <span class="text-uppercase"><b><?= $_SESSION['level'] ?></b></span>.
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-users fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">
                  <?php
                  $sqlsm = mysqli_query($db, "SELECT * FROM t_user");
                  $ceksm = mysqli_num_rows($sqlsm);
                  ?><?= $ceksm ?>
                </div>
                <div>Data Pengguna</div>
              </div>
            </div>
          </div>
          <a href="user.php">
            <div class="panel-footer">
              <span class="pull-left">View Details</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-user fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">
                  <?php
                  $sqlsm = mysqli_query($db, "SELECT * FROM tb_pegawai");
                  $ceksm = mysqli_num_rows($sqlsm);
                  ?><?= $ceksm ?>
                </div>
                <div>Data Pegawai</div>
              </div>
            </div>
          </div>
          <a href="datapegawai.php">
            <div class="panel-footer">
              <span class="pull-left">View Details</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-envelope-o fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">
                  <?php
                  $sqlsm = mysqli_query($db, "SELECT * FROM tb_telahaan WHERE konfirmasi='Menunggu'");
                  $ceksm = mysqli_num_rows($sqlsm);
                  ?><?= $ceksm ?>
                </div>
                <div>Pengajuan Usaha</div>
              </div>
            </div>
          </div>
          <a href="pengajuan.php">
            <div class="panel-footer">
              <span class="pull-left">View Details</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa  fa-folder-open-o fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">
                  <?php
                  $sqlsm = mysqli_query($db, "SELECT * FROM tb_telahaan WHERE konfirmasi='Sukses'");
                  $ceksm = mysqli_num_rows($sqlsm);
                  ?><?= $ceksm ?>
                </div>
                <div>Surat Izin Usaha</div>
              </div>
            </div>
          </div>
          <a href="suratizin.php">
            <div class="panel-footer">
              <span class="pull-left">View Details</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-inbox fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">
                  <?php
                  $sqlsm = mysqli_query($db, "SELECT * FROM tb_usaha");
                  $ceksm = mysqli_num_rows($sqlsm);
                  ?><?= $ceksm ?>
                </div>
                <div>Data Usaha</div>
              </div>
            </div>
          </div>
          <a href="daftar.php">
            <div class="panel-footer">
              <span class="pull-left">View Details</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>
    </div>

</div>



<?php
include '../template/footer.php';
?>