<?php
session_start();
include "../koneksi.php";

if (isset($_POST['insert'])) {
    $nomor_berkas = $_POST['nomor_berkas'];
    $tanggal = $_POST['tanggal'];
    $nomor_surat = $_POST['nomor_surat'];
    $perihal = $_POST['perihal'];

    if ($nomor_berkas != "" || $tanggal != "" || $nomor_surat != "" || $perihal != "") {


        $cek_nomor = mysqli_num_rows(mysqli_query($db, "SELECT * FROM tb_suratkeluar WHERE nomor_berkas='$_POST[nomor_berkas]'"));
        if ($cek_nomor) {
            $_SESSION['info'] = 'Nomor Berkas';
            echo "<script>document.location.href='../suratkeluar.php'</script>";
        } else {
            //query tambah
            $insert =  mysqli_query($db, "INSERT INTO tb_suratkeluar VALUES('', '$nomor_berkas', '$tanggal', '$nomor_surat','$perihal')");

            if ($insert) {
                $_SESSION['info'] = 'Disimpan';
                echo "<script>document.location.href='../suratkeluar.php'</script>";
            } else {
                $_SESSION['info'] = 'Gagal Disimpan';
                echo "<script>document.location.href='../suratkeluar.php'</script>";
            }
        }
    }
}
