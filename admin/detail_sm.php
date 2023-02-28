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
    $sqlsm = mysqli_query($db, "SELECT * FROM tb_suratmasuk WHERE id_suratmasuk='$id'");
    $t = mysqli_fetch_assoc($sqlsm);
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Surat Masuk</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a href="suratmasuk.php" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Kembali</span>
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
                            Detail Surat Masuk (<?= $t['no_suratmasuk'] ?>).
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">

                                <!-- Basic Card Example -->
                                <div class="card shadow mb-4">

                                    <div class="card-body">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <tr>
                                                <th width="30%" class="bg-light">Nomor Surat Masuk</th>
                                                <td><?= $t['no_suratmasuk'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Nomor Agenda Surat Masuk</th>
                                                <td><?= $t['no_agenda'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Asal Surat</th>
                                                <td><?= $t['asal_surat'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Isi Ringkas</th>
                                                <td><?= $t['isi_surat'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Keterangan</th>
                                                <td><?= $t['ket_suratmasuk'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Tanggal Surat</th>
                                                <td><?= $t['tgl_surat'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Tanggal Diterima</th>
                                                <td><?= $t['tanggal'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">File Surat</th>
                                                <td>
                                                    <?php
                                                    if ($t['file_suratmasuk'] == 'TIDAK ADA FILE') {
                                                        echo "<b>Tidak Ada File</b>";
                                                    } else {
                                                    ?>
                                                        <embed href="fsm.php?id=<?= $t['id_suratmasuk'] ?>" type="application/pdf" width="800" height="600" class="file-responsive" src='file/suratmasuk/<?= $t['file_suratmasuk'] ?>' alt='<?= $t['file_suratmasuk'] ?>' width='30%'></a><br>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>


                            <?php 
                        include '../template/footer.php';
                            ?>