<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<?php
		echo $js;
		echo $css;
	?>
	<title> TRANSAKSI </title>
	<style type="text/css">
		body {
				  font-family: Arial;
				  font-size: 17px;
				  padding: 8px;
				}

				* {
				  box-sizing: border-box;
				}

				.row_me {
				  display: -ms-flexbox; /* IE10 */
				  display: flex;
				  -ms-flex-wrap: wrap; /* IE10 */
				  flex-wrap: wrap;
				  margin: 0 px;
				}

				.col-25 {
				  -ms-flex: 25%; /* IE10 */
				  flex: 25%;
				}

				.col-50 {
				  -ms-flex: 50%; /* IE10 */
				  flex: 50%;
				}

				.col-40 {
				  -ms-flex: 40%; /* IE10 */
				  flex: 40%;
				}

				.col-60 {
				  -ms-flex: 60%; /* IE10 */
				  flex: 60%;
				}

				.col-75 {
				  -ms-flex: 75%; /* IE10 */
				  flex: 75%;
				}

				.col-25,
				.col-50,
				.col-75 {
				  padding: 0 16px;
				}

				.container_me {
				  background-color: #f2f2f2;
				  padding: 5px 20px 15px 20px;
				  border: 1px solid lightgrey;
				  border-radius: 3px;
				}

				input[type=text] {
				  width: 100%;
				  margin-bottom: 20px;
				  padding: 12px;
				  border: 1px solid #ccc;
				  border-radius: 3px;
				}

				label {
				  margin-bottom: 10px;
				  display: block;
				}

				.icon-container {
				  margin-bottom: 20px;
				  padding: 7px 0;
				  font-size: 24px;
				}

				.btn {
				  background-color: #4CAF50;
				  color: white;
				  padding: 12px;
				  margin: 10px 0;
				  border: none;
				  width: 100%;
				  border-radius: 3px;
				  cursor: pointer;
				  font-size: 17px;
				}

				.btn:hover {
				  background-color: #45a049;
				}

				a {
				  color: #2196F3;
				}

				hr {
				  border: 1px solid lightgrey;
				}

				span.price {
				  float: right;
				  color: grey;
				}

				.itm_lst:hover {
					cursor: text;
					text-decoration: none;
					color: #2196F3;
				}

				/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
				@media (max-width: 800px) {
				  .row_me {
				    flex-direction: column-reverse;
				  }
				  .col-25 {
				    margin-bottom: 20px;
				  }
				}
	</style>
</head>
<body>
	<?php echo $header;?>
	<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body bdy">
      
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncls" href="">Close</button>
      </div>
    </div>
  </div>
</div>
	<br><br><br><br>
		<form onsubmit="sub(<?php echo "'".$user['id']."'" ?>);return false;">
			<div class="row_me">
				<div class="col-60" >
					<div class="container_me">
			            <h1 style="padding-bottom:2px;">Detail Pengiriman</h1>
			            <label id="fname" for="fname"><i class="fa fa-user"></i> Nama Lengkap </label> <!-- ID = fname (FULL NAME) -->
			            <input type="text" id="fnames" name="firstname" placeholder="Nama Penerima" required>
			            <label id="email" for="email"><i class="fa fa-envelope"></i> Email </label> <!-- ID = email (EMAIL) -->
			            <input type="text" id="emails" name="email" placeholder="Email Penerima" required>
			            <label id="alamat"for="adr"><i class="fa fa-address-card"></i> Alamat Lengkap </label> <!-- ID = alamat -->
			            <input type="text" id="adrs" name="address" placeholder="Alamat Penerima" required>
			            <label id="kota" for="city"><i class="fa fa-institution"></i> Kota </label> <!-- ID = kota  -->
			            <input type="text" id="citys" name="city" placeholder="Kota penerima" required>
			            <div class="row_me">
			              <div class="col-50">
			                <label id="kabupaten" for="state">Kabupaten</label>  <!-- ID = kabupaten -->
			                <input type="text" id="states" name="state" placeholder="Kabupaten" required>
			              </div>
			              <div class="col-50">
			                <label id="zip" for="zip">Zip Code</label> <!-- ID = zip -->
			                <input type="text" id="zips" name="zip" placeholder="Zip Code" required>
			              </div>
			            </div>
			            <input type="submit" value="Continue to checkout" class="btn" data-toggle="modal" data-target="#myModal"> 
			        </div>
				</div>

				<div class="col-40">
					    <div class="container_me">
					      <h1 >Detail Barang</h1>
					      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php echo count($list); ?></b></span></h4>
					      <?php
					      	$total = 0;
					      	foreach ($list as $row) {
					      		$total += $row['harga']*$row['C_Jumlah']; 
					      		echo '
					      		<p><a class="itm_lst">'.$row['B_name'].'</a> <span class="price">Rp. '.nominal($row['harga']*$row['C_Jumlah']).'</span></p>';
					      	}
					      	echo '<hr>
					      		<p>Total <span class="price" style="color:black"><b>Rp. '.nominal($total).'</b></span></p>';
					      ?>
					    </div>
			  		</div>
				</div>
				</div>
			</div>
		</form>
		<br><br><br>
		
</body>
</html>
<script>

	function sub(bon){
		var nama = $('#fnames').val();
		var email = $('#emails').val();
		var alamat = $('#adrs').val();
		var kota = $('#citys').val();
		var kab = $('#states').val();
		var zip = $('#zips').val();
		var tmp = ""+nama+", "+email+", "+alamat+", "+kota+", "+kab+", "+zip+"";
		$.ajax({
        	type: "POST",
            url: "checkout/done",
            data: {
                id: bon,
                alamat: tmp,
            },
            success: function(data) {
            	if(data == "Transaction Succes"){
            		$('.modal-body').html('<h2>'+data+'</h2>');
					$('#myModal').on('hidden.bs.modal',function(){
            			window.location.href="home";
            		})
            	}else{
            		$('.modal-body').html('<h2>'+data+'</h2>');
            		$('#myModal').on('hidden.bs.modal',function(){
            			window.location.href="Cart";
            		})
            	}
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
		        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
		    } 
        });
        return false;
	}
</script>