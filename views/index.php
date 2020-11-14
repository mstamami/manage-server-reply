<?php
if (!isset($_SESSION)) {
  session_start();
}
if (empty($_SESSION['usernm'])) {
  header("Location: ../index.php");
} else {
  if ($_SESSION['userlv'] == "2") {
    header('Location: ../user/');
  } else {
    if ((time() - $_SESSION["last_login_time"]) > 3600) {
      // akan diarahkan kehalaman logout.php
      header("location: ../logout.php");
    } else {
      // jika ada aktivitas, maka update tambah waktu session
      $_SESSION["last_login_time"] = time();
    }
    include("template/header.php");
    include("template/nav.php");
    if (!isset($_GET['page']) || ($_GET['page'] == "")) {
      include "dashboard.php";
    } else {
      $pagenya = $_GET["page"];
      if (file_exists("" . $pagenya . ".php")) {
        include "" . $pagenya . ".php";
      } else {
        include "dashboard.php";
      }
    }
    include("template/footer.php");
  }
}
