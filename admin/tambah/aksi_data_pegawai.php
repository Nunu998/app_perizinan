<?php
session_start();
include '../../koneksi/koneksi.php';


if (isset($_POST['insert'])) {
    $nama_pegawai = $_POST['nama_pegawai'];
    $nip = $_POST['nip'];
    $tempat = $_POST['tempat'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jk = $_POST['jk'];
    $agama = $_POST['agama'];
    $hp = $_POST['hp'];
    $id_pangkat = $_POST['id_pangkat'];
    $id_jabatan = $_POST['id_jabatan'];
    $id_status = $_POST['id_status'];



    if ($nama_pegawai != "" || $nip != "" || $tempat != "" || $tanggal_lahir != "" || $jk != "" || $agama != "" || $hp != "" || $id_pangkat != "" || $id_jabatan != "" || $id_status != "") {


        $cek_user = mysqli_num_rows(mysqli_query($db, "SELECT * FROM tb_pegawai WHERE hp='$_POST[hp]'"));
        if ($cek_user) {
            $_SESSION['info'] = 'hp';
            echo "<script>document.location.href='../datapegawai.php'</script>";
        } else {
            $cek_user = mysqli_num_rows(mysqli_query($db, "SELECT * FROM tb_pegawai WHERE nip='$_POST[nip]'"));
            if ($cek_user) {
                $_SESSION['info'] = 'nip';
                echo "<script> document.location.href = '../datapegawai.php' </script>";
            } else {
                //query tambah
                $insert =  mysqli_query($db, "INSERT INTO tb_pegawai VALUES('', '$nama_pegawai', '$nip', '$tempat','$tanggal_lahir' , '$jk' , '$agama','$hp','$id_pangkat','$id_jabatan','$id_status')");

                if ($insert) {
                    $_SESSION['info'] = 'Disimpan';
                    echo "<script>document.location.href='../datapegawai.php'</script>";
                } else {
                    $_SESSION['info'] = 'Gagal Disimpan';
                    echo "<script>document.location.href='../datapegawai.php'</script>";
                }
            }
        }
    }
}
