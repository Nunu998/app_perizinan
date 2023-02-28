<?php
session_start();
include '../koneksi.php';
if ($_GET['act'] == 'tambah') {
    $no = $_POST['nosk'];
    $noag = $_POST['noag'];
    $tujuan = $_POST['tujuan'];
    $isi = $_POST['isi'];
    $tglsk = $_POST['tglsk'];
    $tglk = $_POST['tglk'];
    $ket = $_POST['ket'];


    if ($no != "" || $noag != "" || $tujuan != "" || $isi != "" || $tglsk != "" || $tglk != "" || $ket != "") {

        $cek_nomor = mysqli_num_rows(mysqli_query($db, "SELECT * FROM tb_suratkeluar WHERE no_suratkeluar='$_POST[nosk]'"));
        if ($cek_nomor) {
            $_SESSION['info'] = 'Nomor Berkas';
            echo "<script>document.location.href='../suratkeluar.php'</script>";
        } else {

            if ($_FILES['filesk']['name'] == '') {
                $insert = mysqli_query($db, "INSERT INTO tb_suratkeluar VALUES (NULL, '$no', '$noag', '$tujuan', '$isi', '$tglsk', '$tglk', 'TIDAK ADA FILE', '$ket')");
                if ($insert) {
                    $_SESSION['info'] = 'Disimpan';
                    echo "<script>document.location.href='../suratkeluar.php'</script>";
                }
            } else {
                $rand = rand();
                $ekstensi =  array('png', 'jpg', 'jpeg', 'pdf');
                $filename = $_FILES['filesk']['name'];
                $ukuran = $_FILES['filesk']['size'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);

                if (!in_array($ext, $ekstensi)) {
                    $_SESSION['info'] = 'Gagal Disimpan';
                    echo "<script>document.location.href='../suratkeluar.php'</script>";
                } else {
                    if ($ukuran < 5044070) { //5Mb		
                        $xx = $rand . '_' . $filename;
                        move_uploaded_file($_FILES['filesk']['tmp_name'], '../file/suratkeluar/' . $rand . '_' . $filename);
                        $insert = mysqli_query($db, "INSERT INTO tb_suratkeluar VALUES (NULL, '$no', '$noag', '$tujuan', '$isi', '$tglsk', '$tglk', '$xx', '$ket')");
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
        }
    }
} elseif ($_GET['act'] == 'hapus') {
    $id = $_GET['id'];


    $sqlc = mysqli_query($db, "SELECT * FROM tb_suratkeluar WHERE id_suratkeluar ='$id'");
    $b = mysqli_fetch_array($sqlc);
    if ($b['file_suratkeluar'] == "TIDAK ADA FILE") {
        $queryhapus = mysqli_query($db, "DELETE FROM tb_suratkeluar WHERE id_suratkeluar = '$id'");
        if ($queryhapus) {
            $_SESSION['info'] = 'Dihapus';
            echo "<script>document.location.href='../suratkeluar.php'</script>";
        }
    } else {
        unlink("../file/suratkeluar/$b[file_suratkeluar]");
        //query hapus
        $queryhapus = mysqli_query($db, "DELETE FROM tb_suratkeluar WHERE id_suratkeluar = '$id'");
        if ($queryhapus) {
            $_SESSION['info'] = 'Dihapus';
            echo "<script>document.location.href='../suratkeluar.php'</script>";
        } else {
            $_SESSION['info'] = 'Gagal Dihapus';
            echo "<script>document.location.href='../suratkeluar.php'</script>";
        }
    }
    mysqli_close($db);
} elseif ($_GET['act'] == 'edit') {
    $id = $_POST['id'];
    $no = $_POST['nosk'];
    $noag = $_POST['noag'];
    $tujuan = $_POST['tujuan'];
    $isi = $_POST['isi'];
    $tglsk = $_POST['tglsk'];
    $tglk = $_POST['tglk'];
    $ket = $_POST['ket'];
    $filelama = $_POST['filelama'];

    if ($_FILES['filesk']['name'] == '') {
        $insert = mysqli_query($db, "UPDATE tb_suratkeluar SET no_suratkeluar='$no', no_agenda='$noag', tujuan_surat='$tujuan', isi_surat='$isi', tgl_surat='$tglsk', tanggal='$tglk', ket_suratkeluar='$ket', file_suratkeluar='$filelama' WHERE id_suratkeluar='$id'");
        if ($insert) {
            $_SESSION['info'] = 'Edit';
            echo "<script>document.location.href='../suratkeluar.php'</script>";
        }
    } else {
        $rand = rand();
        $ekstensi =  array('png', 'jpg', 'jpeg', 'pdf');
        $filename = $_FILES['filesk']['name'];
        $ukuran = $_FILES['filesk']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if (!in_array($ext, $ekstensi)) {
            $_SESSION['info'] = 'Gagal Disimpan';
            echo "<script>document.location.href='../suratkeluar.php'</script>";
        } else {
            if ($ukuran < 5044070) { //5Mb	
                $sqlc = mysqli_query($db, "SELECT * FROM tb_suratkeluar WHERE id_suratkeluar ='$id'");
                $b = mysqli_fetch_array($sqlc);
                if ($b['file_suratkeluar'] == 'TIDAK ADA FILE') {
                    $xx = $rand . '_' . $filename;
                    move_uploaded_file($_FILES['filesk']['tmp_name'], '../file/file_suratkeluar/' . $rand . '_' . $filename);
                    $insert1 = mysqli_query($db, "UPDATE tb_suratkeluar SET no_suratkeluar='$no', no_agenda='$noag', tujuan_surat='$tujuan', isi_surat='$isi', tgl_surat='$tglsk', tanggal='$tglk', ket_suratkeluar='$ket', file_suratkeluar='$xx' WHERE id_suratkeluar='$id'");
                    if ($insert1) {
                        $_SESSION['info'] = 'Disimpan';
                        echo "<script>document.location.href='../suratkeluar.php'</script>";
                    } else {
                        $_SESSION['info'] = 'Gagal Disimpan';
                        echo "<script>document.location.href='../suratkeluar.php'</script>";
                    }
                } else {
                    unlink("../file/suratkeluar/$b[file_suratkeluar]");
                    $xx = $rand . '_' . $filename;
                    move_uploaded_file($_FILES['filesk']['tmp_name'], '../file/suratkeluar/' . $rand . '_' . $filename);
                    $insert2 =  mysqli_query($db, "UPDATE tb_suratkeluar SET no_suratkeluar='$no', no_agenda='$noag', tujuan_surat='$tujuan', isi_surat='$isi', tgl_surat='$tglsk', tanggal='$tglk', ket_suratkeluar='$ket', file_suratkeluar='$xx' WHERE id_suratkeluar='$id'");
                    if ($insert2) {
                        $_SESSION['info'] = 'Disimpan';
                        echo "<script>document.location.href='../suratkeluar.php'</script>";
                    } else {
                        $_SESSION['info'] = 'Gagal Disimpan';
                        echo "<script>document.location.href='../suratkeluar.php'</script>";
                    }
                }
            } else {
                $_SESSION['info'] = 'Gagal Disimpan';
                echo "<script>document.location.href='../suratkeluar.php'</script>";
            }
        }
    }
}
