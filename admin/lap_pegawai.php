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
                        <h2 class="btn btn-warning">~ LAPORAN PEGAWAI ~</h2>
                    </center>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="card-body">

                <table>
                    <form method="get" action="">


                        <?php
                        if (isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                            echo '<a href="lap_pegawai.php" class="btn btn-default">RESET</a>';
                        ?>
                    </form>
                    <?php
                    // Load file koneksi.php
                    include "koneksi.php";
                    $alamat = @$_GET['alamat']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
                    if (empty($alamat)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
                        // Buat query untuk menampilkan semua data transaksi
                        $query = "SELECT * FROM tb_pegawai";
                        $url_cetak = "laporan/cetak_pegawai.php";
                        $label = "Semua Data Pegawai ";
                    } else { // Jika terisi
                        // Buat query untuk menampilkan data transaksi sesuai periode tanggal
                        $query = "SELECT * FROM tb_pegawai WHERE alamat='" . $_GET['alamat'] . "'";
                        $url_cetak = "laporan/cetak_supplier.php?alamat=" . $alamat . "&filter=true";
                        $label = 'Alamat ' . $alamat;
                    }
                    ?>

                    <div style="margin-top: 5px;">
                        <b><a href="<?php echo $url_cetak ?>" target="blank" class="btn btn-primary">CETAK PDF</a></b>

                    </div>
                    <br>

            </div>

            </table>

            <div class="tampung2">


                <br>

                <div class="table-responsive">
                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = mysqli_query($db, "SELECT * FROM tb_pegawai");
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($sql)) {
                                $tgl = date('d-m-Y', strtotime($row['tanggal_lahir']));
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
                                </tr>

                            <?php } ?>
                    </table>
                    <ol></ol>

                    <br>


                    <?php


                    include '../template/footer2.php';
                    ?>