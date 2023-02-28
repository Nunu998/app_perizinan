<?php
session_start();
include 'koneksi/koneksi.php';

// berfungsi menangkap data yang dikirim
if (isset($_POST['insert'])) {
	$email = $_POST['email'];
	$pass = md5($_POST['password']);

	// berfungsi menyeleksi data user dengan username dan password yang sesuai
	$sql = mysqli_query($db, "SELECT * FROM t_user WHERE email='$email' AND password='$pass' AND status='yes'");
	//berfungsi menghitung jumlah data yang ditemukan
	$cek = mysqli_num_rows($sql);


	// berfungsi mengecek apakah username dan password ada pada database
	if ($cek > 0) {
		$insert = mysqli_fetch_assoc($sql);

		// berfungsi mengecek jika user login sebagai admin
		if ($insert['level'] == "admin") {
			// berfungsi membuat session
			$_SESSION['nama'] =  $insert['nama_lengkap'];
			$_SESSION['level'] = "admin";
			//berfungsi mengalihkan ke halaman admin
			$_SESSION['info'] = 'Berhasil';
			echo "<script>document.location.href='admin/index.php'</script>";
			// berfungsi mengecek jika user login sebagai pegawai
		} else if ($insert['level'] == "pemohon") {
			// berfungsi membuat session
			$_SESSION['nama'] = $insert['nama_lengkap'];
			$_SESSION['level'] = "pemohon";
			// berfungsi mengalihkan ke halaman pegawai
			$_SESSION['info'] = 'Berhasil';
			echo "<script>document.location.href='pemohon/index.php'</script>";
			// berfungsi mengecek jika user login sebagai pimpinan
		} else if ($insert['level'] == "pegawai") {
			// berfungsi membuat session
			$_SESSION['nama'] = $insert['nama_lengkap'];
			$_SESSION['level'] = "pegawai";
			// berfungsi mengalihkan ke halaman pimpinan
			$_SESSION['info'] = 'Berhasil';
			echo "<script>document.location.href='pegawai/index.php'</script>";
		} else if ($insert['level'] == "pimpinan") {
			// berfungsi membuat session
			$_SESSION['nama'] = $insert['nama_lengkap'];
			$_SESSION['level'] = "pimpinan";
			// berfungsi mengalihkan ke halaman pimpinan
			$_SESSION['info'] = 'Berhasil';
			echo "<script>document.location.href='pimpinan/index.php'</script>";
		} else {
			$_SESSION['info'] = 'Salah';
			echo "<script>document.location.href='index.php'</script>";
		}
	} else {
		$_SESSION['info'] = 'Salah';
		echo "<script>document.location.href='index.php'</script>";
	}
}
