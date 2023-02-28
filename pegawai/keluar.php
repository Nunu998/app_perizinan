<?php
session_start();
session_destroy();
$_SESSION['info'] = 'Keluar';
echo "<script>document.location.href='../index.php'</script>";
