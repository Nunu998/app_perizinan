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
                    <h1 class="btn btn-warning">~ DATA USAHA ~</h1>
                </center>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="#" data-toggle="modal" data-target="#tambahuser" class="btn btn-info"> <i class="fa fa-plus"></i> Tambah Data Usaha </a>

        </div>
        <br>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Daftar Data Usaha DPMPTSP Kota Banjarmasin
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead class="bg-info text-white">
                                    <tr align="center">
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Jenis Permohonan</th>
                                        <th>Nama Permohonan</th>
                                        <th>Alamat</th>
                                        <th>Skala Usaha</th>
                                        <th>NIB</th>
                                        <th>Nama Perizinan</th>
                                        <th>Jenis Perizinan</th>
                                        <th>Kategori Utama Izin</th>
                                        <th>Sektor Perizinan</th>
                                        <th>Sektor Usaha</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $sql = mysqli_query($db, "SELECT * FROM tb_usaha");
                                    $no = 1;
                                    while ($row = mysqli_fetch_assoc($sql)) {
                                    ?>
                                        <tr>
                                            <td> <?= $no++ ?></td>
                                            <td> <?= $row['tanggal'] ?> </td>
                                            <td> <?= $row['jenis_permohonan'] ?> </td>
                                            <td> <?= $row['nama_permohonan'] ?> </td>
                                            <td> <?= $row['alamat']  ?></td>
                                            <td> <?= $row['skala'] ?> </td>
                                            <td> <?= $row['nib']  ?></td>
                                            <td> <?= $row['nama_perizinan']  ?></td>
                                            <td> <?= $row['jenis_perizinan']  ?></td>
                                            <td> <?= $row['kategori']  ?></td>
                                            <td> <?= $row['sektor_perizinan']  ?></td>
                                            <td> <?= $row['sektor_usaha']  ?></td>

                                            <td>
                                                <center> <a title="Edit" href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a></center>

                                                <center> <a title="Hapus" href="hapus/aksi_delete_usaha.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm delete-data btn-mat"><i class="fa fa-trash"></i></a></center>
                                            </td>
                                        </tr>
                                        </section>


                                        <!-- editidk Modal-->
                                        <div class="modal fade bd-example-modal-lg" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-fw fa-edit mr-1"></i> Edit Data Usaha</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form action="edit/aksi_edit_usaha.php" method="POST" enctype="multipart/form-data">

                                                        <div class="modal-body">

                                                            <?php
                                                            $id = $row['id'];
                                                            $sqledit = mysqli_query($db, "SELECT * FROM tb_usaha WHERE id='$id'");
                                                            while ($rowe = mysqli_fetch_assoc($sqledit)) {
                                                            ?>

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" name="id" value="<?= $rowe['id'] ?>">
                                                                        <div class="col-md-12">

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">Tanggal</label>
                                                                                <input value="<?= $rowe['tanggal'] ?>" type="text" name="tanggal" required class="form-control" />
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">Jenis Permohonan </label>
                                                                                <input value="<?= $rowe['jenis_permohonan'] ?>" autocomplete="off" type="text" name="jenis_permohonan" required class="form-control" />
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">Nama Pemohon</label>
                                                                                <input value="<?= $rowe['nama_permohonan'] ?>" autocomplete="off" type="text" name="nama_permohonan" required class="form-control">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">alamat</label>
                                                                                <input value="<?= $rowe['alamat'] ?>" autocomplete="off" type="text" name="alamat" required class="form-control" />
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">Skala Usaha</label>
                                                                                <input value="<?= $rowe['skala'] ?>" autocomplete="off" type="text" name="skala" required class="form-control" />
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">NIB</label>
                                                                                <input value="<?= $rowe['nib'] ?>" autocomplete="off" type="text" name="nib" required class="form-control" />
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">Nama Perizinan</label>
                                                                                <input value="<?= $rowe['nama_perizinan'] ?>" autocomplete="off" type="text" name="nama_perizinan" required class="form-control" />
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">Jenis Perizinan</label>
                                                                                <input value="<?= $rowe['jenis_perizinan'] ?>" autocomplete="off" type="text" name="jenis_perizinan" required class="form-control" />
                                                                            </div>

                                                                           

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">Kategori Utama Izin</label>
                                                                                <input value="<?= $rowe['kategori'] ?>" autocomplete="off" type="text" name="kategori" required class="form-control" />
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">Sektor Perizinan</label>
                                                                                <input value="<?= $rowe['sektor_perizinan'] ?>" autocomplete="off" type="text" name="sektor_perizinan" required class="form-control" />
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">Sektor Usaha</label>
                                                                                <input value="<?= $rowe['sektor_usaha'] ?>" autocomplete="off" type="text" name="sektor_usaha" required class="form-control" />
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
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user-md"></i> Tambah Data Usaha</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form action="tambah/aksi_data_usaha.php" method="POST">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Tanggal</label>
                                        <input autocomplete="off" type="date" name="tanggal" required class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Jenis Permohonan</label>
                                        <input autocomplete="off" type="text" name="jenis_permohonan" required class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama Pemohon</label>
                                        <input autocomplete="off" type="text" name="nama_permohonan" required class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Alamat</label>
                                        <input autocomplete="off" type="text" name="alamat" required class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Skala Usaha</label>
                                        <input autocomplete="off" type="text" name="skala" required class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">NIB</label>
                                        <input autocomplete="off" type="text" name="nib" required class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama Perizinan</label>
                                        <input autocomplete="off" type="text" name="nama_perizinan" required class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Jenis Perizinan</label>
                                        <input autocomplete="off" type="text" name="jenis_perizinan" required class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Kategori Utama Izin</label>
                                        <input autocomplete="off" type="text" name="kategori" required class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Sektor Perizinan</label>
                                        <input autocomplete="off" type="text" name="sektor_perizinan" required class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Sektor Usaha</label>
                                        <input autocomplete="off" type="text" name="sektor_usaha" required class="form-control" />
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
</div>



<?php
include '../template/footer.php';
?>