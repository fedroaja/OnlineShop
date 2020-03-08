<!DOCTYPE html>
<html>
<head>
	<?php
		echo "<title>".$title."</title>";
		echo $js;
		echo $css;

	?>
	<script>
		<?php 
			if ($user['name'] == null) {
				echo "window.location.href = 'Home';";
			}
		?>
	</script>
</head>
<body>
	<?= $header; ?>
	<br><br><br>
	<h1 style="text-align: center;">SHOPPING CART</h1>
	<hr>
	
	<div class="container">
		<h3>Hello, <?= $user['name']; ?> </h3>
	<div class="table-responsive col-lg-12">
	<table class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th class="th-sm">No.</th>
				<th class="th-sm">Picture</th>
				<th class="th-sm">Nama</th>
				<th class="th-sm">Jumlah</th>
				<th class="th-sm">Harga</th>
				<th class="th-sm">Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$AI = 0;
			$total = 0;
			$sck;
			foreach ($list as $row) {
				$total += $row['harga']*$row['C_Jumlah']; 
				echo "<tr>
						<td>".++$AI."</td>
						<td><img width=\"100px\" height=\"100px\" class=\"small-image\" src=\"assets/foto/" . $row['B_photo'] . "\"></td>
						<td>".$row['B_name']."</td>
						<td><input type=\"number\" min=\"1\" max=\"".$row['B_stock']."\" onchange=\"cek('".$row['C_index']."')\" class=\"jum\" value=\"".$row['C_Jumlah']."\"></td>
						<td>Rp ".nominal($row['harga']*$row['C_Jumlah'])."</td>
						<td><button onclick=\"del(".$row['C_index'].")\" class=\"btn btn-danger\"><i class=\"fas fa-trash-alt\" >&nbspDelete</i></button></td>
					</tr>";
			}
			echo "<tr>
					<td colspan=\"5\" align=\"right\"><b>Total</b></td>
					<td><b>Rp ".nominal($total)."</b></td>
				</tr>";
		?>
		</tbody>
	</table>

		<br><br>
		<button onclick="letsgo()" class="btn btn-lg btn-primary form-control" style="height: 50px;"><i class="fas fa-money-bill-wave" aria-hidden="true">
&nbspPay</i></button>
</div>
</div>
</body>
</html>
<script>
	var idaa;
 $(document).ready(function(){
  $(".jum").on("change",function(){
   if($(this).val() > parseInt($(this).attr("max"))){
    $(this).val(parseInt($(this).attr("max")));
   }
   if($(this).val() < 1){
    $(this).val(1);
   }
   gogogo(idaa,$(this).val());
  });
  
 })
 function cek(ida){
  idaa = ida;
 }
 function gogogo(ida,zaa){
  $.ajax({
         type: "POST",
            url: "cart/update",
            data: {
                id: parseInt(ida),
                st: zaa
            },
            success: function(data) {
             window.location.href = "cart";
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
          alert("Status: " + textStatus); alert("Error: " + errorThrown); 
      }
  });
 }
	function del(ida){
		if(confirm("are you sure you want to discard this item ?")){
			$.ajax({
	        	type: "POST",
	            url: "cart/del",
	            data: {
	                id: ida
	            },
	            success: function(data) {
	            	window.location.href = "cart";
	            },
	            error: function(XMLHttpRequest, textStatus, errorThrown) { 
			        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
			    } 
	        });
		}
	}
	function letsgo(){
		window.location.href = "checkout";
	}
</script>