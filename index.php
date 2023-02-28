<!DOCTYPE html>
<?php
session_start();
include "koneksi/koneksi.php";
?>

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

    <!-- MetisMenu CSS -->
    <link href="assets/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/startmin.css" rel="stylesheet">
    <link href="assets/login.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="assets/package/dist/sweetalert2.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<style>
    body {
        background: url(assets/logo/.png) no-repeat fixed;
        -webkit-background-size: 100% 100%;
        -moz-background-size: 100% 100%;
        -o-background-size: 100% 100%;
        background-size: 100% 100%;
    }

    h3 {
        text-align: center;
        text-transform: uppercase;
        color: #1e272e;
        font: bold;
    }
</style>

<div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                            echo $_SESSION['info'];
                                        }
                                        unset($_SESSION['info']); ?>"></div>


<!--Hey! This is the original version
of Simple CSS Waves-->


    <body class="login">
        <a class="hiddenanchor" id="signin"></a>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <center>
                                <font class="panel-title">Silahkan Login Menggunakan Email dan Password</font>
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
                                <form method="post" action="aksi.php">
                                    <div class="form-group has-feedback">
                                        <input type="email" id="email" name="email" class="form-control" autocomplete="off" maxlength="50" placeholder="Email" required="email" />
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <div class="input-group" id="show_hide_password"><input class="form-control" type="password" name="password" id="password" placeholder="Masukan Password">
                                            <div class="input-group-addon">
                                                <a style="color:#333;" href="#"><i class="glyphicon glyphicon-eye-close" aria-hidden="true"></i></a>
                                            </div>
                                            </input>
                                        </div>
                                    </div>

                                   <hr>

                                    <div>
                                        <button type="submit" name="insert" class="btn btn-warning col-md-12 table-responsive info-data"><span class="glyphicon glyphicon-lock"></span> Masuk</button>
                                    </div>

                                    <br>
                                    <p></p>
                                    <div>
                                        <font>Belum Punya Akun ? Silahkan</font>
                                        <a href="register.php">Register</a>
                                    </div>
                                    <div class="clearfix"></div>
                                    <br>
                                    <div class="separator">
                                        <div>
                                            <center>
                                                <font>Copyright &copy; DPMPTSP Kota Banjarmasin <?= date('Y') ?></font>
                                            </center>
                                        </div>
                                    </div>

                                </form>

                        </section>

                    </div>
                </div>
            </div>

        </div>

        <!-- jQuery -->
        <script src="assets/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js-ku.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="assets/js/startmin.js"></script>

        <script src="js-ku.js"></script>
        <script src="/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
        <script src="/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- jQuery -->
        <script src="assets/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js-ku.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="assets/js/startmin.js"></script>

        <script src="admin/js-ku.js"></script>

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

</body>

</html>