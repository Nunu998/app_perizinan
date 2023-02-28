<?php
session_start();
include "../koneksi.php";

if (isset($_POST['insert'])) {
	$id_user = $_POST['id_user'];
	$status = $_POST['status'];

	if ($status != "") {
		//
		$insert = mysqli_query($db, "UPDATE t_user set status='yes' WHERE id_user = $id_user");
		if ($insert) {
			$_SESSION['info'] = 'Disimpan';
			echo "<script>document.location.href='../admin_status.php'</script>";
		} else {
			$_SESSION['info'] = 'Gagal Disimpan';
			echo "<script>document.location.href='../admin_status.php'</script>";
		}
	} else {
		//jika data kosong
		$_SESSION['info'] = 'Kosong';
		echo "<script>document.location.href='../admin_status.php'</script>";
	}
}
