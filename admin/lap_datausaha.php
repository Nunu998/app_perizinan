<!DOCTYPE html>
<?php
session_start();
include 'sesi-admin.php';
include 'koneksi.php';
include '../template/header.php';
include '../template/sidebarmenu.php';
?>


<!-- Begin Page Content -->

<body class="responsive">

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 page-header">
                    <center>
                        <h2 class="btn btn-warning">~ LAPORAN DATA USAHA ~</h2>
                    </center>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="card-body">
                <div class="card-header ">
                    <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Pilih Tanggal Laporan Data Usaha</h6>
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
                    header("Location: lap_datausaha.php");
                    die();
                } else {
                    $query = mysqli_query($db, "SELECT * FROM tb_usaha WHERE tanggal BETWEEN '$tglaw' AND '$tglak'");
            ?>

                    <div class="card shadow mb-4">
                        <div class="card-header card-header py-3">
                            <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Data Laporan Data Usaha <?= $tglaw ?> s/d <?= $tglak ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="bg-info text-white">
                                        <tr align="center">

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
                                            <td> <?= $tgl ?> </td>
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
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
<br>
                        <div class="card-footer text-right">
                            <a class="btn btn-warning" target="_blank" href="laporan/cetak_datausaha.php?tglaw=<?= $tglaw ?>&tglak=<?= $tglak ?>">Cetak </a>
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