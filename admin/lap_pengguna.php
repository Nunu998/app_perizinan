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
                        <h2 class="btn btn-warning">~ LAPORAN PENGGUNA ~</h2>
                    </center>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="card-body">

                <table>
                    <form method="get" action="">


                        <?php
                        if (isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                            echo '<a href="lap_pengguna.php" class="btn btn-default">RESET</a>';
                        ?>
                    </form>
                    <?php
                    // Load file koneksi.php
                    include "koneksi.php";
                    $alamat = @$_GET['alamat']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
                    if (empty($alamat)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
                        // Buat query untuk menampilkan semua data transaksi
                        $query = "SELECT * FROM t_user";
                        $url_cetak = "laporan/cetak_pengguna.php";
                        
                    } else { // Jika terisi
                        // Buat query untuk menampilkan data transaksi sesuai periode tanggal
                        $query = "SELECT * FROM t_user WHERE alamat='" . $_GET['alamat'] . "'";
                        $url_cetak = "laporan/cetak_pengguna.php?alamat=" . $alamat . "&filter=true";
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
                          
                            <th width="5%">No</th>
                                                <th>Username</th>
                                                <th>Nama Depan</th>
                                                <th>Nama Belakang</th>
                                                <th>Nama Lengkap</th>
                                                <th>Email</th>
                                                <th>No HP</th>
                                                <th>Level</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = mysqli_query($db, "SELECT * FROM t_user");
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($sql)) {
                              
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
                                </tr>

                            <?php } ?>
                    </table>
                    <ol></ol>

                    <br>


                    <?php


                    include '../template/footer2.php';
                    ?>