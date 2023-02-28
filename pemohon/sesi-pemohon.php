<?php
if (!isset($_SESSION['level'])) {
    echo '<script language="javascript">document.location="../404.php";</script>';
}
if ($_SESSION['level'] !== "pemohon") {
    echo '<script language="javascript"> document.location="../404.php";</script>';
}
