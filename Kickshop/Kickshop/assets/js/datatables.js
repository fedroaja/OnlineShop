$(document).ready(function () {
	var t = $('#myTable').DataTable({
		"lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
	});

	t.on('order.dt search.dt', function () {
		t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
			cell.innerHTML = i + 1;
		});
	}).draw();

});

function pad(str, max) {
	str = str.toString();
	return str.length < max ? pad("0" + str, max) : str;
}
$('.adds').on('click', function () {

	[v1, v2] = $.cookie('LP').split('B');
	var tm = parseInt(v2);
	tm++;
	tm = "B" + pad(tm, 4);

	$('.add').append(
		'<form action="Admin1/tambah_barang" method="post" enctype="multipart/form-data">																							<h2>ID Product</h2>																																					<input name="Pid" class="form-control" type="text" value="' + tm + '" readonly></input><hr>																						<h2>Product Name</h2>																																				<input name="Pname" class="form-control" type="text" required></input><hr>																								<h2>Brand</h2>																																						<select name="Pbrand" class="form-control" required>																															<option id="Adidas" value="Adidas">Adidas</option>																													<option id="Nike" value="Nike">Nike</option>																														<option id="Yeezy" value="Yeezy">Yeezy</option>																														<option id="AirJordan" value="Air Jordan">Air Jordan</option>																										<option id="Reebok" value="Reebok">Reebok</option>																													<option id="Vans" value="Vans">Vans</option>																											</select><hr>																																								<h2>Color</h2>																																						<label id="WH" class="pilihwarna">																																		<input name="Pcolor[]" type="checkbox" value="WH" required="required">White</label>																					<label id="BLCK" class="pilihwarna">																																	<input name="Pcolor[]" type="checkbox" value="BLCK" required="required">Black</label>																			<label id="BLU" class="pilihwarna">																																		<input name="Pcolor[]" type="checkbox" value="BLU" required="required">Blue</label>																				<label id="YL" class="pilihwarna">																																		<input name="Pcolor[]" type="checkbox" value="YL" required="required">Yellow</label>																			<label id="PR" class="pilihwarna">																																		<input name="Pcolor[]" type="checkbox" value="PR" required="required">Purple</label>																			<label id="BR" class="pilihwarna">																																		<input name="Pcolor[]" type="checkbox" value="BR" required="required">Brown</label>																				<label id="RD" class="pilihwarna">																																		<input name="Pcolor[]" type="checkbox" value="RD" required="required">Red</label>																				<label id="GR" class="pilihwarna">																																		<input name="Pcolor[]" type="checkbox" value="GR" required="required">Green</label><hr>																			<h2>Category</h2>																																						<label id="MN" class="pilihwarna">																																		<input name="Pctg[]" type="checkbox" value="MN" required="required">MEN</label>																					<label id="WN" class="pilihwarna">																																		<input name="Pctg[]" type="checkbox" value="WN" required="required">WOMEN</label>																				<label id="CS" class="pilihwarna">																																		<input name="Pctg[]" type="checkbox" value="CS" required="required">CASUAL</label>																				<label id="SP" class="pilihwarna">																																		<input name="Pctg[]" type="checkbox" value="SP" required="required">SPORTS</label><hr>																			<h2>Size</h2>																																							<div class="dsize">																																						<label><input name="Psize[]" type="checkbox" value="36" required="required">36</label>																				<label><input name="Psize[]" type="checkbox" value="37" required="required">37</label>																				<label><input name="Psize[]" type="checkbox" value="38" required="required">38</label>																				<label><input name="Psize[]" type="checkbox" value="39" required="required">39</label>																				<label><input name="Psize[]" type="checkbox" value="40" required="required">40</label>																				<label><input name="Psize[]" type="checkbox" value="41" required="required">41</label>																				<label><input name="Psize[]" type="checkbox" value="42" required="required">42</label>																				<label><input name="Psize[]" type="checkbox" value="43" required="required">43</label>																				<label><input name="Psize[]" type="checkbox" value="44" required="required">44</label>																				<label><input name="Psize[]" type="checkbox" value="45" required="required">45</label>																				<label><input name="Psize[]" type="checkbox" value="46" required="required">46</label>																				<label><input name="Psize[]" type="checkbox" value="47" required="required">47</label>																				<label><input name="Psize[]" type="checkbox" value="48" required="required">48</label>																																																										</div><hr><h2>Price</h2>																																		<input name="Pprice" type="number" min="50000" max="4000000" class="form-control" required><hr>																		<h2>Stock</h2><input name="Pstock" class="form-control" type="number" min="0" max="9999" required><hr>																<h2>Description</h2><textarea name="Pdesc" class="form-control" rows="8" required></textarea><hr>																			<h2>Photo</h2><h4>Front</h4>																																	<img id="mphoto">																																							<input name="Pphoto1"  type="file" onchange="loadFile(event)" required><hr><h4>Left</h4>																	<img id="mphoto2">																																							<input name="Pphoto2"  type="file" onchange="loadFile2(event)" required><hr><h4>Right</h4>																			<img id="mphoto3">																																							<input name="Pphoto3"  type="file" onchange="loadFile3(event)" required>																				<hr><button id="editbtn" type="submit" class="form-control btn btn-warning">DONE</button>																																						</form>'
	);
	$(function () {
		var allRequiredCheckboxes = $(':checkbox[required]');
		var checkboxNames = [];

		for (var i = 0; i < allRequiredCheckboxes.length; ++i) {
			var name = allRequiredCheckboxes[i].name;
			checkboxNames.push(name);
		}

		checkboxNames = checkboxNames.reduce(function (p, c) {
			if (p.indexOf(c) < 0) p.push(c);
			return p;
		}, []);

		for (var i in checkboxNames) {
			! function () {
				var name = checkboxNames[i];
				var checkboxes = $('input[name="' + name + '"]');
				checkboxes.change(function () {
					if (checkboxes.is(':checked')) {
						checkboxes.removeAttr('required');
					} else {
						checkboxes.attr('required', 'required');
					}
				});
			}();
		}

	});


})

$('.edit').on('click', function () {
	var tid = $(this).closest('tr').children('#iid').text();
	var tname = $(this).closest('tr').children('#iname').text();
	var tsize = $(this).closest('tr').children('#isize').text();
	var tprice = $(this).closest('tr').children('#iprice').text();
	var tbrand = $(this).closest('tr').children('#ibrand').text();
	var tphoto = $(this).closest('tr').children('#iphoto').find('.p1').attr('src');
	var tphoto2 = $(this).closest('tr').children('#iphoto').find('.p2').attr('src');
	var tphoto3 = $(this).closest('tr').children('#iphoto').find('.p3').attr('src');
	var tcolor = $(this).closest('tr').children('#icolor').children('.clr').css('background-color');
	var tcolor2 = $(this).closest('tr').children('#icolor').children('.clr2').css('background-color');
	var tcolor3 = $(this).closest('tr').children('#icolor').children('.clr3').css('background-color');
	var tcolor4 = $(this).closest('tr').children('#icolor').children('.clr4').css('background-color');
	var tcolor5 = $(this).closest('tr').children('#icolor').children('.clr5').css('background-color');
	var tcolor6 = $(this).closest('tr').children('#icolor').children('.clr6').css('background-color');
	var tcolor7 = $(this).closest('tr').children('#icolor').children('.clr7').css('background-color');
	var tcolor8 = $(this).closest('tr').children('#icolor').children('.clr8').css('background-color');
	var tctg = $(this).closest('tr').children('#ictg').text();
	var tdesc = $(this).closest('tr').children('#idesc').text();
	var tstock = $(this).closest('tr').children('#istock').text();
	[tctg0, tctg1, tctg2, tctg3] = tctg.split(", ");
	var sArr = tsize.split(", ");




	$('.photo').append(
		'<form action="Admin1/update_barang" method="post" enctype="multipart/form-data">                                   																	<h2>ID Product</h2>																																						<input name="Pid" type="text" class="form-control" value="' + tid + '" readonly>																								<hr><h2>Product Name </h2>																																				<input name="Pname" id="mname" class="form-control" style="color:black;" type="text" value="' + tname + '"><hr>																	<h2>Brand</h2>																																							<select name="Pbrand" class="form-control brnd">																																<option id="Adidas" value="Adidas">Adidas</option>																													<option id="Nike" value="Nike">Nike</option>																														<option id="Yeezy" value="Yeezy">Yeezy</option>																														<option id="AirJordan" value="Air Jordan">Air Jordan</option>																										<option id="Reebok" value="Reebok">Reebok</option>																													<option id="Vans" value="Vans">Vans</option>																															</select><hr>																																					<h2>Color</h2>																																							<label id="WH" class="pilihwarna">																																		<input name="Pcolor[]" type="checkbox" value="WH" required>White</label>																						<label id="BLCK" class="pilihwarna">																																	<input name="Pcolor[]" type="checkbox" value="BLCK" required>Black</label>																						<label id="BLU" class="pilihwarna">																																		<input name="Pcolor[]" type="checkbox" value="BLU" required>Blue</label>																							<label id="YL" class="pilihwarna">																																		<input name="Pcolor[]" type="checkbox" value="YL" required>Yellow</label>																						<label id="PR" class="pilihwarna">																																		<input name="Pcolor[]" type="checkbox" value="PR" required>Purple</label>																						<label id="BR" class="pilihwarna">																																		<input name="Pcolor[]" type="checkbox" value="BR" required>Brown</label>																						<label id="RD" class="pilihwarna">																																		<input name="Pcolor[]" type="checkbox" value="RD" required>Red</label>																							<label id="GR" class="pilihwarna">																																		<input name="Pcolor[]" type="checkbox" value="GR" required>Green</label><hr>																					<h2>Category</h2>																																						<label id="MN" class="pilihwarna">																																		<input name="Pctg[]" type="checkbox" value="MN" required>MEN</label>																							<label id="WN" class="pilihwarna">																																		<input name="Pctg[]" type="checkbox" value="WN" required>WOMEN</label>																							<label id="CS" class="pilihwarna">																																		<input name="Pctg[]" type="checkbox" value="CS" required>CASUAL</label>																							<label id="SP" class="pilihwarna">																																		<input name="Pctg[]" type="checkbox" value="SP" required>SPORTS</label><hr>																					<h2>Size</h2>																																							<div class="dsize">																																						<label id="s36"><input  name="Psize[]" type="checkbox" value="36" required="required">36</label>																	<label id="s37"><input  name="Psize[]" type="checkbox" value="37" required="required">37</label>																	<label id="s38"><input  name="Psize[]" type="checkbox" value="38" required="required">38</label>																	<label id="s39"><input  name="Psize[]" type="checkbox" value="39" required="required">39</label>																	<label id="s40"><input  name="Psize[]" type="checkbox" value="40" required="required">40</label>																	<label id="s41"><input  name="Psize[]" type="checkbox" value="41" required="required">41</label>																	<label id="s42"><input  name="Psize[]" type="checkbox" value="42" required="required">42</label>																	<label id="s43"><input  name="Psize[]" type="checkbox" value="43" required="required">43</label>																	<label id="s44"><input  name="Psize[]" type="checkbox" value="44" required="required">44</label>																	<label id="s45"><input  name="Psize[]" type="checkbox" value="45" required="required">45</label>																	<label id="s46"><input  name="Psize[]" type="checkbox" value="46" required="required">46</label>																	<label id="s47"><input  name="Psize[]" type="checkbox" value="47" required="required">47</label>																	<label id="s48"><input  name="Psize[]" type="checkbox" value="48" required="required">48</label>																																																										</div><h2>Price</h2>																												<input name="Pprice" type="number" min="50000" max="4000000" class="form-control" value="' + tprice + '"><hr>													<h2>Stock</h2><input name="Pstock" class="form-control" type="number" min="0" max="9999" value="' + tstock + '" required>															<h2>Description</h2>																																				<textarea name="Pdesc" class="form-control" rows="8">' + tdesc + '</textarea><hr>																																				<h2>Photo</h2><h4>Front</h4>																																		<img id="mphoto" src="' + tphoto + '">																																	<input name="Pphoto1"  type="file" onchange="loadFile(event)" ><hr><h4>Left</h4>																		<img id="mphoto2"	src="' + tphoto2 + '">																																	<input name="Pphoto2"  type="file" onchange="loadFile2(event)" ><hr><h4>Right</h4>																		<img id="mphoto3"	src="' + tphoto3 + '">																																	<input name="Pphoto3"  type="file" onchange="loadFile3(event)" >																				<hr><button id="editbtn" type="submit" class="form-control btn btn-warning">DONE</button></form>'

	);

	$.each(sArr, function (i, d) {
		console.log(sArr[i]);
		if (sArr[i] == '36') {
			$('#s36').html('<label id="s36"><input name="Psize[]" type="checkbox" value="36" checked>36</input></label>');
		}
		if (sArr[i] == '37') {
			$('#s37').html('<label id="s37"><input name="Psize[]" type="checkbox" value="37" checked>37</input></label>');
		}
		if (sArr[i] == '38') {
			$('#s38').html('<label id="s38"><input name="Psize[]" type="checkbox" value="38" checked>38</input></label>');
		}
		if (sArr[i] == '39') {
			$('#s39').html('<label id="s39"><input name="Psize[]" type="checkbox" value="39" checked>39</input></label>');
		}
		if (sArr[i] == '40') {
			$('#s40').html('<label id="s40"><input name="Psize[]" type="checkbox" value="40" checked>40</input></label>');
		}
		if (sArr[i] == '41') {
			$('#s41').html('<label id="s41"><input name="Psize[]" type="checkbox" value="41" checked>41</input></label>');
		}
		if (sArr[i] == '42') {
			$('#s42').html('<label id="s42"><input name="Psize[]" type="checkbox" value="42" checked>42</input></label>');
		}
		if (sArr[i] == '43') {
			$('#s43').html('<label id="s43"><input name="Psize[]" type="checkbox" value="43" checked>43</input></label>');
		}
		if (sArr[i] == '44') {
			$('#s44').html('<label id="s44"><input name="Psize[]" type="checkbox" value="44" checked>44</input></label>');
		}
		if (sArr[i] == '45') {
			$('#s45').html('<label id="s45"><input name="Psize[]" type="checkbox" value="45" checked>45</input></label>');
		}
		if (sArr[i] == '46') {
			$('#s46').html('<label id="s46"><input name="Psize[]" type="checkbox" value="46" checked>46</input></label>');
		}
		if (sArr[i] == '47') {
			$('#s47').html('<label id="s47"><input name="Psize[]" type="checkbox" value="47" checked>47</input></label>');
		}
		if (sArr[i] == '48') {
			$('#s48').html('<label id="s48"><input name="Psize[]" type="checkbox" value="48" checked>48</input></label>');
		}

	})


	if (tbrand == "Vans") {
		$(".brnd").val('Vans').change();
	}
	if (tbrand == "Air Jordan") {
		$(".brnd").val('Air Jordan').change();
	}
	if (tbrand == "Nike") {
		$(".brnd").val('Nike').change();
	}
	if (tbrand == "Adidas") {
		$(".brnd").val('Adidas').change();
	}
	if (tbrand == "Yeezy") {
		$(".brnd").val('Yeezy').change();
	}
	if (tbrand == "Reebok") {
		$(".brnd").val('Reebok').change();
	}

	if (tcolor == 'rgb(0, 128, 0)') {
		$('#GR').html('<label id="GR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="GR" checked>Green</label>')
	}
	if (tcolor == 'rgb(255, 255, 255)') {
		$('#WH').html('<label id="WH" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="WH" checked>White</label>')
	}
	if (tcolor == 'rgb(0, 0, 0)') {
		$('#BLCK').html('<label id="BLCK" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BLCK" checked>Black</label>')
	}
	if (tcolor == 'rgb(255, 0, 0)') {
		$('#RD').html('<label id="RD" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="RD" checked>Red</label>')
	}

	if (tcolor == 'rgb(255, 255, 0)') {
		$('#YL').html('<label id="YL" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="YL" checked>Yellow</label>')
	}
	if (tcolor == 'rgb(0, 0, 255)') {
		$('#BLU').html('<label id="BLU" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BLU" checked>Blue</label>')
	}
	if (tcolor == 'rgb(128, 0, 128)') {
		$('#PR').html('<label id="PR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="PR" checked>Purple</label>')
	}
	if (tcolor == 'rgb(165, 42, 42)') {
		$('#BR').html('<label id="BR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BR" checked>Brown</label>')
	}



	if (tcolor2 == 'rgb(0, 128, 0)') {
		$('#GR').html('<label id="GR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="GR" checked>Green</label>')
	}
	if (tcolor2 == 'rgb(255, 255, 255)') {
		$('#WH').html('<label id="WH" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="WH" checked>White</label>')
	}
	if (tcolor2 == 'rgb(0, 0, 0)') {
		$('#BLCK').html('<label id="BLCK" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BLCK" checked>Black</label>')
	}
	if (tcolor2 == 'rgb(255, 0, 0)') {
		$('#RD').html('<label id="RD" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="RD" checked>Red</label>')
	}
	if (tcolor2 == 'rgb(255, 255, 0)') {
		$('#YL').html('<label id="YL" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="YL" checked>Yellow</label>')
	}
	if (tcolor2 == 'rgb(0, 0, 255)') {
		$('#BLU').html('<label id="BLU" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BLU" checked>Blue</label>')
	}
	if (tcolor2 == 'rgb(128, 0, 128)') {
		$('#PR').html('<label id="PR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="PR" checked>Purple</label>')
	}
	if (tcolor2 == 'rgb(165, 42, 42)') {
		$('#BR').html('<label id="BR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BR" checked>Brown</label>')
	}

	if (tcolor3 == 'rgb(0, 128, 0)') {
		$('#GR').html('<label id="GR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="GR" checked>Green</label>')
	}
	if (tcolor3 == 'rgb(255, 255, 255)') {
		$('#WH').html('<label id="WH" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="WH" checked>White</label>')
	}
	if (tcolor3 == 'rgb(0, 0, 0)') {
		$('#BLCK').html('<label id="BLCK" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BLCK" checked>Black</label>')
	}
	if (tcolor3 == 'rgb(255, 0, 0)') {
		$('#RD').html('<label id="RD" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="RD" checked>Red</label>')
	}
	if (tcolor3 == 'rgb(255, 255, 0)') {
		$('#YL').html('<label id="YL" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="YL" checked>Yellow</label>')
	}
	if (tcolor3 == 'rgb(0, 0, 255)') {
		$('#BLU').html('<label id="BLU" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BLU" checked>Blue</label>')
	}
	if (tcolor3 == 'rgb(128, 0, 128)') {
		$('#PR').html('<label id="PR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="PR" checked>Purple</label>')
	}
	if (tcolor3 == 'rgb(165, 42, 42)') {
		$('#BR').html('<label id="BR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BR" checked>Brown</label>')
	}



	if (tcolor4 == 'rgb(0, 128, 0)') {
		$('#GR').html('<label id="GR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="GR" checked>Green</label>')
	}
	if (tcolor4 == 'rgb(255, 255, 255)') {
		$('#WH').html('<label id="WH" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="WH" checked>White</label>')
	}
	if (tcolor4 == 'rgb(0, 0, 0)') {
		$('#BLCK').html('<label id="BLCK" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BLCK" checked>Black</label>')
	}
	if (tcolor4 == 'rgb(255, 0, 0)') {
		$('#RD').html('<label id="RD" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="RD" checked>Red</label>')
	}
	if (tcolor4 == 'rgb(255, 255, 0)') {
		$('#YL').html('<label id="YL" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="YL" checked>Yellow</label>')
	}
	if (tcolor4 == 'rgb(0, 0, 255)') {
		$('#BLU').html('<label id="BLU" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BLU" checked>Blue</label>')
	}
	if (tcolor4 == 'rgb(128, 0, 128)') {
		$('#PR').html('<label id="PR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="PR" checked>Purple</label>')
	}
	if (tcolor4 == 'rgb(165, 42, 42)') {
		$('#BR').html('<label id="BR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BR" checked>Brown</label>')
	}


	if (tcolor5 == 'rgb(0, 128, 0)') {
		$('#GR').html('<label id="GR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="GR" checked>Green</label>')
	}
	if (tcolor5 == 'rgb(255, 255, 255)') {
		$('#WH').html('<label id="WH" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="WH" checked>White</label>')
	}
	if (tcolor5 == 'rgb(0, 0, 0)') {
		$('#BLCK').html('<label id="BLCK" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BLCK" checked>Black</label>')
	}
	if (tcolor5 == 'rgb(255, 0, 0)') {
		$('#RD').html('<label id="RD" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="RD" checked>Red</label>')
	}
	if (tcolor5 == 'rgb(255, 255, 0)') {
		$('#YL').html('<label id="YL" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="YL" checked>Yellow</label>')
	}
	if (tcolor5 == 'rgb(0, 0, 255)') {
		$('#BLU').html('<label id="BLU" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BLU" checked>Blue</label>')
	}
	if (tcolor5 == 'rgb(128, 0, 128)') {
		$('#PR').html('<label id="PR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="PR" checked>Purple</label>')
	}
	if (tcolor5 == 'rgb(165, 42, 42)') {
		$('#BR').html('<label id="BR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BR" checked>Brown</label>')
	}


	if (tcolor6 == 'rgb(0, 128, 0)') {
		$('#GR').html('<label id="GR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="GR" checked>Green</label>')
	}
	if (tcolor6 == 'rgb(255, 255, 255)') {
		$('#WH').html('<label id="WH" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="WH" checked>White</label>')
	}
	if (tcolor6 == 'rgb(0, 0, 0)') {
		$('#BLCK').html('<label id="BLCK" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BLCK" checked>Black</label>')
	}
	if (tcolor6 == 'rgb(255, 0, 0)') {
		$('#RD').html('<label id="RD" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="RD" checked>Red</label>')
	}
	if (tcolor6 == 'rgb(255, 255, 0)') {
		$('#YL').html('<label id="YL" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="YL" checked>Yellow</label>')
	}
	if (tcolor6 == 'rgb(0, 0, 255)') {
		$('#BLU').html('<label id="BLU" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BLU" checked>Blue</label>')
	}
	if (tcolor6 == 'rgb(128, 0, 128)') {
		$('#PR').html('<label id="PR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="PR" checked>Purple</label>')
	}
	if (tcolor6 == 'rgb(165, 42, 42)') {
		$('#BR').html('<label id="BR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BR" checked>Brown</label>')
	}


	if (tcolor7 == 'rgb(0, 128, 0)') {
		$('#GR').html('<label id="GR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="GR" checked>Green</label>')
	}
	if (tcolor7 == 'rgb(255, 255, 255)') {
		$('#WH').html('<label id="WH" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="WH" checked>White</label>')
	}
	if (tcolor7 == 'rgb(0, 0, 0)') {
		$('#BLCK').html('<label id="BLCK" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BLCK" checked>Black</label>')
	}
	if (tcolor7 == 'rgb(255, 0, 0)') {
		$('#RD').html('<label id="RD" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="RD" checked>Red</label>')
	}
	if (tcolor7 == 'rgb(255, 255, 0)') {
		$('#YL').html('<label id="YL" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="YL" checked>Yellow</label>')
	}
	if (tcolor7 == 'rgb(0, 0, 255)') {
		$('#BLU').html('<label id="BL" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BLU" checked>Blue</label>')
	}
	if (tcolor7 == 'rgb(128, 0, 128)') {
		$('#PR').html('<label id="PR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="PR" checked>Purple</label>')
	}
	if (tcolor7 == 'rgb(165, 42, 42)') {
		$('#BR').html('<label id="BR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BR" checked>Brown</label>')
	}


	if (tcolor8 == 'rgb(0, 128, 0)') {
		$('#GR').html('<label id="GR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="GR" checked>Green</label>')
	}
	if (tcolor8 == 'rgb(255, 255, 255)') {
		$('#WH').html('<label id="WH" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="WH" checked>White</label>')
	}
	if (tcolor8 == 'rgb(0, 0, 0)') {
		$('#BLCK').html('<label id="BLCK" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BLCK" checked>Black</label>')
	}
	if (tcolor8 == 'rgb(255, 0, 0)') {
		$('#RD').html('<label id="RD" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="RD" checked>Red</label>')
	}
	if (tcolor8 == 'rgb(255, 255, 0)') {
		$('#YL').html('<label id="YL" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="YL" checked>Yellow</label>')
	}
	if (tcolor8 == 'rgb(0, 0, 255)') {
		$('#BLU').html('<label id="BL" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BLU" checked>Blue</label>')
	}
	if (tcolor8 == 'rgb(128, 0, 128)') {
		$('#PR').html('<label id="PR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="PR" checked>Purple</label>')
	}
	if (tcolor8 == 'rgb(165, 42, 42)') {
		$('#BR').html('<label id="BR" class="pilihwarna"><input name="Pcolor[]" type="checkbox" value="BR" checked>Brown</label>')
	}


	if (tctg0 == 'MEN') {
		$('#MN').html('<label class="pilihwarna"><input name="Pctg[]" type="checkbox" value="MN" checked>MEN</label>');
	}
	if (tctg0 == 'WOMEN') {
		$('#WN').html('<label class="pilihwarna"><input name="Pctg[]" type="checkbox" value="WN" checked>WOMEN</label>');
	}
	if (tctg0 == 'CASUAL') {
		$('#CS').html('<label class="pilihwarna"><input name="Pctg[]" type="checkbox" value="CS" checked>CASUAL</label>');
	}
	if (tctg0 == 'SPORTS') {
		$('#SP').html('<label class="pilihwarna"><input name="Pctg[]" type="checkbox" value="SP" checked>SPORTS</label>');
	}

	if (tctg1 == 'MEN') {
		$('#MN').html('<label class="pilihwarna"><input name="Pctg[]" type="checkbox" value="MN" checked>MEN</label>');
	}
	if (tctg1 == 'WOMEN') {
		$('#WN').html('<label class="pilihwarna"><input name="Pctg[]" type="checkbox" value="WN" checked>WOMEN</label>');
	}
	if (tctg1 == 'CASUAL') {
		$('#CS').html('<label class="pilihwarna"><input name="Pctg[]" type="checkbox" value="CS" checked>CASUAL</label>');
	}
	if (tctg1 == 'SPORTS') {
		$('#SP').html('<label class="pilihwarna"><input name="Pctg[]" type="checkbox" value="SP" checked>SPORTS</label>');
	}
	if (tctg2 == 'MEN') {
		$('#MN').html('<label class="pilihwarna"><input name="Pctg[]" type="checkbox" value="MN" checked>MEN</label>');
	}
	if (tctg2 == 'WOMEN') {
		$('#WN').html('<label class="pilihwarna"><input name="Pctg[]" type="checkbox" value="WN" checked>WOMEN</label>');
	}
	if (tctg2 == 'CASUAL') {
		$('#CS').html('<label class="pilihwarna"><input name="Pctg[]" type="checkbox" value="CS" checked>CASUAL</label>');
	}
	if (tctg2 == 'SPORTS') {
		$('#SP').html('<label class="pilihwarna"><input name="Pctg[]" type="checkbox" value="SP" checked>SPORTS</label>');
	}
	if (tctg3 == 'MEN') {
		$('#MN').html('<label class="pilihwarna"><input name="Pctg[]" type="checkbox" value="MN" checked>MEN</label>');
	}
	if (tctg3 == 'WOMEN') {
		$('#WN').html('<label class="pilihwarna"><input name="Pctg[]" type="checkbox" value="WN" checked>WOMEN</label>');
	}
	if (tctg3 == 'CASUAL') {
		$('#CS').html('<label class="pilihwarna"><input name="Pctg[]" type="checkbox" value="CS" checked>CASUAL</label>');
	}
	if (tctg3 == 'SPORTS') {
		$('#SP').html('<label class="pilihwarna"><input name="Pctg[]" type="checkbox" value="SP" checked>SPORTS</label>');
	}
	$(function () {
		var allRequiredCheckboxes = $(':checkbox[required]');
		var checkboxNames = [];

		for (var i = 0; i < allRequiredCheckboxes.length; ++i) {
			var name = allRequiredCheckboxes[i].name;
			checkboxNames.push(name);
		}

		checkboxNames = checkboxNames.reduce(function (p, c) {
			if (p.indexOf(c) < 0) p.push(c);
			return p;
		}, []);

		for (var i in checkboxNames) {
			! function () {
				var name = checkboxNames[i];
				var checkboxes = $('input[name="' + name + '"]');
				if (checkboxes.is(':checked')) {
					checkboxes.removeAttr('required');
				} else {
					checkboxes.attr('required', 'required');
				}
				checkboxes.change(function () {
					if (checkboxes.is(':checked')) {
						checkboxes.removeAttr('required');
					} else {
						checkboxes.attr('required', 'required');
					}
				});
			}();
		}

	});



})




$('#photoModal,#addData').on('hidden.bs.modal', function () {
	$('form').remove();

})
$('.hapus').on('click', function () {
	var hps = $(this).attr('id');
	window.location.href = "admin1/delete_barang/" + hps;
})

var loadFile = function (event) {
	var reader = new FileReader();
	reader.onload = function () {
		var output = document.getElementById('mphoto');
		output.src = reader.result;
	};
	reader.readAsDataURL(event.target.files[0]);
};
var loadFile2 = function (event) {
	var reader = new FileReader();
	reader.onload = function () {
		var output = document.getElementById('mphoto2');
		output.src = reader.result;
	};
	reader.readAsDataURL(event.target.files[0]);
};
var loadFile3 = function (event) {
	var reader = new FileReader();
	reader.onload = function () {
		var output = document.getElementById('mphoto3');
		output.src = reader.result;
	};
	reader.readAsDataURL(event.target.files[0]);
};
$('#editbtn').on('click', function () {
	alert($_POST['Pid']);
})
