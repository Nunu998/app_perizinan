<?php ob_start();
include "../koneksi.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN PEGAWAI</title>
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
        <font size="4"><b><u>LAPORAN DATA PEGAWAI</h2></u></b></font><br>
    </div>
    <br>


    <body>

        <p></p>

        <table border="1" cellspacing="0" width="100%">
            <tr>
                <th width="5%">No</th>

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
            <?php
            $sql = mysqli_query($db, "SELECT * FROM tb_pegawai");
            $no = 1;
            while ($row = mysqli_fetch_assoc($sql)) {
                $tgl = date('d-m-Y', strtotime($row['tanggal_lahir']));
            ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td> <?= $row['nip'] ?> </td>
                    <td> <?= $row['nama_pegawai'] ?> </td>
                    <td> <?= $row['tempat'] ?> </td>
                    <td> <?= $tgl  ?></td>
                    <td> <?= $row['jk'] ?> </td>
                    <td> <?= $row['agama']  ?></td>
                    <td> <?= $row['hp']  ?></td>
                    <td> <?= $row['id_pangkat']  ?></td>
                    <td> <?= $row['id_jabatan']  ?></td>
                    <td> <?= $row['id_status']  ?></td>
                </tr>

            <?php } ?>
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