 
<!DOCTYPE html>
<html>
<head>
	<title></title>
<!-- Bootstrap core JavaScript-->
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

 <!-- Core plugin JavaScript-->

  <script type="text/javascript"  src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript"  src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>
<body>
<div class="col-md-12">
	<table id="tableorder" class="table-striped table-bordered table-responsive">
	<thead>
		<tr>
			<th>No</th>
			<th>ID</th>
			<th>User</th>
			<th>Product</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Tanggal</th>
			<th>Alamat</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$total=0;
		foreach ($orderan as $row) {
			$ID = $row['ID_Order'];
			$NameUser = $row['name'];
			$Harga = $row['O_harga'];
			$Jumlah = $row['O_jumlah'];
			$ProductName = $row['B_name'];
			$tgl = $row['O_tgl'];
			$adrs = $row['O_address'];
			$Harga *= $Jumlah;
			$total +=$Harga;
			echo '<tr>';
			echo '<td></td>';
			echo '<td>'.$ID.'</td>';
			echo '<td>'.$NameUser.'</td>';
			echo '<td>'.$ProductName.'</td>';
			echo '<td>'.$Jumlah.'</td>';
			echo '<td>'.nominal($Harga).'</td>';
			echo '<td>'.$tgl.'</td>';
			echo '<td>'.$adrs.'</td>';
			echo '</tr>';
	
		}
	?>
	</tbody>
	<tfoot>
		<thead>
			<tr>
				<th colspan="7" align="left">Total</th>
				<?php 
					echo "<th>Rp ".nominal($total)."</th>";
				 ?>
			</tr>
		</thead>
	</tfoot>
</table>
</div>
</body>
</html>



<script>
	$(document).ready(function () {
    var t = $('#tableorder').DataTable({
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    });

    t.on('order.dt search.dt', function () {
        t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

});

</script>
