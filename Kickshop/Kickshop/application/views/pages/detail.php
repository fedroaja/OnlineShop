<!DOCTYPE html>
<html>

<head>
	<?php
	echo $js;
	echo $css;
	?>
	<title><?= $title ?></title>
</head>

<body>


	<?php echo $header; ?>


	<div class="container">

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
		<div class="row">
			<?php
			$Stock;
			$B_ID;
			$Price;
			$Jumlah;
			foreach ($product as $row) {
				$B_ID  	= $row['ID_Barang'];
				$Brand 	= $row['B_Brand'];
				$Name 	= $row['B_name'];
				$Color 	= $row['B_color'];
				$Poto 	= $row['B_photo'];
				$Size 	= $row['B_size'];
				$Desc 	= $row['B_description'];
				$Poto2 	= $row['B_photo2'];
				$Poto3 	= $row['B_photo3'];
				$Price 	= $row['B_price'];
				$Stock 	= $row['B_stock'];
				$sep = "'";
				echo '<div class="col-md-8">';
				echo '<div id="cursor-coord-disp" style="width: 140px; height: 24px; border: solid 1px black;" hidden></div>';
				echo '<div id="big-image" style="position: relative; width: 407px; height: 400px; background:url(' . $sep . 'assets/foto/' . $Poto . '' . $sep . ') no-repeat;background-size:cover;background-position:center; cursor:none;">																			<div id="cursor-window" style="display: none; cursor: none; position: absolute; left: 0px; top: 80px; width: 100px; height: 100px; border: solid 1px black;"></div></div>';
				echo '<img class="small-image" src="assets/foto/' . $Poto . '">';
				echo '<img class="small-image" src="assets/foto/' . $Poto2 . '">';
				echo '<img class="small-image" src="assets/foto/' . $Poto3 . '">';
				echo '</div>';
				echo '<div class="col-md-6" id="details">
						  	<h1>' . $Name . '</h1>
						  	<h4 class="Bwarna">' . $Color . '</h4>
						  	<span class="harga"></span>
						  	<span class="harga2"></span>
						  	<h4 id="textharga" style="color: white;">Rp ' . nominal($Price) . '</h4>

							<h4 id="ukuran">Ukuran</h4>
							<select class="form-control pilihukuran">' . $Size . '
							</select>
							<h4 id="jumlah">Jumlah</h4>
							<input type="number" min="1" max="'.$Stock.'" class="form-control jumlah" value="1" id="jumlah_val" name="jumlah_val">
							<button type="button" class="btn btn-dark" id="tambah"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>
 							 Tambah Keranjang</button>
								</div>
								<div class="col-md-8">
									<div class="well well-lg"><div class="well well-small"><h3>Description</h3></div>' . $Desc . '</div>
								</div>
							</div>
						</div>';
			}
			echo '<script>$(\'#tambah\').on("click", function(){';
			if ($user['name'] != null) {
				echo 'if($(\'#jumlah_val\').val() <= '.$Stock.' && $(\'#jumlah_val\').val() > 0){
						$.ajax({
                        	type: "POST",
                            url: "'.base_url('Details/add_cart').'",
                            data: {
                                B_I: "'.$B_ID.'",
                                C_I: "'.$user['id'].'",
                                price: "'.$Price.'",
                                jumlah: $(\'#jumlah_val\').val()
                            },
                            success: function(data) {
                            	$(".modal-body").html("<h2>Berhasil Ditambahkan Ke Cart!</h2>");
                            	$("#myModal").modal("show");
                            },
                            error: function(XMLHttpRequest, textStatus, errorThrown) { 
						        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
						    } 
                        });
					}else {
						  $(".modal-body").html("<h2>Jumlah melebihi batas stock atau jumlah dibawah 1</h2>");
						  $("#myModal").modal("show");
					}';
			} else {
				echo ' $(".modal-body").html("<h2>Silahkan Login Terlebih Dahulu</h2>");
						  $("#myModal").modal("show");';
			}
				
			echo '});</script>';
			?>
</body>

</html>


<script>
	var ArrWarna = $('.Bwarna').text().split('_');
	if (ArrWarna.length == 1) {
		$.each(ArrWarna, function(i, d) {
			$('.Bwarna').html('<span class="warna clr' + i + ' ' + d + '"></span>')
		})
	} else {
		$.each(ArrWarna, function(i, d) {
			if (i == 0) {
				$('.Bwarna').html('<span class="warna clr' + i + ' ' + ArrWarna[i] + '"></span>')
			} else {
				$('.Bwarna').append('<span class="warna clr' + i + ' ' + ArrWarna[i] + '"></span>')
			}
		})
	}

	var ArrSize1 = $('.pilihukuran').text().split('_');
	if (ArrSize1.length == 1) {
		$.each(ArrSize1, function(i, d) {
			$('.pilihukuran').html('<option value="' + ArrSize1[i] + '">' + ArrSize1[i] + '</option>')
		})
	} else {
		$.each(ArrSize1, function(i, d) {
			if (i == 0) {
				$('.pilihukuran').html('<option value="' + ArrSize1[i] + '">' + ArrSize1[i] + '</option>')
			} else {
				$('.pilihukuran').append('<option value="' + ArrSize1[i] + '">' + ArrSize1[i] + '</option>')
			}
		})
	}



	$(".small-image").on({
		'click': function() {
			var $image = $(this).attr("src");
			$("#big-image").css('background', 'url("' + $image + '")');
			$("#big-image").css('background-repeat', 'no-repeat');
			$("#big-image").css('background-size', 'cover');
			$("#big-image").css('background-position', 'center');

			var $target = $("#big-image"),
				$cursorWindow = $("#cursor-window"),
				$coordsDisplay = $("#cursor-coord-disp");

			var zoomFactor = 2;

			// Copy the background image to the zoom window
			$cursorWindow.css('background-image', $target.css('background-image'));
			$cursorWindow.css('background-repeat', $target.css('background-repeat'));

			$target.mousemove(function(e) {
				var $targetPosition = $target.position();
				var cursX = e.pageX - $targetPosition.left - 300;
				var cursY = e.pageY - $targetPosition.top - 110;
				var imgX, imgY, imgW, imgH;

				if (0 <= cursX && cursX <= $target.outerWidth() && 0 <= cursY && cursY <= $target.outerHeight()) {
					$cursorWindow.css({
						'left': cursX - $cursorWindow.outerWidth() / 2,
						'top': cursY - $cursorWindow.outerHeight() / 2
					});
					$cursorWindow.show();
					$coordsDisplay.text("x: " + cursX.toFixed(0) + ", y: " + cursY.toFixed(0));

					imgX = -(cursX * zoomFactor) + $cursorWindow.innerWidth() / 2;
					imgY = -(cursY * zoomFactor) + $cursorWindow.innerHeight() / 2;

					imgW = $target.innerWidth() * zoomFactor;
					imgH = $target.innerHeight() * zoomFactor;

					// Change the position and size of the image in the zoom window
					// to show a magnified view of the image content under the cursor
					$cursorWindow.css('background-position', imgX.toFixed(0) + 'px ' + imgY.toFixed(0) + 'px');
					$cursorWindow.css('background-size', imgW.toFixed(0) + 'px ' + imgH.toFixed(0) + 'px');
				} else {
					$cursorWindow.hide();
					$coordsDisplay.text("");
				}
			});
		}
	});



	var $target = $("#big-image"),
		$cursorWindow = $("#cursor-window"),
		$coordsDisplay = $("#cursor-coord-disp");

	var zoomFactor = 2;

	// Copy the background image to the zoom window
	$cursorWindow.css('background-image', $target.css('background-image'));
	$cursorWindow.css('background-repeat', $target.css('background-repeat'));

	$target.mousemove(function(e) {
		var $targetPosition = $target.position();
		var cursX = e.pageX - $targetPosition.left - 300;
		var cursY = e.pageY - $targetPosition.top - 110;
		var imgX, imgY, imgW, imgH;

		if (0 <= cursX && cursX <= $target.outerWidth() && 0 <= cursY && cursY <= $target.outerHeight()) {
			$cursorWindow.css({
				'left': cursX - $cursorWindow.outerWidth() / 2,
				'top': cursY - $cursorWindow.outerHeight() / 2
			});
			$cursorWindow.show();
			$coordsDisplay.text("x: " + cursX.toFixed(0) + ", y: " + cursY.toFixed(0));

			imgX = -(cursX * zoomFactor) + $cursorWindow.innerWidth() / 2;
			imgY = -(cursY * zoomFactor) + $cursorWindow.innerHeight() / 2;

			imgW = $target.innerWidth() * zoomFactor;
			imgH = $target.innerHeight() * zoomFactor;

			// Change the position and size of the image in the zoom window
			// to show a magnified view of the image content under the cursor
			$cursorWindow.css('background-position', imgX.toFixed(0) + 'px ' + imgY.toFixed(0) + 'px');
			$cursorWindow.css('background-size', imgW.toFixed(0) + 'px ' + imgH.toFixed(0) + 'px');
		} else {
			$cursorWindow.hide();
			$coordsDisplay.text("");
		}
	});

</script>
<style>
	.warna {
		margin-right: 5px;
		padding-right: 20px;
		height: 19px;
		border: 1px solid #e0e0e0;
	}

	.RD {
		background-color: red;
	}

	.BLCK {
		background-color: black;
	}

	.WH {
		background-color: white;
	}

	.PR {
		background-color: purple;
	}

	.GR {
		background-color: green;
	}

	.BLU {
		background-color: blue;
	}

	.BR {
		background-color: brown;
	}

	.YL {
		background-color: yellow;
	}

	.well-small {
		background-color: white;
	}

	.well-lg {
		margin-top: 100px;
		margin-bottom: 100px;
	}

	.container {
		margin-top: 8%;
		margin-left: 20%;
	}

	#big-image {
		display: block;
		width: 407px;
		height: 400px;
		max-width: 407px;
		max-height: 400px;


	}

	.small-image {
		margin-right: 10px;
		display: inline-block;
		margin-top: 1%;
		width: 129.6px;
		height: 129.6px;
		max-width: 129.6px;
		max-height: 129.6px;
	}

	#details {
		margin-left: -25%;
		display: block;
	}

	.harga {
		padding-right: 30%;
		padding-bottom: 4%;
		height: 25px;
		width: 25px;
		max-width: 25px;
		background-color: black;
	}

	.harga2 {
		height: 20px;
		width: 20px;
		max-width: 20px;
		margin-left: -28%;
		margin-bottom: -3%;
		background-color: #fff;
		border-radius: 50%;
		display: inline-block;
	}

	#textharga {
		margin-top: -1.5%;
		margin-left: 9%;
	}

	#ukuran {
		margin-top: 15%;
	}

	.pilihukuran {
		width: 50%;
		height: 35px;
		font-size: 15px;
	}

	#jumlah {
		margin-top: 5%;
	}

	.jumlah {
		width: 20%;
	}

	#tambah {
		margin-top: 5%;
		background-color: black;
		color: white;
	}

	.small-image:hover {
		width: 20%;
		border-radius: 2px;
		box-sizing: border-box;
		box-shadow: 1px 5px 10px 3px #d3d3d3;
	}
</style>