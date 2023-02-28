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
                        <h2 class="btn btn-warning">~ LAPORAN PEMILIK USAHA ~</h2>
                    </center>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="container-fluid">

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <table>
                            <form method="get" action="">
                                <div id="form-nama_kbli">
                                    <label>Filter Per Nama KBLI</label><br>
                                    <select name="nama_kbli" class="form-control">
                                        <option value="">-- Pilih KBLI --</option>
                                        <?php

                                        $sql = $db->query("select * from tb_kbli ");
                                        while ($data = $sql->fetch_assoc()) {
                                            echo "<option value='$data[nama_kbli]'>$data[nama_kbli]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <label hidden>Filter Berdasarkan</label><br>
                                <select name="filter" id="filter" hidden>
                                    <option value="4" hidden> </option>
                                </select>
                                <br>
                    </div>

                    <button type="submit" class="btn btn-primary ml-2 ">Tampilkan</button> | 
                    <a href="lap_pemilikusaha.php" class="btn btn-danger ">Reset Filter</a> |
                    
                    </form>
                    
                    <?php
                    if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
                        $filter = $_GET['filter']; // Ambil data filder yang dipilih user
                        if ($filter == '4') { // Jika filter nya 2 (per bulan)
                            echo '<a href="laporan/cetak_pemilikusaha.php?filter=4&nama_kbli=' . $_GET['nama_kbli'] . '" target="_blank"  class="btn btn-warning">Cetak </a><br>';
                            $query = "SELECT * FROM tb_telahaan WHERE nama_kbli='" . $_GET['nama_kbli'] .  "'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
                        }
                    } else { // Jika user tidak mengklik tombol tampilkan
                        echo '<br>';
                        echo '<br>';
                        echo '<br>';
                        echo '<a href="laporan/cetak_pemilikusaha.php" target="_blank"  class="btn btn-primary">Cetak </a> ';
                        $query = "SELECT * FROM tb_telahaan ORDER BY nama_kbli	"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
                    }
                    ?>
                    </table>


                    <div style="text-align: center;">
                        <font size="4"><b><u>LAPORAN PEMILIK USAHA</u></b></font><br>
                    </div>
                    <br>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Lengkap</th>
                                    <th>Nama Perusahan</th>
                                    <th>Nomor Induk</th>
                                    <th>Nama KBLI</th>
                                    <th>Kode KBLI</th>
                                    <th>Bidang / Jasa Dagangan Utama</th>
                                    <th>Alamat Usaha</th>
                                    <th>Desa / Kelurahan</th>
                                    <th>Kecamatan</th>
                                    <th>Kabupaten / Kota</th>
                                    <th>Provinsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = mysqli_query($db, $query); // Eksekusi/Jalankan query dari variabel $query
                                $data = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                if ($data > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                                    while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                        <tr>
                                            <td> <?= $no++ ?></td>
                                            <td> <?= $row['nama_lengkap'] ?> </td>
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

                                        </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        <?php
                                }


                                include '../template/footer.php';
        ?>