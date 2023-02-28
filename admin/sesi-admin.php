<?php
if (!isset($_SESSION['level'])) {
    echo '<script language="javascript">document.location="../404.php";</script>';
}
if ($_SESSION['level'] !== "admin") {
    echo '<script language="javascript"> document.location="../404.php";</script>';
}
