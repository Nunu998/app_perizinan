<?php

if (isset($_SESSION['login'])) {
	if ($_SESSION['level'] == "admin") {
		header("location:admin/index.php");
	} else if ($_SESSION['level'] == "pegawai") {
		header("location:pegawai/index.php");
	} else if ($_SESSION['level'] == "kepaladinas") {
		header("location:kepaladinas/index.php");
	} else {
		header("location:index.php");
	}
}
