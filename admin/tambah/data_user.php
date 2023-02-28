<?php
session_start();
include '../../koneksi/koneksi.php';


if (isset($_POST['insert'])) {
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $nama = $_POST['nama_lengkap'];
    $user = $_POST['username'];
    $pass = md5($_POST['password']);
    $email = $_POST['email'];
    $level = $_POST['level'];
    $no_hp = $_POST['no_hp'];
    $status = $_POST['status'];



    if ($nama != "" || $user != "" || $pass != "" || $email != "" || $no_hp != "" || $nama_depan != "" || $nama_belakang != "" || $email != "" || $status != "") {


        $cek_user = mysqli_num_rows(mysqli_query($db, "SELECT * FROM t_user WHERE username='$_POST[username]'"));
        if ($cek_user) {
            $_SESSION['info'] = 'Username';
            echo "<script>document.location.href='../user.php'</script>";
        } else {
            $cek_user = mysqli_num_rows(mysqli_query($db, "SELECT * FROM t_user WHERE email='$_POST[email]'"));
            if ($cek_user) {
                $_SESSION['info'] = 'Email';
                echo "<script>document.location.href='../user.php'</script>";
            } else {
                //query tambah
                $insert =  mysqli_query($db, "INSERT INTO t_user VALUES('', '$nama_depan', '$nama_belakang', '$nama','$user' , '$pass' , '$email','$level','$no_hp','$status')");

                if ($insert) {
                    $_SESSION['info'] = 'Disimpan';
                    echo "<script>document.location.href='../user.php'</script>";
                } else {
                    $_SESSION['info'] = 'Gagal Disimpan';
                    echo "<script>document.location.href='../user.php'</script>";
                }
            }
        }
    }
}
