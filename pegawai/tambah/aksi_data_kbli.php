<?php
session_start();
include '../../koneksi/koneksi.php';


if (isset($_POST['insert'])) {
    $nama_kbli = $_POST['nama_kbli'];
    $kode_kbli = $_POST['kode_kbli'];
    
    if ($nama_kbli != "" || $kode_kbli != "" ) {

                 $insert =  mysqli_query($db, "INSERT INTO tb_kbli VALUES('', '$nama_kbli', '$kode_kbli')");

                if ($insert) {
                    $_SESSION['info'] = 'Disimpan';
                    echo "<script>document.location.href='../kbli.php'</script>";
                } else {
                    $_SESSION['info'] = 'Gagal Disimpan';
                    echo "<script>document.location.href='../kbli.php'</script>";
                }
            }
        }
