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
    $sqlpb = mysqli_query($db, "SELECT * FROM tb_perbub WHERE id_perbub='$id'");
    $t = mysqli_fetch_assoc($sqlpb);
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Peraturan Bupati (PERBUB)</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a href="perbub.php" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Kembali</span>
                </a>
            </div>
            <br>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="alert alert-danger responsive" role="alert">
                    <p>*Note : Disarankan Menggunakan Laptop / Komputer.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Detail Peraturan Bupati (<?= $t['nama_perbub'] ?>).
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">

                                <!-- Basic Card Example -->
                                <div class="card shadow mb-4">

                                    <div class="card-body">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <tr>
                                                <th width="30%" class="bg-light">Nama Perbub</th>
                                                <td><?= $t['nama_perbub'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Nomor</th>
                                                <td><?= $t['nomor'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Tanggal / Tahun</th>
                                                <td><?= $t['tahun'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">File PERBUB</th>
                                                <td>
                                                    <?php
                                                    if ($t['file_perbub'] == 'TIDAK ADA FILE') {
                                                        echo "<b>Tidak Ada FIle</b>";
                                                    } else {
                                                    ?>
                                                        <embed href="fpb.php?id=<?= $t['id_perbub'] ?>" type="application/pdf" width="800" height="600" src='file/perbub/<?= $t['file_perbub'] ?>' alt='<?= $t['file_perbub'] ?>' width='30%'></a><br>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        </table>
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