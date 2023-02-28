<!DOCTYPE html>
<?php
session_start();
  include 'sesi-admin.php';
  include 'koneksi.php';
  include '../template/header.php';
  include '../template/sidebarmenu.php';
?>

    <?php
    $id = $_GET['id'];
    $sqlf = mysqli_query($db, "SELECT * FROM tb_perda WHERE id_perda='$id'");
    $h = mysqli_fetch_assoc($sqlf);
    ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Detail Pearturan Daerah</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <a href="detail_pd.php?id=<?= $h['id_perda'] ?>" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Kembali</span>
            </a>
            <br>
            <p></p>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="alert alert-danger responsive" role="alert">
                    <p>*Note : Disarankan Menggunakan Laptop / Komputer.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Detail Peraturan Daerah (<?= $h['nama_perda'] ?>)
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="img-responsive">
                                <!-- Basic Card Example -->
                                <div class="card-body text-center ">
                                    <embed src="file/perda/<?= $h['file_perda'] ?>" type="application/pdf" width="1000" height="600">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
include '../template/footer.php';
?>