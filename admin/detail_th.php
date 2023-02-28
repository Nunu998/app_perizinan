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
    $sqlsm = mysqli_query($db, "SELECT * FROM tb_telahaan WHERE id_telahaan='$id'");
    $t = mysqli_fetch_assoc($sqlsm);
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
            <div class="col-lg-12 page-header">
                <center>
                    <h2 class="btn btn-warning">~ DETAIL PERMOHONAN PENGAJUAN USAHA ~</h2>
                </center>
            </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a href="pengajuan.php" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Kembali</span>
                </a>
            </div>
            <br>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="alert alert-info responsive" role="alert">
                    <p>*Note : Disarankan Menggunakan Laptop / Komputer.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Detail Permohonan Telahaan Izin Usaha (<?= $t['nama_lengkap'] ?>).
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
                                                <td><?= $t['nama_lengkap'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Nomor Surat</th>
                                                <td><?= $t['nomor_surat'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Tanggal</th>
                                                <td><?= $t['tanggal'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Perihal</th>
                                                <td><?= $t['perihal'] ?></td>
                                            </tr>

                                            <tr>
                                                <th class="bg-light">Alamat</th>
                                                <td><?= $t['alamat'] ?></td>
                                            </tr>

                                            
                                            <tr>
                                                <th class="bg-light">Nama Perusahan</th>
                                                <td><?= $t['nama_perusahan'] ?></td>
                                            </tr>

                                            
                                            <tr>
                                                <th class="bg-light">Nomor Induk Perusahan</th>
                                                <td><?= $t['no_induk'] ?></td>
                                            </tr>

                                            
                                            <tr>
                                                <th class="bg-light">Nama KBLI</th>
                                                <td><?= $t['nama_kbli'] ?></td>
                                            </tr>

                                            
                                            <tr>
                                                <th class="bg-light">Kode KBLI</th>
                                                <td><?= $t['kode_kbli'] ?></td>
                                            </tr>

                                            
                                            <tr>
                                                <th class="bg-light">Barang / Jasa Dagangan Utama</th>
                                                <td><?= $t['bidang'] ?></td>
                                            </tr>

                                            
                                            <tr>
                                                <th class="bg-light">Alamat Usaha</th>
                                                <td><?= $t['alamat_usaha'] ?></td>
                                            </tr>


                                            
                                            <tr>
                                                <th class="bg-light">Desa / Kelurahan</th>
                                                <td><?= $t['desa'] ?></td>
                                            </tr>

                                            
                                            <tr>
                                                <th class="bg-light">Kecamatan</th>
                                                <td><?= $t['kecamatan'] ?></td>
                                            </tr>

                                            
                                            <tr>
                                                <th class="bg-light">Kabupaten / Kota</th>
                                                <td><?= $t['kabupaten'] ?></td>
                                            </tr>

                                            
                                            <tr>
                                                <th class="bg-light">Provinsi</th>
                                                <td><?= $t['provinsi'] ?></td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">Keterangan</th>
                                                <td><?= $t['keterangan'] ?></td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">File Surat</th>
                                                <td>
                                                    <?php
                                                    if ($t['file_telahaan'] == 'TIDAK ADA FILE') {
                                                        echo "<b>Tidak Ada FIle</b>";
                                                    } else {
                                                    ?>
                                                        <embed href="fth.php?id=<?= $t['id_telahaan'] ?>" type="application/pdf" width="800" height="600" src='../pemohon/file/telahaan/<?= $t['file_telahaan'] ?>' alt='<?= $t['file_telahaan'] ?>' width='30%'></a><br>
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