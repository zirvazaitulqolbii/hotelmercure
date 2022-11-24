<?php include 'koneksi.php'; ?>


<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    body{
        padding-top: 100px;
    }
    </style>
</head>
<body>

<center><table border=1 cellpadding="6" cellspacing="8">
		<tr>
			 <th colspan="10"style="font-size:2.3em;">Struk Pembayaran</th>
		</tr>
		<tr>
                <th>NO</th>
                <th>ID PEMBAYARAN</th>
                <th>ID RESERVASI</th>
                <th>BUKTI PEMBAYARAN</th>
		</tr>
		<?php
		$no = 1;
        $query = mysqli_query($conn,"SELECT * FROM pembayaran ");
        while($d = mysqli_fetch_assoc($query)){?>
		<tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $d['id_pembayaran'] ?></td>
                            <td><?php echo $d['id_reservasi'] ?></td>
                            <td><?php echo $d['bukti_pembayaran'] ?></td>

		<?php
		}
		?>
	</table></center>
    </div>
</div>
<br>



<script src="js/bootstrap.bundle.min.js"></script>





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

</body>
</html>