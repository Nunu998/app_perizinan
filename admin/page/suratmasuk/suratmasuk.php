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
                <div class="col-lg-12">
                    <h1 class="page-header">Surat Masuk</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a href="#" data-toggle="modal" data-target="#tambahsm" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Data Surat Masuk </a>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Surat Masuk di Bidang Tata Ruang Dinas PUPRPKP Kab. Kapuas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead class="bg-primary text-white">
                                        <tr align="center">
                                            <th width="5%">No</th>
                                            <th>No. Surat Masuk</th>
                                            <th>No. Agenda</th>
                                            <th>Perihal Surat</th>
                                            <th>Asal Surat</th>
                                            <th>Tanggal Surat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = mysqli_query($db, "SELECT * FROM tb_suratmasuk");
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($sql)) {
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ ?></td>
                                                <td><?= $row['no_suratmasuk'] ?></td>
                                                <td><?= $row['no_agenda'] ?></td>
                                                <td><?= $row['isi_surat'] ?></td>
                                                <td><?= $row['asal_surat'] ?></td>
                                                <td class="text-center"><?php
                                                                        $newDate = date("d-m-Y", strtotime($row['tanggal']));
                                                                        echo $newDate;
                                                                        ?>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group">
                                                        <!-- <a title="Print" href="cetakdisp.php?id=<?= $row['id_suratmasuk'] ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-print"></i></a> -->

                                                        <a title="Detail" href="detail_sm.php?id=<?= $row['id_suratmasuk'] ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>

                                                        <!-- <a title="Disposisi" href="disposisi.php?id=<?= $row['id_suratmasuk'] ?>" class="btn btn-info btn-sm"><i class="fa fa-archive"></i></a> -->

                                                        <a title="Edit" href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $row['id_suratmasuk']; ?>"><i class="fa fa-edit"></i></a>

                                                        <a title="Hapus" href="data/aksi_suratmasuk.php?act=hapus&id=<?php echo $row['id_suratmasuk']; ?>" class="btn btn-danger btn-sm delete-data btn-mat"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- editidk Modal-->
                                            <div class="modal fade bd-example-modal-lg" id="edit<?php echo $row['id_suratmasuk']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-envelope-o fa"></i> Edit Data Surat Masuk</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <form action="data/aksi_suratmasuk.php?act=edit" method="POST" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <?php
                                                                $id = $row['id_suratmasuk'];
                                                                $sqledit = mysqli_query($db, "SELECT * FROM tb_suratmasuk WHERE id_suratmasuk='$id'");
                                                                while ($rowe = mysqli_fetch_assoc($sqledit)) {
                                                                ?>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">Nomor Surat Masuk</label>
                                                                                <input autocomplete="off" type="text" name="nosm" required class="form-control" value="<?= $rowe['no_suratmasuk'] ?>" />
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">Nomor Agenda Surat Masuk</label>
                                                                                <input autocomplete="off" type="text" name="noag" required class="form-control" value="<?= $rowe['no_agenda'] ?>" />
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">Asal Surat</label>
                                                                                <input autocomplete="off" type="text" name="asal" required class="form-control" value="<?= $rowe['asal_surat'] ?>" />
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">Isi Ringkas/Perihal</label>
                                                                                <textarea name="isi" class="form-control"><?= $rowe['isi_surat'] ?></textarea>
                                                                            </div>

                                                                            <div class="mb-3">
                                                                                <label for="inputGroupFile01" class="custom-file-label">File Surat</label> <span class="text-danger">Format: jpg/jpeg/png/pdf (5Mb)</span>
                                                                                <input class="form-control" type="file" name="filesm" id="inputGroupFile01">
                                                                            </div>
                                                                            <?php
                                                                            if ($rowe['file_suratmasuk'] == 'TIDAK ADA FILE') {
                                                                                echo "<b>Tidak Ada FIle</b>";
                                                                            } else {
                                                                            ?>
                                                                                <a href="fsm.php?id=<?= $rowe['id_suratmasuk'] ?>" class="btn btn-success btn-sm">Lihat File Surat</a>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <br>
                                                                            <br>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">Tanggal Surat</label>
                                                                                <input value="<?= $rowe['tgl_surat'] ?>" type="date" name="tglsm" required class="form-control" />
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">Tanggal Diterima</label>
                                                                                <input value="<?= $rowe['tanggal'] ?>" type="date" name="tglsmd" required class="form-control" />
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold">Keterangan Surat</label>
                                                                                <textarea name="ket" class="form-control"><?= $rowe['ket_suratmasuk'] ?></textarea>
                                                                            </div>
                                                                            <input type="hidden" name="id" value="<?= $rowe['id_suratmasuk'] ?>">
                                                                            <input type="hidden" name="filelama" value="<?= $rowe['file_suratmasuk'] ?>" id="">
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-warning" type="button" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                                                                <button class="btn btn-success" type="submit"><i class="fa fa-arrow-circle-right"></i> Simpan</button>
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


                    <!-- tambahsm Modal-->
                    <div class="modal fade bd-example-modal-lg" id="tambahsm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-envelope-o fa"></i> Tambah Data Surat Masuk</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form action="data/aksi_suratmasuk.php?act=tambah" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Nomor Surat Masuk</label>
                                                <input autocomplete="off" type="text" name="nosm" required class="form-control" />
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold">Nomor Agenda Surat Masuk</label>
                                                <input autocomplete="off" type="text" name="noag" required class="form-control" />
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold">Asal Surat</label>
                                                <input autocomplete="off" type="text" name="asal" required class="form-control" />
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold">Isi Ringkas/Perihal</label>
                                                <textarea name="isi" class="form-control"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="inputGroupFile01" class="custom-file-label">File Surat</label> <span class="text-danger">Format: jpg/jpeg/png/pdf (5Mb)</span>
                                                <input class="form-control" type="file" name="filesm" id="inputGroupFile01">
                                            </div>
                                            <br>

                                            <div class="form-group">
                                                <label class="font-weight-bold">Tanggal Surat</label>
                                                <input value="<?= date('Y-m-d') ?>" type="date" name="tglsm" required class="form-control" />
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold">Tanggal Diterima</label>
                                                <input value="<?= date('Y-m-d') ?>" type="date" name="tglsmd" required class="form-control" />
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold">Keterangan Surat</label>
                                                <textarea name="ket" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-warning" type="button" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                                        <button class="btn btn-success btn-round" type="submit"><i class="fa fa-arrow-circle-right"></i> Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <br>

<?php


include '../template/footer.php';
?>