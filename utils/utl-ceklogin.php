<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once '../init.php';

require "../models/mod-user.php";

$mod_user       = new user($db->connection);

if (isset($_POST["submit"])) {

    if (empty($_POST["usernm"]) || empty($_POST["password"])) {
        $error = "Both fields are required.";
    } else {
        $username = $_POST['usernm'];
        $password = $_POST['password'];

        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($db->connection, $username);
        $password = mysqli_real_escape_string($db->connection, $password);

        $cek_user_login = $mod_user->cekUserLogin($username, $password);
        $user_login = $mod_user->UserFromUserpass($username, $password);

        if ($cek_user_login != 0) {

            $_SESSION['userid'] = $user_login['user_id'];
            $_SESSION['usernm'] = $user_login['user_nama'];
            $_SESSION['userlv'] = $user_login['level_id'];
            $_SESSION["last_login_time"] = time();

            if ($_SESSION['userlv'] == "1") {
                echo '<meta http-equiv="Refresh" content="0; url=../views/">';
            } else {
                echo '<meta http-equiv="Refresh" content="0; url=../index.php">';
            }
        } else {
            echo '<meta http-equiv="Refresh" content="0; url=../index.php">';
        }
    }
}
