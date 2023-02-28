<?php
session_start();
include '../koneksi.php';
if ($_GET['act'] == 'tambah') {
    $nape = $_POST['nape'];
    $kec = $_POST['kec'];
    $kel = $_POST['kel'];
    $nosr = $_POST['nosr'];
    $tm = $_POST['tm'];
    $note = $_POST['note'];
    $tag = $_POST['tag'];
    $dib = $_POST['dib'];
    $luta = $_POST['luta'];
    $dabe = $_POST['dabe'];
    $kaw = $_POST['kaw'];
    $ttk1 = $_POST['ttk1'];
    $ttk2 = $_POST['ttk2'];

    if ($nape != "" || $kec != "" || $kel != "" || $nosr != "" || $tm != "" || $note != "" || $tag != "" || $dib != "" || $luta != "" || $dabe != "" || $kaw != "" || $ttk1 != "" || $ttk2 != "") {

        $cek_nomor = mysqli_num_rows(mysqli_query($db, "SELECT * FROM tb_daftar WHERE nomor_telahaan='$_POST[note]'"));
        if ($cek_nomor) {
            $_SESSION['info'] = 'Nomor Telahaan';
            echo "<script>document.location.href='../daftar.php'</script>";
        } else {

            if ($_FILES['filete']['name'] == '') {
                $insert = mysqli_query($db, "INSERT INTO tb_daftar VALUES (NULL, '$nape', '$kec', '$kel', '$nosr', '$tm', '$note', '$tag', '$dib', '$luta', '$dabe', '$kaw', '$ttk1', '$ttk2', 'TIDAK ADA FILE')");
                if ($insert) {
                    $_SESSION['info'] = 'Disimpan';
                    echo "<script>document.location.href='../daftar.php'</script>";
                }
            } else {
                $rand = rand();
                $ekstensi =  array('png', 'jpg', 'jpeg', 'pdf');
                $filename = $_FILES['filete']['name'];
                $ukuran = $_FILES['filete']['size'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);

                if (!in_array($ext, $ekstensi)) {
                    $_SESSION['info'] = 'Gagal Disimpan';
                    echo "<script>document.location.href='../daftar.php'</script>";
                } else {
                    if ($ukuran < 5044070) { //5Mb		
                        $xx = $rand . '_' . $filename;
                        move_uploaded_file($_FILES['filete']['tmp_name'], '../file/daftar/' . $rand . '_' . $filename);
                        $insert = mysqli_query($db, "INSERT INTO tb_daftar VALUES (NULL, '$nape', '$kec', '$kel', '$nosr', '$tm', '$note', '$tag', '$dib', '$luta', '$dabe', '$kaw', '$ttk1', '$ttk2', '$xx')");
                        if ($insert) {
                            $_SESSION['info'] = 'Disimpan';
                            echo "<script>document.location.href='../daftar.php'</script>";
                        } else {
                            $_SESSION['info'] = 'Gagal Disimpan';
                            echo "<script>document.location.href='../daftar.php'</script>";
                        }
                    }
                }
            }
        }
    }
} elseif ($_GET['act'] == 'hapus') {
    $id = $_GET['id'];


    $sqlc = mysqli_query($db, "SELECT * FROM tb_daftar WHERE id_daftar ='$id'");
    $b = mysqli_fetch_array($sqlc);
    if ($b['file_telahaan'] == "TIDAK ADA FILE") {
        $queryhapus = mysqli_query($db, "DELETE FROM tb_daftar WHERE id_daftar = '$id'");
        if ($queryhapus) {
            $_SESSION['info'] = 'Dihapus';
            echo "<script>document.location.href='../daftar.php'</script>";
        }
    } else {
        unlink("../file/daftar/$b[file_telahaan]");
        //query hapus
        $queryhapus = mysqli_query($db, "DELETE FROM tb_daftar WHERE id_daftar = '$id'");
        if ($queryhapus) {
            $_SESSION['info'] = 'Dihapus';
            echo "<script>document.location.href='../daftar.php'</script>";
        } else {
            $_SESSION['info'] = 'Gagal Dihapus';
            echo "<script>document.location.href='../daftar.php'</script>";
        }
    }
    mysqli_close($db);
} elseif ($_GET['act'] == 'edit') {
    $id = $_POST['id'];
    $nape = $_POST['nape'];
    $kec = $_POST['kec'];
    $kel = $_POST['kel'];
    $nosr = $_POST['nosr'];
    $tm = $_POST['tm'];
    $note = $_POST['note'];
    $tag = $_POST['tag'];
    $dib = $_POST['dib'];
    $luta = $_POST['luta'];
    $dabe = $_POST['dabe'];
    $kaw = $_POST['kaw'];
    $ttk1 = $_POST['ttk1'];
    $ttk2 = $_POST['ttk2'];
    $filelama = $_POST['filelama'];

    if ($_FILES['filete']['name'] == '') {
        $insert = mysqli_query($db, "UPDATE tb_daftar SET nama_permohonan='$nape', kecamatan='$kec', kelurahan='$kel', nomor_surat='$nosr', tanggal_masuk='$tm', nomor_telahaan='$note', tanggal='$tag',dibangun='$dib',luas_tanah='$luta',dalam_bentuk='$dabe',kawasan='$kaw',titik1='$ttk1',titik2='$ttk2', file_telahaan='$filelama' WHERE id_daftar='$id'");
        if ($insert) {
            $_SESSION['info'] = 'Edit';
            echo "<script>document.location.href='../daftar.php'</script>";
        }
    } else {
        $rand = rand();
        $ekstensi =  array('png', 'jpg', 'jpeg', 'pdf');
        $filename = $_FILES['filete']['name'];
        $ukuran = $_FILES['filete']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if (!in_array($ext, $ekstensi)) {
            $_SESSION['info'] = 'Gagal Disimpan';
            echo "<script>document.location.href='../daftar.php'</script>";
        } else {
            if ($ukuran < 5044070) { //5Mb	
                $sqlc = mysqli_query($db, "SELECT * FROM tb_daftar WHERE id_daftar ='$id'");
                $b = mysqli_fetch_array($sqlc);
                if ($b['file_telahaan'] == 'TIDAK ADA FILE') {
                    $xx = $rand . '_' . $filename;
                    move_uploaded_file($_FILES['filete']['tmp_name'], '../file/daftar/' . $rand . '_' . $filename);
                    $insert1 = mysqli_query($db, "UPDATE tb_daftar SET nama_permohonan='$nape', kecamatan='$kec', kelurahan='$kel', nomor_surat='$nosr', tanggal_masuk='$tm', nomor_telahaan='$note', tanggal='$tag',dibangun='$dib',luas_tanah='$luta',dalam_bentuk='$dabe',kawasan='$kaw',titik1='$ttk1',titik2='$ttk2', file_telahaan='$xx' WHERE id_daftar='$id'");
                    if ($insert1) {
                        $_SESSION['info'] = 'Disimpan';
                        echo "<script>document.location.href='../daftar.php'</script>";
                    } else {
                        $_SESSION['info'] = 'Gagal Disimpan';
                        echo "<script>document.location.href='../daftar.php'</script>";
                    }
                } else {
                    unlink("../file/daftar/$b[file_telahaan]");
                    $xx = $rand . '_' . $filename;
                    move_uploaded_file($_FILES['filete']['tmp_name'], '../file/daftar/' . $rand . '_' . $filename);
                    $insert2 =  mysqli_query($db, "UPDATE tb_daftar SET nama_permohonan='$nape', kecamatan='$kec', kelurahan='$kel', nomor_surat='$nosr', tanggal_masuk='$tm', nomor_telahaan='$note', tanggal='$tag',dibangun='$dib',luas_tanah='$luta',dalam_bentuk='$dabe',kawasan='$kaw',titik1='$ttk1',titik2='$ttk2', file_telahaan='$xx' WHERE id_daftar='$id'");
                    if ($insert2) {
                        $_SESSION['info'] = 'Disimpan';
                        echo "<script>document.location.href='../daftar.php'</script>";
                    } else {
                        $_SESSION['info'] = 'Gagal Disimpan';
                        echo "<script>document.location.href='../daftar.php'</script>";
                    }
                }
            } else {
                $_SESSION['info'] = 'Gagal Disimpan';
                echo "<script>document.location.href='../daftar.php'</script>";
            }
        }
    }
}
