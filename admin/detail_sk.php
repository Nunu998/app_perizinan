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
    $sqlsk = mysqli_query($db, "SELECT * FROM tb_suratkeluar WHERE id_suratkeluar='$id'");
    $t = mysqli_fetch_assoc($sqlsk);
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Surat Keluar</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a href="suratkeluar.php" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Kembali</span>
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
                            Detail Surat Keluar (<?= $t['no_suratkeluar'] ?>).
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">

                                <!-- Basic Card Example -->
                                <div class="card shadow mb-4">

                                    <div class="card-body">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <tr>
                                                <th width="30%" class="bg-light">Nomor Surat Keluar</th>
                                                <td><?= $t['no_suratkeluar'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Nomor Agenda Surat Keluar</th>
                                                <td><?= $t['no_agenda'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Tujuan Surat</th>
                                                <td><?= $t['tujuan_surat'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Isi Ringkas</th>
                                                <td><?= $t['isi_surat'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Keterangan</th>
                                                <td><?= $t['ket_suratkeluar'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Tanggal Surat</th>
                                                <td><?= $t['tgl_surat'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Tanggal Surat Keluar</th>
                                                <td><?= $t['tanggal'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">File Surat</th>
                                                <td>
                                                    <?php
                                                    if ($t['file_suratkeluar'] == 'TIDAK ADA FILE') {
                                                        echo "<b>Tidak Ada FIle</b>";
                                                    } else {
                                                    ?>
                                                        <embed href="fsk.php?id=<?= $t['id_suratkeluar'] ?>" type="application/pdf" width="800" height="600" src='file/suratkeluar/<?= $t['file_suratkeluar'] ?>' alt='<?= $t['file_suratkeluar'] ?>' width='30%'></a><br>
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