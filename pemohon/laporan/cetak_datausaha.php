<?php ob_start();
$tglaw = $_GET['tglaw'];
$tglak = $_GET['tglak'];
include "../koneksi.php";
$query = mysqli_query($db, "SELECT * FROM tb_usaha WHERE tanggal BETWEEN '$tglaw' AND '$tglak'"); ?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN DATA USAHA</title>
    <link rel="shortcut icon" href="../../assets/logo/atas.png">
</head>

<body onLoad="window.print()">
    <table border="0" align="center" width="100%">
        <tr align="center">
            <td width="1px">
                <img width="100px" src="../../assets/logo/atas.png">
            </td>
            <td>

                <font size="5,5">PEMERINTAH KOTA BANJARMASIN</font>

                <br>
                <b>
                    <font size="4,5">DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU</font>
                </b>
                <br>
                <font size="2"> Jalan Sultan Adam RT. 28 No. 49 Banjarmasin 70122<br>
                    <font size="2">Telpon/Faksimile (0511) 3305525<br>
                        <font size="2">Pos-el dpmptsp.banjarmasin@gmail.com<br>
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
    <br>
    <div style="text-align: center;">
        <font size="4"><b><u>LAPORAN DATA USAHA </h2></u></b></font><br>
    </div>
    <br>

    <body>

        <p>
        <table border="1" cellspacing="0" width="100%">
            <tr>
            <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Jenis Permohonan</th>
                                        <th>Nama Permohonan</th>
                                        <th>Alamat</th>
                                        <th>Skala Usaha</th>
                                        <th>NIB</th>
                                        <th>Nama Perizinan</th>
                                        <th>Jenis Perizinan</th>
                                        <th>Kategori</th>
                                        <th>Sektor Perizinan</th>
                                        <th>Sektor Usaha</th>
            </tr>
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
    </body>
    </table>
    <ol></ol>
    <br>
    <?php
    $sql = mysqli_query($db, "SELECT * FROM tb_instansi WHERE id_instansi = '1'");
    while ($row = mysqli_fetch_assoc($sql)) {
    ?>
        <div style="width:230px;float:right;">
           Banjarmasin : <?= date('d-m-Y') ?><br>
            <ol></ol>
            <div style="font-weight:center;text-align:center">
                Kepala Dinas, <br />
                <p>&nbsp;</p>
                <br/>
                <b><?php echo $row['kepala']; ?></b><br>
                <?php echo $row['nip']; ?></p>
            </div>
        </div>
        </div>
    <?php } ?>
</body>