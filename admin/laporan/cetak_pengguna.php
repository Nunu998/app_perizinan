<?php ob_start();
include "../koneksi.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN DATA PENGGUNA</title>
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
        <font size="4"><b><u>LAPORAN DATA PENGGUNA</h2></u></b></font><br>
    </div>
    <br>


    <body>

        <p></p>

        <table border="1" cellspacing="0" width="100%">
            <tr>
            <th width="5%">No</th>
                                                <th>Username</th>
                                                <th>Nama Depan</th>
                                                <th>Nama Belakang</th>
                                                <th>Nama Lengkap</th>
                                                <th>Email</th>
                                                <th>No HP</th>
                                                <th>Level</th>
            </tr>
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