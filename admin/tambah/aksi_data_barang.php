<?php
session_start();
include '../../koneksi/koneksi.php';


if (isset($_POST['insert'])) {
    $nama_barang = $_POST['nama_barang'];

    
    if ($nama_barang != "" ) {

                 $insert =  mysqli_query($db, "INSERT INTO tb_barang VALUES('', '$nama_barang')");

                if ($insert) {
                    $_SESSION['info'] = 'Disimpan';
                    echo "<script>document.location.href='../barang.php'</script>";
                } else {
                    $_SESSION['info'] = 'Gagal Disimpan';
                    echo "<script>document.location.href='../barang.php'</script>";
                }
            }
        }
