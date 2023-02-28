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


    <body class="responsive">

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                <div class="col-lg-12 page-header">
                <center>
                    <h1 class="btn btn-warning">~ INSTANSI ~</h1>
                </center>
            </div>
                    <!-- /.col-lg-12 -->
                </div>

                <br>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Instansi DPMPTSP Kota Banjarmasin
                            </div>
                            <!-- /.panel-heading -->
                            <div class="card-body">
                                <?php
                                $sql = mysqli_query($db, "SELECT * FROM tb_instansi WHERE id_instansi = '1'");
                                while ($row = mysqli_fetch_assoc($sql)) {
                                ?>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <center> <img src="../assets/img/<?= $row['logo'] ?>" alt="<?= $row['logo'] ?>" class="w-100" width="100%" /></center>
                                        </div>

                                        <div class="col-md-9">
                                            <table class="table table-bordered table-hover">
                                                <tr>
                                                    <th class="bg-light">Nama Instansi</th>
                                                    <td><?= $row['nama'] ?></td>
                                                </tr>

                                                <tr>
                                                    <th class="bg-light">Nama Lembaga</th>
                                                    <td><?= $row['institusi'] ?></td>
                                                </tr>

                                                <tr>
                                                    <th class="bg-light">Status</th>
                                                    <td><?= $row['status'] ?></td>
                                                </tr>

                                                <tr>
                                                    <th class="bg-light">Alamat Instansi</th>
                                                    <td><?= $row['alamat'] ?></td>
                                                </tr>

                                                <tr>
                                                    <th class="bg-light">Nama Kepala</th>
                                                    <td><?= $row['kepala'] ?></td>
                                                </tr>

                                                <tr>
                                                    <th class="bg-light">NIP</th>
                                                    <td><?= $row['nip'] ?></td>
                                                </tr>

                                                <tr>
                                                    <th class="bg-light">Email Instansi</th>
                                                    <td><?= $row['email'] ?></td>
                                                </tr>

                                                <tr>
                                                    <th class="bg-light">No. Telp Instansi</th>
                                                    <td><?= $row['notelp'] ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                <?php } ?>
                                <div class="card-footer text-right">
                                    <a href="#" data-toggle="modal" data-target="#editdata" class="btn btn-danger"> <i class="fa fa-edit"></i> Edit Data </a>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-university"></i> Edit Data Instansi</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form action="edit/aksi_instansi.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                            <?php
                                            $sql = mysqli_query($db, "SELECT * FROM tb_instansi WHERE id_instansi = '1'");
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                            ?>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Nama Instansi</label>
                                                        <input autocomplete="off" type="text" name="namains" required class="form-control" value="<?= $row['nama'] ?>" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Nama Dinas</label>
                                                        <input autocomplete="off" type="text" name="yayasan" required class="form-control" value="<?= $row['institusi'] ?>" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Status</label>
                                                        <input autocomplete="off" type="text" name="status" required class="form-control" value="<?= $row['status'] ?>" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Logo Instansi</label>
                                                        <br /><span class="text-danger">Format: jpg/jpeg/png (4Mb)</span>

                                                        <div class="input-group mb-3">
                                                            <div class="custom-file">
                                                                <input type="file" name="logo" class="custom-file-input" id="inputGroupFile01">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                            </div>
                                                        </div>

                                                        <img src="../assets/logo/<?= $row['logo'] ?>" alt="<?= $row['logo'] ?>" width="80px" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Nama Kepala</label>
                                                        <input autocomplete="off" type="text" name="namakep" required class="form-control" value="<?= $row['kepala'] ?>" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="font-weight-bold">NIP</label>
                                                        <input autocomplete="off" type="text" name="nip" required class="form-control" value="<?= $row['nip'] ?>" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Email</label>
                                                        <input autocomplete="off" type="text" name="email" required class="form-control" value="<?= $row['email'] ?>" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="font-weight-bold">No. Telepon</label>
                                                        <input autocomplete="off" type="text" name="notelp" required class="form-control" value="<?= $row['notelp'] ?>" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Alamat Instansi</label>
                                                        <textarea name="alamat" class="form-control"><?= $row['alamat'] ?></textarea>
                                                        <input type="hidden" name="logolama" value="<?= $row['logo'] ?>" />
                                                    </div>
                                                </div>

                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-warning" type="button" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                                        <input type="submit" name="insert" class="btn btn-success btn-round" value="Simpan">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php 

    include '../template/footer.php';
        ?>