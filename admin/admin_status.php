<!DOCTYPE html>
<?php
session_start();
include 'sesi-admin.php';
include 'koneksi.php';
include '../template/header.php';
include '../template/sidebarmenu.php';
?>

<?php
$sql = mysqli_query($db, "SELECT * FROM t_user");
$no = 1;
while ($row1 = mysqli_fetch_assoc($sql)) {
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
                    <h1 class="btn btn-warning">~ DATA KONFIRMASI AKSES LOGIN ~</h1>
                </center>
            </div>
                    <!-- /.col-lg-12 -->
                </div>

                <br>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Data Konfirmasi Akses Login DPMPTSP Kota Banjarmasin
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

                                            $sql = mysqli_query($db, "SELECT nama_depan,nama_belakang,nama_lengkap,username,email,no_hp,level FROM t_user WHERE status='';");
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


                                                    <form method="post">
                                                        <td>
                                                            <a title="Hapus" href="hapus/aksi_hapus_register.php?username=<?= $row['username'] ?>" class="btn btn-danger btn-sm delete-data btn-mat"><i class="fa fa-trash"></i></a>

                                                            <a title="Konfirmasi" href="edit/aksi_edit_register.php?username=<?= $row['username'] ?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>

                                                        </td>
                                                    </form>
                                                </tr>
                                                </section>


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
                                                <label class="font-weight-bold">Username</label>
                                                <input autocomplete="off" type="text" name="username" required class="form-control" />
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold">Password</label>
                                                <input autocomplete="off" type="text" name="password" required class="form-control" />
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold">Nama Lengkap</label>
                                                <input autocomplete="off" type="text" name="nama_lengkap" required class="form-control" />
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold">Level</label>
                                                <select name="level" class="form-control" required>
                                                    <option value="">--Pilih Level--</option>
                                                    <option value="Kepala Unit">Kepala Unit</option>
                                                    <option value="Admin">Admin</option>
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
}
    ?>
    <?php

    include '../template/footer.php';
    ?>