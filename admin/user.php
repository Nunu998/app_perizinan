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
                    <h1 class="btn btn-warning">~ DATA PENGGUNA ~</h1>
                </center>
            </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <a href="#" data-toggle="modal" data-target="#tambahuser" class="btn btn-info"> <i class="fa fa-plus"></i> Tambah Data Pengguna </a>

                </div>
                <br>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Data Pengguna Di DPMPTSP Kota Banjarmasin
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead class="bg-info text-white">
                                            <tr align="center">
                                                <th width="5%">No</th>
                                                <th>Username</th>
                                                <th>Nama Depan</th>
                                                <th>Nama Belakang</th>
                                                <th>Nama Lengkap</th>
                                                <th>Email</th>
                                                <th>No HP</th>
                                                <th>Level</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $sql = mysqli_query($db, "SELECT * FROM t_user order by id_user desc");
                                            $no = 1;
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                $_SESSION['test_name'] = $row['username'];
                                            ?>
                                                <tr>
                                                    <td> <?= $no++ ?></td>
                                                    <td> <?= $row['username'] ?> </td>
                                                    <td> <?= $row['nama_depan'] ?> </td>
                                                    <td> <?= $row['nama_belakang'] ?> </td>
                                                    <td> <?= $row['nama_lengkap']  ?></td>
                                                    <td> <?= $row['email'] ?> </td>
                                                    <td> <?= $row['no_hp']  ?></td>
                                                    <td> <?= $row['level']  ?></td>

                                                    <td>
                                                        <center> <a title="Hapus" href="hapus/aksi_user_delete.php?id_user=<?= $row['id_user'] ?>" class="btn btn-danger btn-sm delete-data btn-mat"><i class="fa fa-trash"></i></a></center>
                                                    </td>
                                                </tr>
                                                </section>

                                                <section>
                                                    <!-- hapus Modal-->
                                                    <div class="modal fade" id="hapus<?php echo $row['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Mengahpus Data?</h5>
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">Pilih "Hapus" untuk menghapus data user <?= $row['nama_lengkap'] ?>.</div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-warning" type="button" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                                                                    <a href="data/data_user.php?act=hapus&id=<?php echo $row['id_user']; ?>" class="btn btn-danger"><i class="fa fa-arrow-circle-right"></i> Hapus</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <!-- editidk Modal-->
                                                    <div class="modal fade bd-example-modal-lg" id="edit<?php echo $row['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-fw fa-edit mr-1"></i> Edit Data Pegawai</h5>
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <form action="edit/aksi_pengguna_edit.php" method="POST" enctype="multipart/form-data">

                                                                    <div class="modal-body">

                                                                        <?php
                                                                        $id_user = $row['id_user'];
                                                                        $sqledit = mysqli_query($db, "SELECT * FROM t_user WHERE id_user='$id_user'");
                                                                        while ($rowe = mysqli_fetch_assoc($sqledit)) {
                                                                        ?>

                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <input type="hidden" name="id_user" value="<?= $rowe['id_user'] ?>">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="font-weight-bold">Nama Pegawai</label>
                                                                                            <input value="<?= $rowe['nama_pegawai'] ?>" type="text" name="nama_pegawai" required class="form-control" />
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label class="font-weight-bold">NIP </label>
                                                                                            <input value="<?= $rowe['nip'] ?>" autocomplete="off" type="text" name="nip" required class="form-control" />
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label class="font-weight-bold">Tempat</label>
                                                                                            <input value="<?= $rowe['tempat'] ?>" autocomplete="off" type="text" name="tempat" required class="form-control">
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label class="font-weight-bold">Tanggal Lahir</label>
                                                                                            <input value="<?= $rowe['tanggal_lahir'] ?>" autocomplete="off" type="date" name="tanggal_lahir" required class="form-control" />
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label class="font-weight-bold">Telpon</label>
                                                                                            <input value="<?= $rowe['telpon'] ?>" autocomplete="off" type="number" name="telpon" required class="form-control" />
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label class="font-weight-bold">Alamat</label>
                                                                                            <input value="<?= $rowe['alamat'] ?>" autocomplete="off" type="text" name="alamat" required class="form-control" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-warning" type="button" data-dismiss="modal"><i class="fas fa-fw fa-times mr-1"></i> Batal</button>
                                                                        <input type="submit" name="insert" class="btn btn-success" value="Simpan">
                                                                    </div>
                                                                </form>
                                                            <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="tambahuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user-md"></i> Tambah Data Pengguna</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form action="tambah/data_user.php" method="POST">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Nama Depan</label>
                                                <input autocomplete="off" type="text" name="nama_depan" required class="form-control" />
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold">Nama Belakang</label>
                                                <input autocomplete="off" type="text" name="nama_belakang" required class="form-control" />
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold">Nama Lengkap</label>
                                                <input autocomplete="off" type="text" name="nama_lengkap" required class="form-control" />
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold">Username</label>
                                                <input autocomplete="off" type="text" name="username" required class="form-control" />
                                            </div>

                                            <div class="form-group">
                                                <label>Password</label>
                                                <div class="input-group" id="show_hide_password"><input class="form-control" type="password" name="password" id="password" placeholder="Masukan Password">
                                                    <div class="input-group-addon">
                                                        <a style="color:#333;" href="#"><i class="glyphicon glyphicon-eye-close" aria-hidden="true"></i></a>
                                                    </div>
                                                    </input>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold">Email</label>
                                                <input autocomplete="off" type="email" name="email" required class="form-control" />
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold">Level</label>
                                                <select name="level" class="form-control" required>
                                                    <option value="">--Pilih--</option>
                                                    <option value="pemohon">Pemohon</option>
                                                    <option value="pegawai">Pegawai</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold">No HP</label>
                                                <input autocomplete="off" type="number" name="no_hp" required class="form-control" />
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold">Status</label>
                                                <select name="status" class="form-control" required>
                                                    <option value="">--Pilih--</option>
                                                    <option value="yes">YES</option>
                                                    <option value="no">NO</option>
                                                </select>
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
            </div>
        </div>



    <?php

include '../template/footer.php';
    ?>