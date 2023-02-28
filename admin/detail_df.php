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
    $sqlsm = mysqli_query($db, "SELECT * FROM tb_daftar WHERE id_daftar='$id'");
    $t = mysqli_fetch_assoc($sqlsm);
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Daftar Permohonan Telahaan Tata Ruang</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a href="daftar.php" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Kembali</span>
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
                            Detail Daftar Permohonan Telahaan Tata Ruang (<?= $t['nomor_telahaan'] ?>).
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">

                                <!-- Basic Card Example -->
                                <div class="card shadow mb-4">

                                    <div class="card-body">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <tr>
                                                <th width="30%" class="bg-light">Nama Lengkap</th>
                                                <td><?= $t['nama_permohonan'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Kecamatan</th>
                                                <td><?= $t['kecamatan'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Kelurahan / Desa</th>
                                                <td><?= $t['kelurahan'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Nomor Surat</th>
                                                <td><?= $t['nomor_surat'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Tanggal Masuk</th>
                                                <td><?= $t['tanggal_masuk'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Nomor Telahaan</th>
                                                <td><?= $t['nomor_telahaan'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Tanggal Keluar</th>
                                                <td><?= $t['tanggal'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Dibangun</th>
                                                <td><?= $t['dibangun'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Luas Tanah</th>
                                                <td><?= $t['luas_tanah'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Dalam Bentuk</th>
                                                <td><?= $t['dalam_bentuk'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Kawasan</th>
                                                <td><?= $t['kawasan'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Titik Koordinat (X)</th>
                                                <td><?= $t['titik1'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Titik Koordinat (Y)</th>
                                                <td><?= $t['titik2'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">File Telahaan</th>
                                                <td>
                                                    <?php
                                                    if ($t['file_telahaan'] == 'TIDAK ADA FILE') {
                                                        echo "<b>Tidak Ada FIle</b>";
                                                    } else {
                                                    ?>
                                                        <embed href="fpb.php?id=<?= $t['id_daftar'] ?>" type="application/pdf" width="800" height="600" src='file/daftar/<?= $t['file_telahaan'] ?>' alt='<?= $t['file_telahaan'] ?>' width='30%'></a><br>
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