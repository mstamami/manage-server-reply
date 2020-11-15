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
?>

<div class="row">
  <div class="col-md-6 ">
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="caption font-red-sunglo">
          <i class="icon-settings font-red-sunglo"></i>
          <span class="caption-subject bold uppercase">Input Product</span>
        </div>
      </div>
      <div class="note note-danger">
        <p> Please try to re-size your browser window in order to see the tables in responsive mode. </p>
      </div>
      <div class="portlet-body form">
        <form role="form" action="../utils/utl-inputProduct.php" method="post">
          <div class="form-body">
            <div class="form-group">
              <label>Nama Product</label>
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-bars"></i>
                </span>
                <input type="text" class="form-control" placeholder="Product" name="nama_product"> </div>
            </div>
            <div class="form-group">
              <label>Code Product</label>
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-bars"></i>
                </span>
                <input type="text" class="form-control" placeholder="Code" name="code_product"> </div>
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea class="form-control" rows="3" name="desc_product"></textarea>
            </div>
            <div class="form-group">
              <label>Stock</label>
              <select class="form-control" name="stock_product">
                <option value="1">Ready</option>
                <option value="0">Sold Out</option>
              </select>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select class="form-control" name="status_product">
                <option value="1">Active</option>
                <option value="0">Non Active</option>
              </select>
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" name="submit" class="btn blue">Submit</button>
          </div>
        </form>
      </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->
  </div>
</div>