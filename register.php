<?php
session_start();
include "koneksi/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DPMPTSP Kota Banjarmasin</title>
    <link rel="shortcut icon" href="assets/logo/atas.png">

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/login.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="assets/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/startmin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="assets/package/dist/sweetalert2.min.css" rel="stylesheet" type="text/css">
</head>
<div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                            echo $_SESSION['info'];
                                        }
                                        unset($_SESSION['info']); ?>"></div>

    <body class="login">
        <a class="hiddenanchor" id="signin"></a>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <center>
                                <font class="panel-title">Silahkan Masukan Data Anda Dengan Benar !</font>
                            </center>
                        </div>
                        <section class="login_content">
                            <div class="panel-body bg-info">
                                <span class="input-group-btn">
                                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                                        <center><img src="assets/logo/logo2.png" width="200" alt=""></center>
                                    </a>
                                </span>
                                <br>
                                <form action="aksi_regis.php" method="POST">

                                    <div class="form-group has-feedback">
                                        <input type="text" id="nama_depan" name="nama_depan" class="form-control" autocomplete="off" maxlength="50" placeholder="Nama Depan" required="Nama Depan" />
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <input type="text" id="nama_belakang" name="nama_belakang" class="form-control" autocomplete="off" maxlength="50" placeholder="Nama Belakang" required="Nama Belakang" />
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" autocomplete="off" maxlength="50" placeholder="Nama Lengkap" required="Nama Lengkap" />
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <input type="text" id="username" name="username" class="form-control" autocomplete="off" maxlength="50" placeholder="Username" required="username" />
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <div class="input-group" id="show_hide_password"><input class="form-control" type="password" name="password" id="password" placeholder="Masukan Password">
                                            <div class="input-group-addon">
                                                <a style="color:#333;" href="#"><i class="glyphicon glyphicon-eye-close" aria-hidden="true"></i></a>
                                            </div>
                                            </input>
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <input type="email" id="username" name="email" class="form-control" autocomplete="off" maxlength="50" placeholder="Email" required="Email" />
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>

                                    <div class="form-group">
                                        <select name="level" class="form-control" required>
                                            <option value="">--Pilih--</option>
                                            <option value="pemohon">Pemohon</option>
                                        </select>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <input type="number" id="no_hp" name="no_hp" class="form-control" autocomplete="off" maxlength="50" placeholder="Nomor HP" required="Nomor HP" />
                                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                                    </div>


                                    <hr>

                                    <div>
                                        <a href="index.php" class="btn btn-warning btn-round">Kembali</a>
                                        <input type="submit" name="insert" class="btn btn-success btn-round" value="Simpan">
                                    </div>

                                    <div>
                                        <font>Sudah Mempunyai akun ? </font>
                                        <a href="index.php">Login</a>
                                        <div class="clearfix"></div>
                                        <br>
                                        <div class="separator">
                                            <div>
                                                <center>
                                                    <font>Copyright &copy;  DPMPTSP Kota Banjarmasin  <?= date('Y') ?></font>
                                                </center>
                                            </div>
                                        </div>

                                </form>

                        </section>
                    </div>
                </div>
            </div>
            <br>
            <br><br>
            <br>
            <p></p>

        </div>
        <script src="assets/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js-ku.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="assets/js/startmin.js"></script>
        <script src="assets/three.min.js"></script>
        <script src="assets/vanta.clouds.min.js"></script>
        <script src="js-ku.js"></script>
        
        <!-- jQuery -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
        <script src="/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js-ku.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="assets/js/startmin.js"></script>
        <script src="assets/three.min.js"></script>
        <script src="assets/vanta.clouds.min.js"></script>
        <script src="js-ku.js"></script>
       
        <script>
            $(document).ready(function() {
                $("#show_hide_password a").on('click', function(event) {
                    event.preventDefault();
                    if ($('#show_hide_password input').attr("type") == "text") {
                        $('#show_hide_password input').attr('type', 'password');
                        $('#show_hide_password i').addClass("glyphicon glyphicon-eye-close");
                    } else if ($('#show_hide_password input').attr("type") == "password") {
                        $('#show_hide_password input').attr('type', 'text');
                        $('#show_hide_password i').removeClass("glyphicon glyphicon-eye-close");
                        $('#show_hide_password i').addClass("glyphicon glyphicon-eye-open");
                    }
                });
            });
        </script>
        <script>
            var flash = $('flash').data("falsh")
            if (flash) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: flash
                })
            }
        </script>

        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>

        <script>
            $('.delete-data').on('click', function(e) {
                e.preventDefault();
                var getLink = $(this).attr('href');

                Swal.fire({
                    title: 'Hapus Data?',
                    text: "Data akan dihapus permanen",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = getLink;
                    }
                })
            });
        </script>

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
        </script>
       
</div>

</body>

</html>