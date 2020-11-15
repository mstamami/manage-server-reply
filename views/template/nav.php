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


$userlogin = $_SESSION['usernm'];

include_once '../init.php';

if (isset($_POST["tambahanggota"])) {
  if (empty($_POST["nama"]) && empty($_POST["level"]) && empty($_POST["password"])) {
    $nama = "Nama tidak boleh kosong";
  } else {
    $nama     = $_POST["nama"];
    $level    = $_POST["level"];
    $email    = $_POST["email"];
    $password = $_POST["password"];

    if ($db->query("INSERT INTO user (level_id, user_nama, user_email, user_pass)
                  VALUES ('$level', '$nama', '$email', '$password')")) {
?>
      <script>
        alert('successfully add ');
        window.location = "index.php?page=dashboard"
      </script>
    <?php
    } else {
    ?>
      <script>
        alert('error while add ...');
      </script>
<?php
    }
  }
}

?>


<div id="tambah-anggota" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Tambah User</h4>
      </div>
      <div class="modal-body">
        <!-- start form for validation -->
        <form id="demo-form2" method="post" action="" data-parsley-validate>
          <label for="nama">Username :</label>
          <input type="text" id="nama" class="form-control" name="nama" required />


          <label for="level">Level :</label>
          <select id="level" name="level" class="form-control" required>
            <?php
            $sql31 = "SELECT * FROM level";
            $result31 = mysqli_query($db->connection, $sql31);

            while ($row31 = mysqli_fetch_array($result31)) { ?>
              <option value="<?php echo $row31['level_id']; ?>"><?php echo $row31['level_name']; ?></option>
            <?php } ?>
          </select>

          <label for="email">Email :</label>
          <input type="text" id="email" class="form-control" name="email" required />

          <label for="password">Password :</label>
          <input type="text" id="password" class="form-control" name="password" required />



          <br />

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="tambahanggota" class="btn btn-primary">Save changes</button>
        </form>
      </div>

    </div>
  </div>
</div>


<!-- <div class="right_col" role="main" style="min-height: 945px;"> -->
<!-- /modals -->




<!-- BEGIN HEADER -->
<header class="page-header">
  <nav class="navbar mega-menu" role="navigation">
    <div class="container-fluid">
      <div class="clearfix navbar-fixed-top">
        <!-- Brand and toggle get grouped for better mobile display -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="toggle-icon">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </span>
        </button>
        <!-- End Toggle Button -->
        <!-- BEGIN LOGO -->
        <a id="index" class="page-logo" href="index-2.html">
          <img src="../assets/layouts/layout5/img/logo.png" alt="Logo"> </a>
        <!-- END LOGO -->
        <!-- BEGIN TOPBAR ACTIONS -->
        <div class="topbar-actions">
          <!-- BEGIN USER PROFILE -->
          <div class="btn-group-img btn-group">
            <button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
              <span>Hi, <?php echo $userlogin; ?></span>
              <img src="../assets/images/user.png" alt=""> </button>
            <ul class="dropdown-menu-v2" role="menu">
              <li>
                <a href="#" data-toggle="modal" data-target="#tambah-anggota">
                  <i class="icon-user"></i> Tambah User
                </a>
              </li>
              <li>
                <a href="refresh.php">
                  <i class="icon-refresh"></i> Refresh </a>
              </li>

              <li class="divider"> </li>
              <li>
                <a href="../logout.php">
                  <i class="icon-key"></i> Log Out </a>
              </li>
            </ul>
          </div>
          <!-- END USER PROFILE -->
        </div>
        <!-- END TOPBAR ACTIONS -->
      </div>
      <!-- BEGIN HEADER MENU -->
      <div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown dropdown-fw dropdown-fw-disabled <?php if ($_GET["page"] == "dashboard") {
                                                                  echo "active open selected";
                                                                } ?> "><a class="text-uppercase" href="index.php?page=dashboard"><i class="fa fa-home"></i> Home</a></li>
          <li class="dropdown dropdown-fw dropdown-fw-disabled <?php if ($_GET["page"] == "datasite") {
                                                                  echo "active open selected";
                                                                } ?> "><a class="text-uppercase" href="index.php?page=product"><i class="fa fa-desktop"></i> Product</a></li>
        </ul>
      </div>
      <!-- END HEADER MENU -->
    </div>
    <!--/container-->
  </nav>
</header>
<!-- END HEADER -->
<div class="container-fluid">
  <div class="page-content">