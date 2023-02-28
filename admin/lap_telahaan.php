<!DOCTYPE html>
<?php
session_start();
include 'sesi-admin.php';
include 'koneksi.php';
include '../template/header.php';
include '../template/sidebarmenu.php';
?>
<?php
/**
 * Menampilkan format rupiah dengan PHP.
 *
 */
function rupiah($angka)
{
    $hasil = 'Rp. ' . number_format($angka, 2, ",", ".");
    return $hasil;
} ?>

<!-- Begin Page Content -->

<body class="responsive">

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 page-header">
                    <center>
                        <h2 class="btn btn-warning">~ LAPORAN PERMOHONAN PENGAJUAN USAHA ~</h2>
                    </center>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="card-body">
                <div class="card-header ">
                    <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Pilih Tanggal Laporan Permohonan Pengajuan Usaha</h6>
                </div>
                <br>

                <form action="" method="POST">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col md-12">
                                <label for="" class="col-form-label font-weight-bold">Tanggal Awal</label>
                                <div class="col-md-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-1"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" name="tglaw" class="form-control" required />
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row mb-3">
                            <div class="col md-12 ">
                                <label for="" class="col-form-label font-weight-bold">Tanggal Akhir</label>
                                <div class="col-md-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-1"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" name="tglak" class="form-control" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <p></p>
                    <div class="card-footer text-right">
                        <button name="lihat" class="btn btn-warning" type="submit"> Pilih Tanggal</button>
                    </div>
                </form>
            </div>

            <?php
            if (isset($_POST['lihat'])) {
                $tglaw = $_POST['tglaw'];
                $tglak = $_POST['tglak'];

                if ($tglaw == "" || $tglak == "") {
                    header("Location: lap_telahaan.php");
                    die();
                } else {
                    $query = mysqli_query($db, "SELECT * FROM tb_telahaan WHERE tanggal BETWEEN '$tglaw' AND '$tglak'");
            ?>

                    <div class="card shadow mb-4">
                        <div class="card-header card-header py-3">
                            <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Data Laporan Permohonan Pengajuan Usaha <?= $tglaw ?> s/d <?= $tglak ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            $tgl = date('d-m-Y', strtotime($row['tanggal']));
                                        ?>
                                            <tr align="center">
                                                <td> <?= $no++ ?></td>
                                                <td> <?= $row['nama_lengkap'] ?> </td>
                                                <td> <?= $row['nomor_surat'] ?> </td>
                                                <td> <?= $tgl ?> </td>
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
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
<br>
                        <div class="card-footer text-right">
                            <a class="btn btn-warning" target="_blank" href="laporan/cetak_telahaan.php?tglaw=<?= $tglaw ?>&tglak=<?= $tglak ?>">Cetak </a>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
        </div>
    </div>
    </div>

<?php }
            }

            include '../template/footer2.php';
?>