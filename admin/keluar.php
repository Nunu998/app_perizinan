<?php
session_start();
session_destroy();
$_SESSION['info'] = 'Keluar';
echo "<script>document.location.href='../index.php'</script>";
?>
<div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                            echo $_SESSION['info'];
                                        }
                                        unset($_SESSION['info']); ?>"></div>
<script>
    const notifikasi = $('.info-data').data('infodata');

    if (notifikasi == "Disimpan" || notifikasi == "Dihapus") {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Data Berhasil ' + notifikasi,
        })
    }
    if (notifikasi == "Berhasil" || notifikasi == "Dihapus") {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Anda Berhasil Login  ',
        })
    }
    if (notifikasi == "Daftar" || notifikasi == "Dihapus") {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Anda Berhasil Daftar Akun ',
            text: 'Tunggu Konfirmasi Dari Admin',
        })
    }
    if (notifikasi == "Dihapus" || notifikasi == "Dihapus") {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Data Berhasil Dihapus  ',
        })
    }
    if (notifikasi == "Gagal Disimpan" || notifikasi == "Gagal Dihapus") {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Data ' + notifikasi,
        })
    }
    if (notifikasi == "Kosong") {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Data Tidak Boleh Kosong! ',
        })
    }
    if (notifikasi == "Username" || notifikasi == "Dihapus") {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Username Sudah Ada Terdaftar !!  ',
        })
    }
    if (notifikasi == "Email" || notifikasi == "Dihapus") {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Email Sudah Ada Terdaftar!!  ',
        })
    }
    if (notifikasi == "Salah" || notifikasi == "Dihapus") {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Email atau Password Anda Salah',
        })
    }
    if (notifikasi == "Keluar" || notifikasi == "Dihapus") {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Anda Berhasil Berhasil Kembali Ke halaman Login',
        })
    }
</script>