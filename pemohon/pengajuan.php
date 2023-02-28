<!DOCTYPE html>
<?php
session_start();
include 'sesi-pemohon.php';
include 'koneksi.php';
include '../template_pemohon/header.php';
include '../template_pemohon/sidebarmenu.php';
$sql = mysqli_query($db, "SELECT * FROM t_user WHERE nama_lengkap = '" . $_SESSION['nama'] . "'");
while ($row = mysqli_fetch_assoc($sql)) {
    $format = $row['nama_lengkap'];
}
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
                    <h2 class="btn btn-warning">~ PERMOHONAN PENGAJUAN USAHA ~</h2>
                </center>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="#" data-toggle="modal" data-target="#tambahsm" class="btn btn-info"> <i class="fa fa-plus"></i> Tambah Data Pengajuan Usaha </a>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Pengajuan Usaha DPMPTSP Kota Banjarmasin
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead class="bg-info text-white">
                                    <tr align="center">
                                        <th>No.</th>
                                        <th>Nama Lengkap</th>
                                        <th>Nomor Surat</th>
                                        <th>Tanggal</th>
                                        <th>Perihal</th>
                                        <th>Alamat</th>
                                        <th>Nama Perusahan</th>
                                        <th>Nomor Induk</th>
                                        <th>Nama KBLI</th>
                                        <th>Kode KBLI</th>
                                        <th>Barang / Jasa Dagangan Utama</th>
                                        <th>Alamat Usaha</th>
                                        <th>Desa / Kelurahan</th>
                                        <th>Kecamatan</th>
                                        <th>Kabupaten / Kota</th>
                                        <th>Provinsi</th>
                                        <th>Keterangan</th>
                                        <th>Konfirmasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = mysqli_query($db, "SELECT * FROM tb_telahaan WHERE konfirmasi='Menunggu' AND  nama_lengkap = '" . $_SESSION['nama'] . "' ");
                                    $no = 1;
                                    while ($row = mysqli_fetch_assoc($sql)) {
                                        $_SESSION['test_name'] = $row['nama_lengkap'];

                                    ?>
                                        <tr>
                                            <td> <?= $no++ ?></td>
                                            <td> <?= $row['nama_lengkap'] ?> </td>
                                            <td> <?= $row['nomor_surat'] ?> </td>
                                            <td> <?= $row['tanggal'] ?> </td>
                                            <td> <?= $row['perihal']  ?></td>
                                            <td> <?= $row['alamat'] ?> </td>
                                            <td> <?= $row['nama_perusahan'] ?> </td>
                                            <td> <?= $row['no_induk'] ?> </td>
                                            <td> <?= $row['nama_kbli'] ?> </td>
                                            <td> <?= $row['kode_kbli'] ?> </td>
                                            <td> <?= $row['bidang'] ?> </td>
                                            <td> <?= $row['alamat_usaha'] ?> </td>
                                            <td> <?= $row['desa'] ?> </td>
                                            <td> <?= $row['kecamatan'] ?> </td>
                                            <td> <?= $row['kabupaten'] ?> </td>
                                            <td> <?= $row['provinsi'] ?> </td>
                                            <td> <?= $row['keterangan']  ?></td>
                                            <td class="btn btn-info"> <?= $row['konfirmasi']  ?></td>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <!-- <a title="Print" href="cetakdisp.php?id=<?= $row['id_telahaan'] ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-print"></i></a> -->


                                                    <!-- <a title="Disposisi" href="disposisi.php?id=<?= $row['id_telahaan'] ?>" class="btn btn-info btn-sm"><i class="fa fa-archive"></i></a> -->

                                                  

                                                    <a title="Hapus" href="data/aksi_telahaan.php?act=hapus&id=<?php echo $row['id_telahaan']; ?>" class="btn btn-danger btn-sm delete-data btn-mat"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- editidk Modal-->
                                        <div class="modal fade bd-example-modal-lg" id="edit<?php echo $row['id_telahaan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user-md"></i> Edit Data Permohonan Permohonan pengajuan Usaha</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form action="tambah/aksi_edit_telahaan.php" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <?php
                                                            $id = $row['id_telahaan'];
                                                            $sqledit = mysqli_query($db, "SELECT * FROM tb_telahaan WHERE id_telahaan='$id'");
                                                            while ($rowe = mysqli_fetch_assoc($sqledit)) {
                                                            ?>
                                                                <div class="row">
                                                                    <div class="col-md-6">

                                                                        <div class="form-group">
                                                                            <label class="font-weight-bold">Nama Lengkap</label>
                                                                            <input autocomplete="off" type="text" name="nale" required class="form-control" value="<?= $rowe['nama_lengkap'] ?>" readonly />
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="font-weight-bold">Nomor Surat</label>
                                                                            <input autocomplete="off" type="text" name="nosu" required class="form-control" value="<?= $rowe['nomor_surat'] ?>" />
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="font-weight-bold">Tanggal</label>
                                                                            <input autocomplete="off" type="date" name="tg" required class="form-control" value="<?= $rowe['tanggal'] ?>" />
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="font-weight-bold">Perihal</label>
                                                                            <input name="per" autocomplete="off" type="text" class="form-control" value="<?= $rowe['perihal'] ?>" />
                                                                        </div>

                                                                        <div class=" form-group">
                                                                            <label class="font-weight-bold">Alamat</label>
                                                                            <textarea name="al" class="form-control"><?= $row['alamat'] ?></textarea>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="font-weight-bold">Nama Perusahan</label>
                                                                            <input name="nape" autocomplete="off" type="text" class="form-control" value="<?= $rowe['nama_perusahan'] ?>" />
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="font-weight-bold">Nomor Induk Perusahan</label>
                                                                            <input name="nip" autocomplete="off" type="text" class="form-control" value="<?= $rowe['no_induk'] ?>" />
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="font-weight-bold">Nama KBLI </label>
                                                                            <input name="nb"readonly autocomplete="off" type="text" class="form-control" value="<?= $rowe['nama_kbli'] ?>" />
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="font-weight-bold">Kode KBLI</label>
                                                                            <input name="kk" readonly autocomplete="off" type="text" class="form-control" value="<?= $rowe['kode_kbli'] ?>" />
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-md-6">

                                                                        <div class="form-group">
                                                                            <label class="font-weight-bold">Barang / Jasa Dagangan Utama</label>
                                                                            <input name="bd" autocomplete="off"readonly type="text" class="form-control" value="<?= $rowe['bidang'] ?>" />
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="font-weight-bold">Alamat Usaha</label>
                                                                            <input name="au" autocomplete="off" type="text" class="form-control" value="<?= $rowe['alamat_usaha'] ?>" />
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="font-weight-bold">Desa/Kelurahan</label>
                                                                            <input name="de" autocomplete="off" type="text" class="form-control" value="<?= $rowe['desa'] ?>" />
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="font-weight-bold">Kecamatan</label>
                                                                            <input name="kec" autocomplete="off" type="text" class="form-control" value="<?= $rowe['kecamatan'] ?>" />
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="font-weight-bold">Kabupaten/Kota</label>
                                                                            <input name="kab" autocomplete="off" type="text" class="form-control" value="<?= $rowe['kabupaten'] ?>" />
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="font-weight-bold">Provinsi</label>
                                                                            <input name="prov" autocomplete="off" type="text" class="form-control" value="<?= $rowe['provinsi'] ?>" />
                                                                        </div>

                                                                        <div class=" mb-3">
                                                                            <label for="inputGroupFile01" class="custom-file-label">File</label> <span class="text-danger">Format: pdf (5Mb)</span>
                                                                            <input class="form-control" type="file" name="fileth" id="inputGroupFile01">
                                                                        </div>
                                                                        <?php
                                                                        if ($rowe['file_telahaan'] == 'TIDAK ADA FILE') {
                                                                            echo "<b>Tidak Ada FIle</b>";
                                                                        } else {
                                                                        ?>
                                                                            <a href="fth.php?id=<?= $rowe['id_telahaan'] ?>" class="btn btn-success btn-sm">Lihat File</a>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                        <br>
                                                                        <br>
                                                                     
                                                                        <br>
                                                                        <div class="mb-3">
                                                                            <p><b>File Yang Diperlukan untuk upload Data adalah : </b><br>
                                                                                1. Surat Permohonan Pengajuan Usaha. <br>
                                                                                2. KTP (Kartu Tanda Penduduk). <br>
                                                                                3. NPWP. <br>
                                                                                4. Site Plan. <br>
                                                                                5. SKT (Surat Keterangan Tanah). <br>

                                                                                Semua Data yang diperlukan Di jadiklan Satu File FDP.
                                                                            </p>
                                                                        </div>

                                                                        <input type="hidden" name="id" value="<?= $rowe['id_telahaan'] ?>">
                                                                        <input type="hidden" name="filelama" value="<?= $rowe['file_telahaan'] ?>" id="">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-warning" type="button" data-dismiss="modal"><i class="fas fa-fw fa-times mr-1"></i> Batal</button>
                                                            <input type="submit" name="insert" class="btn btn-success" value="Simpan">
                                                        </div>
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



                    <!-- tambahsm Modal-->
                    <div class="modal fade bd-example-modal-lg" id="tambahsm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-archive"></i> Tambah Data Permohonan pengajuan Usaha</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form action="data/aksi_telahaan.php?act=tambah" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                    <label class="font-weight-bold">Nama Lengkap</label>
                                                    <input autocomplete="off" type="text" value="<?php echo $format; ?>" readonly name="nale" required class="form-control" />
                                                </div>
                                               
                                                <div class="form-group">
                                                    <label class="font-weight-bold">Nomor Surat</label>
                                                    <input autocomplete="off" type="text" name="nosu" required class="form-control" />
                                                </div>

                                                <div class="form-group">
                                                    <label class="font-weight-bold">Tanggal</label>
                                                    <input autocomplete="off" type="date" name="tg" required class="form-control" />
                                                </div>

                                                <div class="form-group">
                                                    <label class="font-weight-bold">Perihal</label>
                                                    <textarea autocomplete="off" type="text" name="per" required class="form-control"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label class="font-weight-bold">Alamat</label>
                                                    <textarea autocomplete="off" type="text" name="al" required class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-weight-bold">Nama Perusahan</label>
                                                    <input autocomplete="off" type="text" name="nape" required class="form-control" />
                                                </div>

                                                <div class="form-group">
                                                    <label class="font-weight-bold">Nomor Induk Perusahaan</label>
                                                    <input autocomplete="off" type="text" name="nip" required class="form-control" />
                                                </div>

                                                <div class="form-group">
                                                    <label class="font-weight-bold">Nama KBLI</label>
                                                    <select name="nk" id="kode" class="form-control">
                                                        <option>-- Pilih --</option>
                                                        <?php include '../koneksi/koneksi.php';
                                                        $sql      = "SELECT nama_kbli FROM tb_kbli";
                                                        $query    = mysqli_query($db, $sql);
                                                        while ($data = mysqli_fetch_array($query)) {
                                                            echo '<option value="' . $data['nama_kbli'] . '">' . $data['nama_kbli'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="tampung1"></div>

                                            </div>
                                            <div class="col-md-6">


                                               
                                            <div class="form-group">
                                                    <label class="font-weight-bold">Barang / Jasa Dagangan Utama</label>
                                                    <select name="bd"  class="select2_single form-control">
                                                        <option></option>
                                                        <?php include '../koneksi/koneksi.php';
                                                        $sql = $db->query("select * from tb_barang order by nama_barang");
                                                        while ($data = $sql->fetch_assoc()) {
                                                            echo "<option value='$data[nama_barang]'> $data[nama_barang]</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="font-weight-bold">Alamat Usaha </label>
                                                    <textarea autocomplete="off" type="text" name="au" required class="form-control"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label class="font-weight-bold">Desa / Kelurahan </label>
                                                    <input autocomplete="off" type="text" name="ds" required class="form-control" />
                                                </div>

                                                <div class="form-group">
                                                    <label class="font-weight-bold">Kecamatan </label>
                                                    <input autocomplete="off" type="text" name="kec" required class="form-control" />
                                                </div>

                                                <div class="form-group">
                                                    <label class="font-weight-bold">Kabupaten / Kota </label>
                                                    <input autocomplete="off" type="text" name="kab" required class="form-control" />
                                                </div>

                                                <div class="form-group">
                                                    <label class="font-weight-bold">Provinsi </label>
                                                    <input autocomplete="off" type="text" name="prov" required class="form-control" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="inputGroupFile01" class="custom-file-label">File</label> <span class="text-danger">Format: pdf (5Mb)</span>
                                                    <input class="form-control" type="file" name="fileth" id="inputGroupFile01">
                                                </div>
                                                <br>
                                        

                                               

                                                <div class="mb-3">
                                                    <p><b>File Yang Diperlukan untuk upload Data adalah : </b><br>
                                                        1. Surat Permohonan Pengajuan Usaha. <br>
                                                        2. KTP (Kartu Tanda Penduduk). <br>
                                                        3. NPWP. <br>
                                                        4. Site Plan. <br>
                                                        5. SKT (Surat Keterangan Tanah). <br>

                                                        Semua Data yang diperlukan Di jadiklan Satu File FDP.
                                                    </p>
                                                </div>
                                                <br>
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
</div>

</div>
</div>

<?php


include '../template_pemohon/footer.php';
?>
