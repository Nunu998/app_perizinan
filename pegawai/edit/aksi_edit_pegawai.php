<?php
session_start();
include '../../koneksi/koneksi.php';

if (isset($_POST['insert'])) {
    $no_urut = $_POST['no_urut'];
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


    $insert1 = mysqli_query($db, "UPDATE tb_pegawai SET nama_pegawai='$nama_pegawai', nip='$nip', tempat='$tempat', tanggal_lahir='$tanggal_lahir', jk='$jk', agama='$agama', hp='$hp', id_pangkat='$id_pangkat' , id_jabatan='$id_jabatan', id_status='$id_status'WHERE no_urut='$no_urut'");
    if ($insert1) {
        $_SESSION['info'] = 'Disimpan';
        echo "<script>document.location.href='../datapegawai.php'</script>";
    } else {
        $_SESSION['info'] = 'Gagal Disimpan';
        echo "<script>document.location.href='../datapegawai.php'</script>";
    }
} else {
    $_SESSION['info'] = 'Gagal Disimpan';
    echo "<script>document.location.href='../datapegawai.php'</script>";
}
