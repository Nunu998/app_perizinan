<?php
session_start();
include '../koneksi.php';
if ($_GET['act'] == 'tambah') {
    $nape = $_POST['nape'];
    $no = $_POST['no'];
    $ta = $_POST['ta'];


    if ($nape != "" || $no != "" || $ta != "") {

        $cek_nomor = mysqli_num_rows(mysqli_query($db, "SELECT * FROM tb_perda WHERE nomor='$_POST[no]'"));
        if ($cek_nomor) {
            $_SESSION['info'] = 'Nomor Berkas';
            echo "<script>document.location.href='../perda.php'</script>";
        } else {

            if ($_FILES['filepd']['name'] == '') {
                $insert = mysqli_query($db, "INSERT INTO tb_perda VALUES (NULL, '$nape', '$no', '$ta', 'TIDAK ADA FILE')");
                if ($insert) {
                    $_SESSION['info'] = 'Disimpan';
                    echo "<script>document.location.href='../perda.php'</script>";
                }
            } else {
                $rand = rand();
                $ekstensi =  array('png', 'jpg', 'jpeg', 'pdf');
                $filename = $_FILES['filepd']['name'];
                $ukuran = $_FILES['filepd']['size'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);

                if (!in_array($ext, $ekstensi)) {
                    $_SESSION['info'] = 'Gagal Disimpan';
                    echo "<script>document.location.href='../perda.php'</script>";
                } else {
                    if ($ukuran < 5044070) { //5Mb		
                        $xx = $rand . '_' . $filename;
                        move_uploaded_file($_FILES['filepd']['tmp_name'], '../file/perda/' . $rand . '_' . $filename);
                        $insert = mysqli_query($db, "INSERT INTO tb_perda VALUES (NULL, '$nape', '$no', '$ta','$xx')");
                        if ($insert) {
                            $_SESSION['info'] = 'Disimpan';
                            echo "<script>document.location.href='../perda.php'</script>";
                        } else {
                            $_SESSION['info'] = 'Gagal Disimpan';
                            echo "<script>document.location.href='../perda.php'</script>";
                        }
                    }
                }
            }
        }
    }
} elseif ($_GET['act'] == 'hapus') {
    $id = $_GET['id'];


    $sqlc = mysqli_query($db, "SELECT * FROM tb_perda WHERE id_perda ='$id'");
    $b = mysqli_fetch_array($sqlc);
    if ($b['file_perda'] == "TIDAK ADA FILE") {
        $queryhapus = mysqli_query($db, "DELETE FROM tb_perda WHERE id_perda = '$id'");
        if ($queryhapus) {
            $_SESSION['info'] = 'Dihapus';
            echo "<script>document.location.href='../perda.php'</script>";
        }
    } else {
        unlink("../file/perda/$b[file_perda]");
        //query hapus
        $queryhapus = mysqli_query($db, "DELETE FROM tb_perda WHERE id_perda = '$id'");
        if ($queryhapus) {
            $_SESSION['info'] = 'Dihapus';
            echo "<script>document.location.href='../perda.php'</script>";
        } else {
            $_SESSION['info'] = 'Gagal Dihapus';
            echo "<script>document.location.href='../perda.php'</script>";
        }
    }
    mysqli_close($db);
} elseif ($_GET['act'] == 'edit') {
    $id = $_POST['id'];
    $nape = $_POST['nape'];
    $no = $_POST['no'];
    $ta = $_POST['ta'];
    $filelama = $_POST['filelama'];

    if ($_FILES['filepd']['name'] == '') {
        $insert = mysqli_query($db, "UPDATE tb_perda SET nama_perda='$nape', nomor='$no', tahun='$ta', file_perda='$filelama' WHERE id_perda='$id'");
        if ($insert) {
            $_SESSION['info'] = 'Edit';
            echo "<script>document.location.href='../perda.php'</script>";
        }
    } else {
        $rand = rand();
        $ekstensi =  array('png', 'jpg', 'jpeg', 'pdf');
        $filename = $_FILES['filepd']['name'];
        $ukuran = $_FILES['filepd']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if (!in_array($ext, $ekstensi)) {
            $_SESSION['info'] = 'Gagal Disimpan';
            echo "<script>document.location.href='../perda.php'</script>";
        } else {
            if ($ukuran < 5044070) { //5Mb	
                $sqlc = mysqli_query($db, "SELECT * FROM tb_perda WHERE id_perda ='$id'");
                $b = mysqli_fetch_array($sqlc);
                if ($b['file_perda'] == 'TIDAK ADA FILE') {
                    $xx = $rand . '_' . $filename;
                    move_uploaded_file($_FILES['filepd']['tmp_name'], '../file/perda/' . $rand . '_' . $filename);
                    $insert1 = mysqli_query($db, "UPDATE tb_perda SET nama_perda='$nape', nomor='$no', tahun='$ta', file_perda='$xx' WHERE id_perda='$id'");
                    if ($insert1) {
                        $_SESSION['info'] = 'Disimpan';
                        echo "<script>document.location.href='../perda.php'</script>";
                    } else {
                        $_SESSION['info'] = 'Gagal Disimpan';
                        echo "<script>document.location.href='../perda.php'</script>";
                    }
                } else {
                    unlink("../file/perda/$b[file_perda]");
                    $xx = $rand . '_' . $filename;
                    move_uploaded_file($_FILES['filepd']['tmp_name'], '../file/perda/' . $rand . '_' . $filename);
                    $insert2 =  mysqli_query($db, "UPDATE tb_perda SET nama_perda='$nape', nomor='$no', tahun='$ta', file_perda='$xx' WHERE id_perda='$id'");
                    if ($insert2) {
                        $_SESSION['info'] = 'Disimpan';
                        echo "<script>document.location.href='../perda.php'</script>";
                    } else {
                        $_SESSION['info'] = 'Gagal Disimpan';
                        echo "<script>document.location.href='../perda.php'</script>";
                    }
                }
            } else {
                $_SESSION['info'] = 'Gagal Disimpan';
                echo "<script>document.location.href='../perda.php'</script>";
            }
        }
    }
}
