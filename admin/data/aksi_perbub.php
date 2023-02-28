<?php
session_start();
include '../koneksi.php';
if ($_GET['act'] == 'tambah') {
    $nape = $_POST['nape'];
    $no = $_POST['no'];
    $ta = $_POST['ta'];


    if ($nape != "" || $no != "" || $ta != "") {

        $cek_nomor = mysqli_num_rows(mysqli_query($db, "SELECT * FROM tb_perbub WHERE nomor='$_POST[no]'"));
        if ($cek_nomor) {
            $_SESSION['info'] = 'Nomor Berkas';
            echo "<script>document.location.href='../perbub.php'</script>";
        } else {

            if ($_FILES['filepb']['name'] == '') {
                $insert = mysqli_query($db, "INSERT INTO tb_perbub VALUES (NULL, '$nape', '$no', '$ta', 'TIDAK ADA FILE')");
                if ($insert) {
                    $_SESSION['info'] = 'Disimpan';
                    echo "<script>document.location.href='../perbub.php'</script>";
                }
            } else {
                $rand = rand();
                $ekstensi =  array('png', 'jpg', 'jpeg', 'pdf');
                $filename = $_FILES['filepb']['name'];
                $ukuran = $_FILES['filepb']['size'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);

                if (!in_array($ext, $ekstensi)) {
                    $_SESSION['info'] = 'Gagal Disimpan';
                    echo "<script>document.location.href='../perbub.php'</script>";
                } else {
                    if ($ukuran < 5044070) { //5Mb		
                        $xx = $rand . '_' . $filename;
                        move_uploaded_file($_FILES['filepb']['tmp_name'], '../file/perbub/' . $rand . '_' . $filename);
                        $insert = mysqli_query($db, "INSERT INTO tb_perbub VALUES (NULL, '$nape', '$no', '$ta','$xx')");
                        if ($insert) {
                            $_SESSION['info'] = 'Disimpan';
                            echo "<script>document.location.href='../perbub.php'</script>";
                        } else {
                            $_SESSION['info'] = 'Gagal Disimpan';
                            echo "<script>document.location.href='../perbub.php'</script>";
                        }
                    }
                }
            }
        }
    }
} elseif ($_GET['act'] == 'hapus') {
    $id = $_GET['id'];


    $sqlc = mysqli_query($db, "SELECT * FROM tb_perbub WHERE id_perbub ='$id'");
    $b = mysqli_fetch_array($sqlc);
    if ($b['file_perbub'] == "TIDAK ADA FILE") {
        $queryhapus = mysqli_query($db, "DELETE FROM tb_perbub WHERE id_perbub = '$id'");
        if ($queryhapus) {
            $_SESSION['info'] = 'Dihapus';
            echo "<script>document.location.href='../perbub.php'</script>";
        }
    } else {
        unlink("../file/perbub/$b[file_perbub]");
        //query hapus
        $queryhapus = mysqli_query($db, "DELETE FROM tb_perbub WHERE id_perbub = '$id'");
        if ($queryhapus) {
            $_SESSION['info'] = 'Dihapus';
            echo "<script>document.location.href='../perbub.php'</script>";
        } else {
            $_SESSION['info'] = 'Gagal Dihapus';
            echo "<script>document.location.href='../perbub.php'</script>";
        }
    }
    mysqli_close($db);
} elseif ($_GET['act'] == 'edit') {
    $id = $_POST['id'];
    $nape = $_POST['nape'];
    $no = $_POST['no'];
    $ta = $_POST['ta'];
    $filelama = $_POST['filelama'];

    if ($_FILES['filepb']['name'] == '') {
        $insert = mysqli_query($db, "UPDATE tb_perbub SET nama_perbub='$nape', nomor='$no', tahun='$ta', file_perbub='$filelama' WHERE id_perbub='$id'");
        if ($insert) {
            $_SESSION['info'] = 'Edit';
            echo "<script>document.location.href='../perbub.php'</script>";
        }
    } else {
        $rand = rand();
        $ekstensi =  array('png', 'jpg', 'jpeg', 'pdf');
        $filename = $_FILES['filepb']['name'];
        $ukuran = $_FILES['filepb']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if (!in_array($ext, $ekstensi)) {
            $_SESSION['info'] = 'Gagal Disimpan';
            echo "<script>document.location.href='../perbub.php'</script>";
        } else {
            if ($ukuran < 5044070) { //5Mb	
                $sqlc = mysqli_query($db, "SELECT * FROM tb_perbub WHERE id_perbub ='$id'");
                $b = mysqli_fetch_array($sqlc);
                if ($b['file_perbub'] == 'TIDAK ADA FILE') {
                    $xx = $rand . '_' . $filename;
                    move_uploaded_file($_FILES['filepb']['tmp_name'], '../file/perbub/' . $rand . '_' . $filename);
                    $insert1 = mysqli_query($db, "UPDATE tb_perbub SET nama_perbub='$nape', nomor='$no', tahun='$ta', file_perbub='$xx' WHERE id_perbub='$id'");
                    if ($insert1) {
                        $_SESSION['info'] = 'Disimpan';
                        echo "<script>document.location.href='../perbub.php'</script>";
                    } else {
                        $_SESSION['info'] = 'Gagal Disimpan';
                        echo "<script>document.location.href='../perbub.php'</script>";
                    }
                } else {
                    unlink("../file/perbub/$b[file_perbub]");
                    $xx = $rand . '_' . $filename;
                    move_uploaded_file($_FILES['filepb']['tmp_name'], '../file/perbub/' . $rand . '_' . $filename);
                    $insert2 =  mysqli_query($db, "UPDATE tb_perbub SET nama_perbub='$nape', nomor='$no', tahun='$ta', file_perbub='$xx' WHERE id_perbub='$id'");
                    if ($insert2) {
                        $_SESSION['info'] = 'Disimpan';
                        echo "<script>document.location.href='../perbub.php'</script>";
                    } else {
                        $_SESSION['info'] = 'Gagal Disimpan';
                        echo "<script>document.location.href='../perbub.php'</script>";
                    }
                }
            } else {
                $_SESSION['info'] = 'Gagal Disimpan';
                echo "<script>document.location.href='../perbub.php'</script>";
            }
        }
    }
}
