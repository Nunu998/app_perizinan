<?php
include '../config.php';
if ($_GET['act'] == 'edit') {
    $nama = $_POST['namains'];
    $institusi = $_POST['yayasan'];
    $status = $_POST['status'];
    $alamat = $_POST['alamat'];
    $kepala = $_POST['namakep'];
    $nip = $_POST['nip'];
    $email = $_POST['email'];
    $notelp = $_POST['notelp'];
    $logolama = $_POST['logolama'];

    if ($_FILES['logo']['name'] == '') {
        mysqli_query($db, "UPDATE tb_instansi SET nama='$nama', institusi='$institusi', status='$status', alamat='$alamat', kepala='$kepala', nip='$nip', email='$email', notelp='$notelp', logo='$logolama' WHERE id_instansi = '1'");
        $_SESSION['info'] = 'Disimpan';
        echo "<script>document.location.href='../instansi.php'</script>";
    } else {
        $ekstensi =  array('png', 'jpg', 'jpeg');
        $filename = $_FILES['logo']['name'];
        $ukuran = $_FILES['logo']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if (!in_array($ext, $ekstensi)) {
            echo "<script language='javascript'>alert('Ekstensi File tidak diperbolehkan'); document.location.href='../instansi.php';</script>" . mysqli_error($db);
        } else {
            if ($ukuran < 4044070) { //4Mb		
                $xx = $filename;
                $sqlc = mysqli_query($db, "SELECT * FROM tb_instansi WHERE id_instansi ='1'");
                $b = mysqli_fetch_array($sqlc);
                move_uploaded_file($_FILES['logo']['tmp_name'], '../assets/logo/' . $filename);
                unlink("../assets/logo/$b[logo]");
                mysqli_query($db, "UPDATE tb_instansi SET nama='$nama', institusi='$institusi', status='$status', alamat='$alamat', kepala='$kepala', nip='$nip', email='$email', logo='$xx' WHERE id_instansi = '1'");


                $_SESSION['info'] = 'Disimpan';
                echo "<script>document.location.href='../instansi.php'</script>";
            } else {
                echo "<script language='javascript'>alert('Ukuran File terlalu besar'); document.location.href='../instansi.php';</script>" . mysqli_error($db);
            }
        }
    }
}
