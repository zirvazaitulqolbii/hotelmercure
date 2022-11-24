<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login/index.php");
  exit;
}

if (isset($_SESSION['login'])) {
  $nama = $_SESSION['nama'];
  $id = $_SESSION['id'];
}

require "functions.php";

$conn = koneksi();

$no_kamar = $_POST['no_kamar'];
$nik = $_POST['nik'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];

$kamar = mysqli_query($conn, "SELECT harga FROM kamar WHERE no_kamar = '$no_kamar'");
$harga = mysqli_fetch_array($kamar);

$ci = new DateTime("$checkin");
$co = new DateTime("$checkout");
$sewa = $co->diff($ci)->days;

$total = $harga['harga'] * $sewa;

$tamu = mysqli_query($conn, "SELECT * FROM tamu WHERE nik='$nik'");
$tamu = mysqli_num_rows($tamu);

if (isset($_POST['simpan'])) {
  if ($tamu > 0) {
    simpan($_POST);
  } else {
    simpan_tamu($_POST);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Hotel Mercure</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

  <div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">
            Hai, <?= $nama; ?>
          </a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" href="../logout.php" onclick="return confirm('Apakah Anda Yakin Ingin Keluar?')">
            Logout &nbsp;
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <i class="fas fa-hotel img-circle elevation-3 ml-3"></i>
        &nbsp;
        <span class="brand-text font-weight-bold">Hotel Mercure</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <div class="mt-3">
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="../index.php" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-header">DATA MASTER</li>
              <li class="nav-item">
                <a href="../kamar/index.php" class="nav-link">
                  <i class="nav-icon fas fa-person-booth"></i>
                  <p>
                    Data Kamar
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../tamu/index.php" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Data Tamu
                  </p>
                </a>
              </li>
              <li class="nav-header">DATA TRANSAKSI</li>
              <li class="nav-item">
                <a href="../transaksi/index.php" class="nav-link active">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Data Transaksi
                  </p>
                </a>
              </li>
              <li class="nav-header">DATA ADMIN</li>
              <li class="nav-item">
                <a href="../admin/index.php" class="nav-link">
                  <i class="nav-icon fas fa-user-shield"></i>
                  <p>
                    Administrator
                  </p>
                </a>
              </li>
            </ul>
          </nav>
        </div>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->

      <section class="content">
        <div class="container-fluid">

          <div class="row justify-content-center pt-2">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
              <div class="card card-info">
                <div class="card-header">
                  <h5 class="text-center m-0">Pesan Kamar</h5>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>No Kamar</label>
                          <input type="text" name="no_kamar" class="form-control" id="no_kamar" value="<?= $no_kamar; ?>" readonly>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Harga Kamar</label>
                          <input type="text" name="harga" class="form-control" id="harga" value="<?= $harga['harga']; ?>" readonly>
                        </div>
                      </div>
                    </div>

                    <?php
                    if ($tamu > 0) {
                    ?>
                      <div class="form-group">
                        <label for="nik">NIK Tamu</label>
                        <input type="text" name="nik" class="form-control" id="nik" value="<?= $nik; ?>" readonly>
                      </div>
                    <?php
                    } else {
                    ?>
                      <div class="form-group">
                        <label for="nik">NIK Tamu</label>
                        <input type="text" name="nik" class="form-control" id="nik" value="<?= $nik; ?>" readonly>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label for="telepon">Nomor Telepon</label>
                                <input type="text" name="telepon" class="form-control" id="telepon" placeholder="Masukkan Nomor Telepon" required>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="alamat">Alamat Lengkap</label>
                            <input type="text" style="height: 123px;" name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat" required>
                          </div>
                        </div>
                      </div>
                    <?php
                    }
                    ?>

                    <div class="row">
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label for="checkin">Tanggal Check In</label>
                          <input type="date" name="checkin" class="form-control" id="checkin" value="<?= $checkin; ?>" readonly>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="checkout">Tanggal Check Out</label>
                          <input type="date" name="checkout" class="form-control" id="checkout" value="<?= $checkout; ?>" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label for="checkin">Lama Sewa</label>
                          <input type="text" name="sewa" class="form-control" id="sewa" value="<?= $sewa; ?>" readonly>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="checkout">Total Harga</label>
                          <input type="text" name="total" class="form-control" id="total" value="<?= $total; ?>" readonly>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer text-center">
                      <a href="index.php" name="batal" class="btn btn-danger">Batal</a>
                      &nbsp;
                      <button type="submit" name="simpan" class="btn btn-primary" onclick="return confirm('Apakah Anda Yakin Ingin Menyimpan Data?')">Simpan</button>
                    </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
          </div>

        </div>
        <!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer text-sm text-center">
      <strong>Copyright &copy; 2021 Zirva Zaitul Qolbi
      </strong>
    </footer>

  </div>

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- DataTables -->
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <!-- overlayScrollbars -->
  <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="../dist/js/demo.js"></script>
  <!-- Select2 -->
  <script src="../plugins/select2/js/select2.full.min.js"></script>
  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="../plugins/raphael/raphael.min.js"></script>
  <script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="../plugins/chart.js/Chart.min.js"></script>

  <!-- page script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
  </script>

  <script>
    $(function() {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      });
    });
  </script>

</body>

</html>