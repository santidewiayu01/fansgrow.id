<?php
session_start();
require 'log_helper.php';

if (isset($_SESSION['admin_id'])) {
  catat_log($_SESSION['admin_id'], $_SESSION['admin_username'], 'Logout dari sistem');
}

session_destroy();
header("Location: admin_login.php");
exit();
?>
