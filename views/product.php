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

require "../models/mod-product.php";
$mod_product  = new product($db->connection);
$data_product = $mod_product->listProduct($userlogin);

?>

<div class="row">
  <div class="col-md-12">
    <!-- <div class="note note-success">
      <p> Please try to re-size your browser window in order to see the tables in responsive mode. </p>
    </div> -->


    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box green">
      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-cogs"></i>Product </div>
        <div class="tools">
          <a href="index.php?page=inputProduct"><button type="button" class="btn btn-xs btn-circle btn-default"><i class="fa fa-plus"></i> Add Product</button></a>
        </div>
      </div>
      <div class="portlet-body flip-scroll">
        <table class="table table-bordered table-striped table-condensed flip-content">
          <thead class="flip-content">
            <tr>
              <th> No </th>
              <th> Nama </th>
              <th> Kode </th>
              <th> Deskripsi </th>
              <th> Stock</th>
              <th> Status </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($data_product as $row) { ?>
              <tr>
                <td> <?php echo $no++; ?> </td>
                <td> <?php echo $row['nama']; ?> </td>
                <td> <?php echo $row['kode']; ?> </td>
                <td> <?php echo $row['deskripsi']; ?> </td>
                <td> <?php echo $row['stok_ada']; ?> </td>
                <td> <?php echo $row['aktif']; ?> </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->
  </div>
</div>