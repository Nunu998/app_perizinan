<?php
session_start();
include "../koneksi.php";

if ($_GET['id'] != "") {
	$id = $_GET['id'];
	$sql = mysqli_query($db, "DELETE FROM jenis_barang WHERE id='$id'");
	if ($sql) {
		$_SESSION['info'] = 'Dihapus';
		echo "<script>document.location.href='../jenisbarang.php'</script>";
	} else {
		$_SESSION['info'] = 'Gagal Dihapus';
		echo "<script>document.location.href='../jenisbarang.php'</script>";
	}
}
