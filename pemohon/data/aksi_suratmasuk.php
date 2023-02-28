<?php
session_start();
include '../koneksi.php';
if ($_GET['act'] == 'tambah') {
    $no = $_POST['nosm'];
    $noag = $_POST['noag'];
    $asal = $_POST['asal'];
    $isi = $_POST['isi'];
    $tglsm = $_POST['tglsm'];
    $tgld = $_POST['tglsmd'];
    $ket = $_POST['ket'];

    if ($no != "" || $noag != "" || $asal != "" || $isi != "" || $tglsm != "" || $tgld != "" || $ket != "") {

        $cek_nomor = mysqli_num_rows(mysqli_query($db, "SELECT * FROM tb_suratmasuk WHERE no_suratmasuk='$_POST[nosm]'"));
        if ($cek_nomor) {
            $_SESSION['info'] = 'Nomor Berkas';
            echo "<script>document.location.href='../suratmasuk.php'</script>";
        } else {

            if ($_FILES['filesm']['name'] == '') {
                $insert = mysqli_query($db, "INSERT INTO tb_suratmasuk VALUES (NULL, '$no', '$noag', '$asal', '$isi', '$tglsm', '$tgld', 'TIDAK ADA FILE', '$ket')");
                if ($insert) {
                    $_SESSION['info'] = 'Disimpan';
                    echo "<script>document.location.href='../suratmasuk.php'</script>";
                }
            } else {
                $rand = rand();
                $ekstensi =  array('png', 'jpg', 'jpeg', 'pdf');
                $filename = $_FILES['filesm']['name'];
                $ukuran = $_FILES['filesm']['size'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);

                if (!in_array($ext, $ekstensi)) {
                    $_SESSION['info'] = 'Gagal Disimpan';
                    echo "<script>document.location.href='../suratmasuk.php'</script>";
                } else {
                    if ($ukuran < 5044070) { //5Mb		
                        $xx = $rand . '_' . $filename;
                        move_uploaded_file($_FILES['filesm']['tmp_name'], '../file/suratmasuk/' . $rand . '_' . $filename);
                        $insert = mysqli_query($db, "INSERT INTO tb_suratmasuk VALUES (NULL, '$no', '$noag', '$asal', '$isi', '$tglsm', '$tgld', '$xx', '$ket')");
                        if ($insert) {
                            $_SESSION['info'] = 'Disimpan';
                            echo "<script>document.location.href='../suratmasuk.php'</script>";
                        } else {
                            $_SESSION['info'] = 'Gagal Disimpan';
                            echo "<script>document.location.href='../suratmasuk.php'</script>";
                        }
                    }
                }
            }
        }
    }
} elseif ($_GET['act'] == 'hapus') {
    $id = $_GET['id'];


    $sqlc = mysqli_query($db, "SELECT * FROM tb_suratmasuk WHERE id_suratmasuk ='$id'");
    $b = mysqli_fetch_array($sqlc);
    if ($b['file_suratmasuk'] == "TIDAK ADA FILE") {
        $queryhapus = mysqli_query($db, "DELETE FROM tb_suratmasuk WHERE id_suratmasuk = '$id'");
        if ($queryhapus) {
            $_SESSION['info'] = 'Dihapus';
            echo "<script>document.location.href='../suratmasuk.php'</script>";
        }
    } else {
        unlink("../file/suratmasuk/$b[file_suratmasuk]");
        //query hapus
        $queryhapus = mysqli_query($db, "DELETE FROM tb_suratmasuk WHERE id_suratmasuk = '$id'");
        if ($queryhapus) {
            $_SESSION['info'] = 'Dihapus';
            echo "<script>document.location.href='../suratmasuk.php'</script>";
        } else {
            $_SESSION['info'] = 'Gagal Dihapus';
            echo "<script>document.location.href='../suratmasuk.php'</script>";
        }
    }
    mysqli_close($db);
} elseif ($_GET['act'] == 'edit') {
    $id = $_POST['id'];
    $no = $_POST['nosm'];
    $noag = $_POST['noag'];
    $asal = $_POST['asal'];
    $isi = $_POST['isi'];
    $tglsm = $_POST['tglsm'];
    $tgld = $_POST['tglsmd'];
    $ket = $_POST['ket'];
    $filelama = $_POST['filelama'];

    if ($_FILES['filesm']['name'] == '') {
        $insert = mysqli_query($db, "UPDATE tb_suratmasuk SET no_suratmasuk='$no', no_agenda='$noag', asal_surat='$asal', isi_surat='$isi', tgl_surat='$tglsm', tanggal='$tgld', ket_suratmasuk='$ket', file_suratmasuk='$filelama' WHERE id_suratmasuk='$id'");
        if ($insert) {
            $_SESSION['info'] = 'Edit';
            echo "<script>document.location.href='../suratmasuk.php'</script>";
        }
    } else {
        $rand = rand();
        $ekstensi =  array('png', 'jpg', 'jpeg', 'pdf');
        $filename = $_FILES['filesm']['name'];
        $ukuran = $_FILES['filesm']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if (!in_array($ext, $ekstensi)) {
            $_SESSION['info'] = 'Gagal Disimpan';
            echo "<script>document.location.href='../suratmasuk.php'</script>";
        } else {
            if ($ukuran < 5044070) { //5Mb	
                $sqlc = mysqli_query($db, "SELECT * FROM tb_suratmasuk WHERE id_suratmasuk ='$id'");
                $b = mysqli_fetch_array($sqlc);
                if ($b['file_suratmasuk'] == 'TIDAK ADA FILE') {
                    $xx = $rand . '_' . $filename;
                    move_uploaded_file($_FILES['filesm']['tmp_name'], '../file/suratmasuk/' . $rand . '_' . $filename);
                    $insert1 = mysqli_query($db, "UPDATE tb_suratmasuk SET no_suratmasuk='$no', no_agenda='$noag', asal_surat='$asal', isi_surat='$isi', tgl_surat='$tglsm', tanggal='$tgld', ket_suratmasuk='$ket', file_suratmasuk='$xx' WHERE id_suratmasuk='$id'");
                    if ($insert1) {
                        $_SESSION['info'] = 'Disimpan';
                        echo "<script>document.location.href='../suratmasuk.php'</script>";
                    } else {
                        $_SESSION['info'] = 'Gagal Disimpan';
                        echo "<script>document.location.href='../suratmasuk.php'</script>";
                    }
                } else {
                    unlink("../file/suratmasuk/$b[file_suratmasuk]");
                    $xx = $rand . '_' . $filename;
                    move_uploaded_file($_FILES['filesm']['tmp_name'], '../file/suratmasuk/' . $rand . '_' . $filename);
                    $insert2 =  mysqli_query($db, "UPDATE tb_suratmasuk SET no_suratmasuk='$no', no_agenda='$noag', asal_surat='$asal',  isi_surat='$isi', tgl_surat='$tglsm', tanggal='$tgld', ket_suratmasuk='$ket', file_suratmasuk='$xx' WHERE id_suratmasuk='$id'");
                    if ($insert2) {
                        $_SESSION['info'] = 'Disimpan';
                        echo "<script>document.location.href='../suratmasuk.php'</script>";
                    } else {
                        $_SESSION['info'] = 'Gagal Disimpan';
                        echo "<script>document.location.href='../suratmasuk.php'</script>";
                    }
                }
            } else {
                $_SESSION['info'] = 'Gagal Disimpan';
                echo "<script>document.location.href='../suratmasuk.php'</script>";
            }
        }
    }
}
