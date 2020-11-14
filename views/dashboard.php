<?php
if (!isset($_SESSION)) {
  session_start();
}
if (empty($_SESSION['usernm'])) {
  header("Location: ../index.php");
}
if ((time() - $_SESSION["last_login_time"]) > 3600) {

  // akan diarahkan kehalaman logout.php
  header("location: ../logout.php");
} else {
  // jika ada aktivitas, maka update tambah waktu session
  $_SESSION["last_login_time"] = time();
}

include_once '../init.php';

$userlogin = $_SESSION['userid'];
