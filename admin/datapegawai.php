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
                    <h1 class="btn btn-warning">~ DATA PEGAWAI ~</h1>
                </center>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="#" data-toggle="modal" data-target="#tambahuser" class="btn btn-info"> <i class="fa fa-plus"></i> Tambah Data Pegawai </a>

        </div>
        <br>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Data Pegawai DPMPTSP Kota Banjarmasin
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead class="bg-info text-white">
                                    <tr align="center">
                                    <tr>
                                        <th>No.</th>
                                        <th>NIP</th>
                                        <th>Nama Lengkap</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Agama</th>
                                        <th>No HP / No WA</th>
                                        <th>Pangkat / Golongan</th>
                                        <th>Jabatan</th>
                                        <th>Status Pegawai</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $sql = mysqli_query($db, "SELECT * FROM tb_pegawai");
                                    $no = 1;
                                    while ($row = mysqli_fetch_assoc($sql)) {
                                    ?>
                                        <tr>
                                            <td> <?= $no++ ?></td>
                                            <td> <?= $row['nip'] ?> </td>
                                            <td> <?= $row['nama_pegawai'] ?> </td>
                                            <td> <?= $row['tempat'] ?> </td>
                                            <td> <?= $row['tanggal_lahir']  ?></td>
                                            <td> <?= $row['jk'] ?> </td>
                                            <td> <?= $row['agama']  ?></td>
                                            <td> <?= $row['hp']  ?></td>
                                            <td> <?= $row['id_pangkat']  ?></td>
                                            <td> <?= $row['id_jabatan']  ?></td>
                                            <td> <?= $row['id_status']  ?></td>


                                            <td>
                                                <center> <a title="Edit" href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $row['no_urut']; ?>"><i class="fa fa-edit"></i></a></center>

                                                <center> <a title="Hapus" href="hapus/aksi_pegawai_delete.php?no_urut=<?= $row['no_urut'] ?>" class="btn btn-danger btn-sm delete-data btn-mat"><i class="fa fa-trash"></i></a></center>
                                            </td>
                                        </tr>
                                        </section>


                                        <!-- editidk Modal-->
                                        <div class="modal fade bd-example-modal-lg" id="edit<?php echo $row['no_urut']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-fw fa-edit mr-1"></i> Edit Data Pegawai</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form action="edit/aksi_edit_pegawai.php" method="POST" enctype="multipart/form-data">

                                                        <div class="modal-body">

                                                            <?php
                                                            $no_urut = $row['no_urut'];
                                                            $sqledit = mysqli_query($db, "SELECT * FROM tb_pegawai WHERE no_urut='$no_urut'");
                                                            while ($rowe = mysqli_fetch_assoc($sqledit)) {
                                                            ?>

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" name="no_urut" value="<?= $rowe['no_urut'] ?>">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">Nama Pegawai</label>
                                                                                <input value="<?= $rowe['nama_pegawai'] ?>" type="text" name="nama_pegawai" required class="form-control" />
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">NIP </label>
                                                                                <input value="<?= $rowe['nip'] ?>" autocomplete="off" type="number" name="nip" required class="form-control" />
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
                                                                                <label class="font-weight-bold">Jenis Kelamin</label>
                                                                                <input value="<?= $rowe['jk'] ?>" autocomplete="off" type="text" name="jk" required class="form-control" />
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">Agama</label>
                                                                                <select name="agama" class="form-control" value="<?= $rowe['agama'] ?>" required>
                                                                                    <option value="<?= $rowe['agama'] ?>"><?= $rowe['agama'] ?></option>
                                                                                    <option value="islam">Islam</option>
                                                                                    <option value="protesten">Protesten</option>
                                                                                    <option value="katolik">Katolik</option>
                                                                                    <option value="hindu">Hindu</option>
                                                                                    <option value="buddha">Buddha</option>
                                                                                    <option value="khonghucu">Khonghucu</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">HP / WA</label>
                                                                                <input value="<?= $rowe['hp'] ?>" autocomplete="off" type="number" name="hp" required class="form-control" />
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">Pangkat</label>
                                                                                <select name="id_pangkat" class="form-control" value="" required>
                                                                                    <option value="<?= $rowe['id_pangkat'] ?>"><?= $rowe['id_pangkat'] ?></option>
                                                                                    <option value="Juru Muda (I/a)">Juru Muda (I/a)</option>
                                                                                    <option value="Juru Muda Tingkat (I/b)">Juru Muda Tingkat (I/b)</option>
                                                                                    <option value="Juru (I/c)">Juru (I/c)</option>
                                                                                    <option value="Juru Tk.I (I/d)">Juru Tk.I (I/d)</option>
                                                                                    <option value="">---------</option>
                                                                                    <option value="Pengatur Muda (II/a)">Pengatur Muda (II/a)</option>
                                                                                    <option value="Pengatur Muda Tk.I (II/b">Pengatur Muda Tk.I (II/b)</option>
                                                                                    <option value="Pengatur (II/c)">Pengatur (II/c)</option>
                                                                                    <option value="Pengatur Tk.I (II/d)">Pengatur Tk.I (II/d)</option>
                                                                                    <option value="">---------</option>
                                                                                    <option value="Penata Muda (III/a)">Penata Muda (III/a)</option>
                                                                                    <option value="Penata Muda Tk.I (III/b)">Penata Muda Tk.I (III/b)</option>
                                                                                    <option value="Penata (III/c)">Penata (III/c)</option>
                                                                                    <option value="Penata Tk.I (III/d)">Penata Tk.I (III/d)</option>
                                                                                    <option value="">---------</option>
                                                                                    <option value="Pembina (IV/a)">Pembina (IV/a)</option>
                                                                                    <option value="Pembina Tk.I (IV/b)">Pembina Tk.I (IV/b)</option>
                                                                                    <option value="Pembina Utama Muda (IV/c)">Pembina Utama Muda (IV/c)</option>
                                                                                    <option value="Pembina Utama Madya (IV/d)">Pembina Utama Madya (IV/d)</option>
                                                                                    <option value="Pembina Utama (IV/e)">Pembina Utama (IV/e)</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">Jabatan</label>
                                                                                <input value="<?= $rowe['id_jabatan'] ?>" autocomplete="off" type="text" name="id_jabatan" required class="form-control" />
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">Status</label>
                                                                                <select name="id_status" class="form-control"  required>
                                                                                    <option value="<?= $rowe['id_status'] ?>"><?= $rowe['id_status'] ?></option>
                                                                                    <option value="ASN">ASN</option>
                                                                                    <option value="Pegawai Honorer">Pegawai Honorer</option>
                                                                                </select>
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
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user-md"></i> Tambah Data Pegawai</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form action="tambah/aksi_data_pegawai.php" method="POST">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama Pegawai</label>
                                        <input autocomplete="off" type="text" name="nama_pegawai" required class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">NIP</label>
                                        <input autocomplete="off" type="number" name="nip" required class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Tempat Lahir</label>
                                        <input autocomplete="off" type="text" name="tempat" required class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Tanggal Lahir</label>
                                        <input autocomplete="off" type="date" name="tanggal_lahir" required class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Jenis Kelamin</label>
                                        <input autocomplete="off" type="text" name="jk" required class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Agama</label>
                                        <select name="agama" class="form-control" required>
                                            <option value="">--Pilih--</option>
                                            <option value="islam">Islam</option>
                                            <option value="protesten">Protesten</option>
                                            <option value="katolik">Katolik</option>
                                            <option value="hindu">Hindu</option>
                                            <option value="buddha">Buddha</option>
                                            <option value="khonghucu">Khonghucu</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">NO HP / WA</label>
                                        <input autocomplete="off" type="number" name="hp" required class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Pangkat / Golongan</label>
                                        <select name="id_pangkat" class="form-control" required>
                                            <option value="">--Pilih--</option>
                                            <option value="Juru Muda (I/a)">Juru Muda (I/a)</option>
                                            <option value="Juru Muda Tingkat (I/b)">Juru Muda Tingkat (I/b)</option>
                                            <option value="Juru (I/c)">Juru (I/c)</option>
                                            <option value="Juru Tk.I (I/d)">Juru Tk.I (I/d)</option>
                                            <option value="">---------</option>
                                            <option value="Pengatur Muda (II/a)">Pengatur Muda (II/a)</option>
                                            <option value="Pengatur Muda Tk.I (II/b">Pengatur Muda Tk.I (II/b)</option>
                                            <option value="Pengatur (II/c)">Pengatur (II/c)</option>
                                            <option value="Pengatur Tk.I (II/d)">Pengatur Tk.I (II/d)</option>
                                            <option value="">---------</option>
                                            <option value="Penata Muda (III/a)">Penata Muda (III/a)</option>
                                            <option value="Penata Muda Tk.I (III/b)">Penata Muda Tk.I (III/b)</option>
                                            <option value="Penata (III/c)">Penata (III/c)</option>
                                            <option value="Penata Tk.I (III/d)">Penata Tk.I (III/d)</option>
                                            <option value="">---------</option>
                                            <option value="Pembina (IV/a)">Pembina (IV/a)</option>
                                            <option value="Pembina Tk.I (IV/b)">Pembina Tk.I (IV/b)</option>
                                            <option value="Pembina Utama Muda (IV/c)">Pembina Utama Muda (IV/c)</option>
                                            <option value="Pembina Utama Madya (IV/d)">Pembina Utama Madya (IV/d)</option>
                                            <option value="Pembina Utama (IV/e)">Pembina Utama (IV/e)</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Jabatan</label>
                                        <input autocomplete="off" type="text" name="id_jabatan" required class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Status</label>
                                        <select name="id_status" class="form-control" required>
                                            <option value="">--Pilih--</option>
                                            <option value="ASN">ASN</option>
                                            <option value="Pegawai Honorer">Pegawai Honorer</option>
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
</div>



<?php
include '../template/footer.php';
?>