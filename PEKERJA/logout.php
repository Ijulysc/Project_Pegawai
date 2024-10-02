<?php
session_start();
session_destroy();
header("Location: login.php");  // Redirect kembali ke halaman login
exit;
?>
