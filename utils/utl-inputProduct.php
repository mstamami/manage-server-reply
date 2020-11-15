<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once '../init.php';

require "../models/mod-product.php";

$mod_product       = new product($db->connection);

if (isset($_POST["submit"])) {
    if (empty($_POST["nama_product"]) || empty($_POST["code_product"])) {
        header("Location: ../views/index.php?page=inputProduct&eror=empty");
    } else {
        //header("Location: ../views/index.php?page=inputProduct");
    }
}
