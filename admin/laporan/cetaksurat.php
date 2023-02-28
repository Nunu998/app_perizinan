<?php
$db = mysqli_connect("localhost", "root", "", "db_perizinan");
$id = $_GET['id_telahaan'];
$sql = mysqli_query($db, "SELECT * FROM tb_telahaan WHERE id_telahaan='$id'");
$t = mysqli_fetch_assoc($sql);
?>
<?php
$no = 1;
$sql = $db->query("SELECT * FROM tb_telahaan WHERE id_telahaan= '$id'");
while ($row = $sql->fetch_assoc()) {
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN DATA PEMILIK USAHA</title>
    <link rel="shortcut icon" href="../../assets/logo/atas.png">
</head>

<body onLoad="window.print()">
    <table border="0" align="center" width="100%">
        <tr align="center">
            <td width="1px">
                <img width="100px" src="../../assets/logo/atas.png">
            </td>
            <td>

                <font size="4">PEMERINTAH KOTA BANJARMASIN</font>

                <br>
                <b>
                    <font size="2">DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU</font>
                </b>
                <br>
                <font size="1"> Jalan Sultan Adam RT. 28 No. 49 Banjarmasin 70122<br>
                    <font size="1">Telpon/Faksimile (0511) 3305525<br>
                        <font size="1">Pos-el dpmptsp.banjarmasin@gmail.com<br>
                        </font>
            <td width="1px">
                <img width="100px" src="../../assets/logo/balai.png">
                <img width="100px" src="../../assets/logo/iso.png">
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <hr size="3px" color="black">
            </td>
        </tr>
    </table>
  
    <body>

    <style>
        #judul{
            text-align:center;
        }

        #halaman{
            width: auto; 
            height: auto; 
            position: absolute; 
            padding-top: 0px; 
            padding-left: 30px; 
            padding-right: 30px; 
            padding-bottom: 100px;
        }
    </style>

</head>

<body>
    <div id=halaman>
        <h3 id=judul>IZIN USAHA</h3>

        <p>Lembaga OSS Berdasarkan ketentuan Pasal 19 Ayat (2) dan Pasal 32 Peraturan Pemerintah Nomor 24 Tahun 2018 tentang Pelayanan Perizinan Berusaha Terintegrasi Secara Elektronik, untuk dan atas nama Kepala Dinas menerbitkan <b> Surat Izin Usaha <?php echo $row ['nama_kbli'] ?></b> Kepada : </p>

        <table>
        <tr>
                <td style="width: 30%;">Nama Pemohon</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?php echo $row['nama_lengkap'] ?></td>
            </tr>
            <tr>
                <td style="width: 30%;">Nama Perusahan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?php echo $row['nama_perusahan'] ?></td>
            </tr>
            <tr>
                <td style="width: 30%;">Nomor Induk Berusaha</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?php echo $row['no_induk'] ?></td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Alamat Perusahaan</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;"><?php echo $row['alamat'] ?></td>
            </tr>
            <tr>
                <td style="width: 30%;">Nama KBLI</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?php echo $row['nama_kbli'] ?></td>
            </tr>
            <tr>
                <td style="width: 30%;">Kode KBLI</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?php echo $row['kode_kbli'] ?></td>
            </tr>
            <tr>
                <td style="width: 30%;">Barang / Jasa Dagangan Utama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?php echo $row['bidang'] ?></td>
            </tr>
            <tr>
                <td style="width: 30%;"><b></b></td>
            </tr>
            <tr>
                <td style="width: 30%;"><b>Lokasi Usaha</b></td>
            </tr>
            <tr>
                <td style="width: 30%;">- Alamat</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?php echo $row['alamat_usaha'] ?></td>
            </tr>
            <tr>
                <td style="width: 30%;">- Desa/Kelurahan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?php echo $row['desa'] ?></td>
            </tr>
            <tr>
                <td style="width: 30%;">- Kecamatan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?php echo $row['kecamatan'] ?></td>
            </tr>
            <tr>
                <td style="width: 30%;">- Kabupaten/Kota</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?php echo $row['kabupaten'] ?></td>
            </tr>
            <tr>
                <td style="width: 30%;">- Provinsi</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?php echo $row['provinsi'] ?></td>
            </tr>
        </table>

        <p>Izin Usaha Ini berlaku selama perusahaan melakukan kegiatan operasional sesuai ketentuan perundang-undangan.</p>
        <p> <tr>
                <td style="width: 30%;">Dikeluarkan Tanggal</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><b><?= date('d-m-Y') ?></b></td>
            </tr></p>


            <?php
    $sql = mysqli_query($db, "SELECT * FROM tb_instansi WHERE id_instansi = '1'");
    while ($row = mysqli_fetch_assoc($sql)) {
    ?>
        <div style="width: 30%; text-align: left; float: right;"> Banjarmasin : <?= date('d-m-Y') ?><br></div><br>
        <div style="width: 30%; text-align: left; float: right;">Kepala Dinas,</div><br><br><br><br><br>
        <div style="width: 30%; text-align: left; float: right;">  <b><?php echo $row['kepala']; ?></b></div><br>
        <div style="width: 30%; text-align: left; float: right;">  <?php echo $row['nip']; ?></div>
        <?php } ?>
    </div>
</body>

</html>













<?php } ?>