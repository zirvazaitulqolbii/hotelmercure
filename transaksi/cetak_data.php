<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-6">

                <div class="card">
                    <div class="card-header">
                        Data Pembayaran
                    </div>
                    <div class="card-body">


                        <?php

                        $conn = mysqli_connect("localhost", "root", "", "mbuhotel");
                        $query = mysqli_query($conn, "SELECT * FROM transaksi
    LEFT JOIN checkin ON transaksi.id_transaksi = checkin.id_checkin
    LEFT JOIN checkout ON transaksi.id_transaksi = checkout.id_checkout
    WHERE id_transaksi  = '" . $_GET['id_transaksi'] . "' 

    ");

                        while ($data = mysqli_fetch_assoc($query)) { ?>
                            <table class="table justify-content">
                                <tr>
                                    <td>ID Transaksi</td>
                                    <td>:</td>
                                    <td><?= $data['id_transaksi'] ?></td>
                                </tr>
                                <tr>
                                    <td>No Kamar</td>
                                    <td>:</td>
                                    <td><?= $data['no_kamar'] ?></td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td><?= $data['nik'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Checkin</td>
                                    <td>:</td>
                                    <td><?= $data['id_checkin'] ?><?= $data['tanggal_checkin'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Checkout</td>
                                    <td>:</td>
                                    <td><?= $data['id_checkout'] ?><?= $data['tanggal_checkout'] ?></td>
                                </tr>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

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

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="../plugins/raphael/raphael.min.js"></script>
    <script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>

    <!-- PAGE SCRIPTS -->
    <!-- <script src="../dist/js/pages/dashboard2.js"></script> -->

    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
    <!-- DataTables -->
<script type="text/javascript">
	window.print();

  function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

    oFReader.onload = function (oFREvent) {
      document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
  };
</script>