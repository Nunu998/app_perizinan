<?php
session_start();
include '../koneksi.php';
if ($_GET['act'] == 'tambah') {
    $nale = $_POST['nale'];
    $nosu = $_POST['nosu'];
    $tg = $_POST['tg'];
    $per = $_POST['per'];
    $al = $_POST['al'];
    $nape = $_POST['nape'];
    $nip = $_POST['nip'];
    $nk = $_POST['nk'];
    $kk = $_POST['kk'];
    $bd = $_POST['bd'];
    $au = $_POST['au'];
    $ds = $_POST['ds'];
    $kec = $_POST['kec'];
    $kab = $_POST['kab'];
    $prov = $_POST['prov'];
    $ket = $_POST['ket'];
    $kon = $_POST['kon'];


    if ($nale != "" || $nosu != "" || $tg != "" || $per != "" || $al != "" || $nape != "" || $nip != "" || $nk != "" || $kk != "" || $bd != "" || $au != "" || $ds != "" || $kec != "" || $kab != "" || $prov != "" || $ket != ""|| $kon != "") {

        $cek_nomor = mysqli_num_rows(mysqli_query($db, "SELECT * FROM tb_telahaan WHERE nomor_surat='" . $_POST['nosu'] . "'"));
        if ($cek_nomor) {
            $_SESSION['info'] = 'Nomor Surat';
            echo "<script>document.location.href='../pengajuan.php'</script>";
        } else {

            if ($_FILES['fileth']['name'] == '') {
                $insert = mysqli_query($db, "INSERT INTO tb_telahaan VALUES (NULL, '$nale', '$nosu', '$tg', '$per', '$al', '$nape', '$nip','$nk','$kk','$bd','$au','$ds','$kec','$kab','$prov','TIDAK ADA FILE', '$ket', '$kon')");
                if ($insert) {
                    $_SESSION['info'] = 'Disimpan';
                    echo "<script>document.location.href='../pengajuan.php'</script>";
                }
            } else {
                $rand = rand();
                $ekstensi =  array('png', 'jpg', 'jpeg', 'pdf');
                $filename = $_FILES['fileth']['name'];
                $ukuran = $_FILES['fileth']['size'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);

                if (!in_array($ext, $ekstensi)) {
                    $_SESSION['info'] = 'Gagal Disimpan';
                    echo "<script>document.location.href='../pengajuan.php'</script>";
                } else {
                    if ($ukuran < 5044070) { //5Mb		
                        $xx = $rand . '_' . $filename;
                        move_uploaded_file($_FILES['fileth']['tmp_name'], '../file/telahaan/' . $rand . '_' . $filename);
                        $insert = mysqli_query($db, "INSERT INTO tb_telahaan VALUES (NULL, '$nale', '$nosu', '$tg', '$per', '$al', '$nape', '$nip','$nk','$kk','$bd','$au','$ds','$kec','$kab','$prov',  '$xx', '$ket', '$kon')");
                        if ($insert) {
                            $_SESSION['info'] = 'Disimpan';
                            echo "<script>document.location.href='../pengajuan.php'</script>";
                        } else {
                            $_SESSION['info'] = 'Gagal Disimpan';
                            echo "<script>document.location.href='../pengajuan.php'</script>";
                        }
                    }
                }
            }
        }
    }
} elseif ($_GET['act'] == 'hapus') {
    $id = $_GET['id'];

    $sqlc = mysqli_query($db, "SELECT * FROM tb_telahaan WHERE id_telahaan ='$id'");
    $b = mysqli_fetch_array($sqlc);
    if ($b['file_telahaan'] == "TIDAK ADA FILE") {
        $queryhapus = mysqli_query($db, "DELETE FROM tb_telahaan WHERE id_telahaan = '$id'");
        if ($queryhapus) {
            $_SESSION['info'] = 'Dihapus';
            echo "<script>document.location.href='../pengajuan.php'</script>";
        }
    } else {
             //query hapus
        $queryhapus = mysqli_query($db, "DELETE FROM tb_telahaan WHERE id_telahaan = '$id'");
        if ($queryhapus) {
            $_SESSION['info'] = 'Dihapus';
            echo "<script>document.location.href='../pengajuan.php'</script>";
        } else {
            $_SESSION['info'] = 'Gagal Dihapus';
            echo "<script>document.location.href='../pengajuan.php'</script>";
        }
    }
    mysqli_close($db);
} elseif ($_GET['act'] == 'edit') {
    $id = $_POST['id'];
    $nale = $_POST['nale'];
    $nosu = $_POST['nosu'];
    $tg = $_POST['tg'];
    $per = $_POST['per'];
    $al = $_POST['al'];
    $nape = $_POST['nape'];
    $nip = $_POST['nip'];
    $nb = $_POST['nb'];
    $kk = $_POST['kk'];
    $bd = $_POST['bd'];
    $au = $_POST['au'];
    $de = $_POST['de'];
    $kec = $_POST['kec'];
    $kab = $_POST['kab'];
    $prov = $_POST['prov'];
    $filelama = $_POST['filelama'];
    $ket = $_POST['ket'];
    $kon = $_POST['kon'];

    if ($_FILES['fileth']['name'] == '') {
        $insert = mysqli_query($db, "UPDATE tb_telahaan SET nama_lengkap='$nale', nomor_surat='$nosu', tanggal='$tg', perihal='$per', alamat='$al', nama_pengusaha='$nape', no_induk='$nip', nama_kbli='$nb', kode_kbli='$kk', bidang='$bd', alamat_usaha='$au', desa='$de', kecamatan='$kec', kabupaten='$kab', provinsi='$prov', file_telahaan='$filelama', keterangan='$ket', konfirmasi='$kon' WHERE id_telahaan='$id'");
        if ($insert) {
            $_SESSION['info'] = 'Edit';
            echo "<script>document.location.href='../telahaan.php'</script>";
        }
    } else {
        $rand = rand();
        $ekstensi =  array('png', 'jpg', 'jpeg', 'pdf');
        $filename = $_FILES['fileth']['name'];
        $ukuran = $_FILES['fileth']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if (!in_array($ext, $ekstensi)) {
            $_SESSION['info'] = 'Gagal Disimpan';
            echo "<script>document.location.href='../telahaan.php'</script>";
        } else {
            if ($ukuran < 5044070) { //5Mb	
                $sqlc = mysqli_query($db, "SELECT * FROM tb_telahaan WHERE id_telahaan ='$id'");
                $b = mysqli_fetch_array($sqlc);
                if ($b['file_telahaan'] == 'TIDAK ADA FILE') {
                    $xx = $rand . '_' . $filename;
                    move_uploaded_file($_FILES['fileth']['tmp_name'], '../file/telahaan/' . $rand . '_' . $filename);
                    $insert1 = mysqli_query($db, "UPDATE tb_telahaan SET nama_lengkap='$nale', nomor_surat='$nosu', tanggal='$tg', perihal='$per', alamat='$al', dibangun='$dbg', luas_tanah='$lt', file_telahaan='$xx',keterangan='$ket', konfirmasi='$kon' WHERE id_telahaan='$id'");
                    if ($insert1) {
                        $_SESSION['info'] = 'Disimpan';
                        echo "<script>document.location.href='../telahaan.php'</script>";
                    } else {
                        $_SESSION['info'] = 'Gagal Disimpan';
                        echo "<script>document.location.href='../telahaan.php'</script>";
                    }
                } else {
                    unlink("../file/telahaan/$b[file_telahaan]");
                    $xx = $rand . '_' . $filename;
                    move_uploaded_file($_FILES['fileth']['tmp_name'], '../file/telahaan/' . $rand . '_' . $filename);
                    $insert2 =  mysqli_query($db, "UPDATE tb_telahaan SET nama_lengkap='$nale', nomor_surat='$nosu', tanggal='$tg', perihal='$per', alamat='$al', dibangun='$dbg', luas_tanah='$lt', file_telahaan='$xx',keterangan='$ket', konfirmasi='$kon'  WHERE id_telahaan='$id'");
                    if ($insert2) {
                        $_SESSION['info'] = 'Disimpan';
                        echo "<script>document.location.href='../telahaan.php'</script>";
                    } else {
                        $_SESSION['info'] = 'Gagal Disimpan';
                        echo "<script>document.location.href='../telahaan.php'</script>";
                    }
                }
            } else {
                $_SESSION['info'] = 'Gagal Disimpan';
                echo "<script>document.location.href='../telahaan.php'</script>";
            }
        }
    }
}
