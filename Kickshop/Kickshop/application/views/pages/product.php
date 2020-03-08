<!DOCTYPE html>
<html>

<head>
    <?php
    echo $js2;
    echo $css;
    ?>
     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <title><?= $title ?></title>
</head>

<body>
    <?php echo $header; ?>
    <div class="container">
        <div style="margin-left: 300px;">
            <h3 style="display: inline-block;">Result for </h3>
            <h3 id="res" style="display: inline-block;"><?php echo $Psearch; ?></h3>
            <h3 id="genre" hidden><?php echo $Pcategory; ?>
        </div>
        <div class="row">
            <div class="col-md-2" style="position: fixed; padding-right: 75px;">
                <div class="filter" style="padding-left: 15px;">
                    <strong>Color</strong><br><br>
                    <label class="kotak">
                        <input type="checkbox" name="WH" class="CLR" value="WH">
                        <span class="cek"></span>
                    </label>
                    <label class="kotak">
                        <input type="checkbox" name="BLCK" class="CLR" value="BLCK">
                        <span class="cek2"></span>
                    </label>
                    <label class="kotak">
                        <input type="checkbox" name="BLU" class="CLR" value="BLU">
                        <span class="cek3"></span>
                    </label>
                    <label class="kotak">
                        <input type="checkbox" name="RD" class="CLR" value="RD">
                        <span class="cek4"></span>
                    </label>
                    <label class="kotak">
                        <input type="checkbox" name="GR" class="CLR" value="GR">
                        <span class="cek5"></span>
                    </label>
                    <label class="kotak">
                        <input type="checkbox" name="YL" class="CLR" value="YL">
                        <span class="cek6"></span>
                    </label>
                    <label class="kotak">
                        <input type="checkbox" name="PR" class="CLR" value="PR">
                        <span class="cek7"></span>
                    </label>
                    <label class="kotak">
                        <input type="checkbox" name="BR" class="CLR" value="BR">
                        <span class="cek8"></span>
                    </label>
                </div>
                <div class="filter">
                    <strong>Harga</strong>
                    <br>
                    <p>
                    </p>

                    <div id="slider-range"></div>
                    <label for="amount">Min - Max</label>
                    <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                    <input type="hidden" name="minPrice" id="minPrice">
                    <input type="hidden" name="maxPrice" id="maxPrice">
                </div>
                <div class="filter">
                    <strong>Brand</strong>
                    <br><br>
                    <div class="brand">
                        <span id="Nike"><input type="checkbox" class="BRND" name="Nike" value="Nike">Nike</span>
                        <span id="Adidas"><input type="checkbox" class="BRND" name="Adidas" value="Adidas">Adidas</span>
                        <span id="Yeezy"><input type="checkbox" class="BRND" name="Yeezy" value="Yeezy">Yeezy</span>
                        <span id="Vans"><input type="checkbox" class="BRND" name="Vans" value="Vans">Vans</span>
                        <span id="Reebok"><input type="checkbox" class="BRND" name="Reebok" value="Reebok">Reebok</span>
                        <span id="Air_Jordan"><input type="checkbox" class="BRND" name="Air Jordan" value="Air Jordan">Air Jordan</span>
                    </div>
                </div>
            </div>
            <script>
                var flag = 0;
                var temp = $('#res').text();
                if (temp == "Nike") {
                    $('#Nike').html('<input type="checkbox" class="BRND"  name="Nike" value="Nike" checked>Nike');
                    flag = 1;
                }
                if (temp == "Adidas") {
                    $('#Adidas').html('<input type="checkbox" class="BRND"  name="Adidas" value="Adidas" checked>Adidas');
                    flag = 1;
                }
                if (temp == "Yeezy") {
                    $('#Yeezy').html('<input type="checkbox" class="BRND"  name="Yeezy" value="Yeezy" checked>Yeezy');
                    flag = 1;
                }
                if (temp == "Vans") {
                    $('#Vans').html('<input type="checkbox" class="BRND"  name="Vans" value="Vans" checked>Vans');
                    flag = 1;
                }
                if (temp == "Reebok") {
                    $('#Reebok').html('<input type="checkbox" class="BRND"  name="Reebok" value="Reebok" checked>Reebok');
                    flag = 1;
                }
                if (temp == "Air Jordan") {
                    $('#Air_Jordan').html('<input type="checkbox" class="BRND"  name="Air Jordan" value="Air Jordan" checked>Air Jordan');
                    flag = 1;
                }
            </script>
            <div class="col-lg-8 Lproduct">
                <?php

                $x = 0;
                foreach ($product as $row) {
                    $ID = $row['ID_Barang'];
                    $Brand = $row['B_Brand'];
                    $Name = $row['B_name'];
                    $Color = $row['B_color'];
                    $Poto = $row['B_photo'];
                    $Category = $row['B_category'];
                    $Price = $row['B_price'];

                    echo '<div class="card flex-fill produk" id="' . $ID . '">';
                    echo '<img src="assets/foto/' . $Poto . '" class="gambar"><br><br>';
                    echo '<div class="card-body">';
                    echo $Name . '<br><br>';
                    echo "<div id='icolor' class='color" . $x . "'>" . $Color . "</div>";
                    echo "Rp " . nominal($Price);
                    echo "<br><br><br>";
                    echo "</div>";
                    echo "</div>";

                    ?>
                    <script>
                        var x = 0;
                        $(document).ready(function() {
                            var tmp = $(".color" + x).text();

                            [clr1, clr2, clr3, clr4, clr5, clr6, clr7, clr8] = tmp.split('_');
                            if (clr1 == "BLCK") {
                                $(".color" + x).html('<span class="clr warna' + x + '"></span>');
                                $(".warna" + x).css("background-color", "black");
                            }
                            if (clr1 == "RD") {
                                $(".color" + x).html('<span class="clr warna' + x + '"></span>');
                                $(".warna" + x).css("background-color", "red");
                            }
                            if (clr1 == "WH") {
                                $(".color" + x).html('<span class="clr warna' + x + '"></span>');
                                $(".warna" + x).css("background-color", "white");
                            }
                            if (clr1 == "GR") {
                                $(".color" + x).html('<span class="clr warna' + x + '"></span>');
                                $(".warna" + x).css("background-color", "green");
                            }
                            if (clr1 == "BLU") {
                                $(".color" + x).html('<span class="clr warna' + x + '"></span>');
                                $(".warna" + x).css("background-color", "blue");
                            }
                            if (clr1 == "YL") {
                                $(".color" + x).html('<span class="clr warna' + x + '"></span>');
                                $(".warna" + x).css("background-color", "yellow");
                            }
                            if (clr1 == "PR") {
                                $(".color" + x).html('<span class="clr warna' + x + '"></span>');
                                $(".warna" + x).css("background-color", "purple");
                            }
                            if (clr1 == "BR") {
                                $(".color" + x).html('<span class="clr warna' + x + '"></span>');
                                $(".warna" + x).css("background-color", "brown");
                            }

                            if (clr2 == "BLCK") {
                                $('<span class="clr2 2warna' + x + '"></span>').appendTo(".color" + x);
                                $(".2warna" + x).css("background-color", "black");
                                $(".2warna" + x).css("margin-left", "5px");
                            }
                            if (clr2 == "RD") {
                                $('<span class="clr2 2warna' + x + '"></span>').appendTo(".color" + x);
                                $(".2warna" + x).css("background-color", "red");
                                $(".2warna" + x).css("margin-left", "5px");
                            }
                            if (clr2 == "WH") {
                                $('<span class="clr2 2warna' + x + '"></span>').appendTo(".color" + x);
                                $(".2warna" + x).css("background-color", "white");
                                $(".2warna" + x).css("margin-left", "5px");
                            }
                            if (clr2 == "GR") {
                                $('<span class="clr2 2warna' + x + '"></span>').appendTo(".color" + x);
                                $(".2warna" + x).css("background-color", "green");
                                $(".2warna" + x).css("margin-left", "5px");
                            }
                            if (clr2 == "BLU") {
                                $('<span class="clr2 2warna' + x + '"></span>').appendTo(".color" + x);
                                $(".2warna" + x).css("background-color", "blue");
                                $(".2warna" + x).css("margin-left", "5px");
                            }
                            if (clr2 == "YL") {
                                $('<span class="clr2 2warna' + x + '"></span>').appendTo(".color" + x);
                                $(".2warna" + x).css("background-color", "yellow");
                                $(".2warna" + x).css("margin-left", "5px");
                            }
                            if (clr2 == "PR") {
                                $('<span class="clr2 2warna' + x + '"></span>').appendTo(".color" + x);
                                $(".2warna" + x).css("background-color", "purple");
                                $(".2warna" + x).css("margin-left", "5px");
                            }
                            if (clr2 == "BR") {
                                $('<span class="clr2 2warna' + x + '"></span>').appendTo(".color" + x);
                                $(".2warna" + x).css("background-color", "brown");
                                $(".2warna" + x).css("margin-left", "5px");
                            }

                            if (clr3 == "BLCK") {
                                $('<span class="clr3 3warna' + x + '"></span>').appendTo(".color" + x);
                                $(".3warna" + x).css("background-color", "black");
                                $(".3warna" + x).css("margin-left", "5px");
                            }
                            if (clr3 == "RD") {
                                $('<span class="clr3 3warna' + x + '"></span>').appendTo(".color" + x);
                                $(".3warna" + x).css("background-color", "red");
                                $(".3warna" + x).css("margin-left", "5px");
                            }
                            if (clr3 == "WH") {
                                $('<span class="clr3 3warna' + x + '"></span>').appendTo(".color" + x);
                                $(".3warna" + x).css("background-color", "white");
                                $(".3warna" + x).css("margin-left", "5px");
                            }
                            if (clr3 == "GR") {
                                $('<span class="clr3 3warna' + x + '"></span>').appendTo(".color" + x);
                                $(".3warna" + x).css("background-color", "green");
                                $(".3warna" + x).css("margin-left", "5px");
                            }
                            if (clr3 == "BLU") {
                                $('<span class="clr3 3warna' + x + '"></span>').appendTo(".color" + x);
                                $(".3warna" + x).css("background-color", "blue");
                                $(".3warna" + x).css("margin-left", "5px");
                            }
                            if (clr3 == "YL") {
                                $('<span class="clr3 3warna' + x + '"></span>').appendTo(".color" + x);
                                $(".3warna" + x).css("background-color", "yellow");
                                $(".3warna" + x).css("margin-left", "5px");
                            }
                            if (clr3 == "PR") {
                                $('<span class="clr3 3warna' + x + '"></span>').appendTo(".color" + x);
                                $(".3warna" + x).css("background-color", "purple");
                                $(".3warna" + x).css("margin-left", "5px");
                            }
                            if (clr3 == "BR") {
                                $('<span class="clr3 3warna' + x + '"></span>').appendTo(".color" + x);
                                $(".3warna" + x).css("background-color", "brown");
                                $(".3warna" + x).css("margin-left", "5px");
                            }

                            if (clr4 == "BLCK") {
                                $('<span class="clr4 4warna' + x + '"></span>').appendTo(".color" + x);
                                $(".4warna" + x).css("background-color", "black");
                                $(".4warna" + x).css("margin-left", "5px");
                            }
                            if (clr4 == "RD") {
                                $('<span class="clr4 4warna' + x + '"></span>').appendTo(".color" + x);
                                $(".4warna" + x).css("background-color", "red");
                                $(".4warna" + x).css("margin-left", "5px");
                            }
                            if (clr4 == "WH") {
                                $('<span class="clr4 4warna' + x + '"></span>').appendTo(".color" + x);
                                $(".4warna" + x).css("background-color", "white");
                                $(".4warna" + x).css("margin-left", "5px");
                            }
                            if (clr4 == "GR") {
                                $('<span class="clr4 4warna' + x + '"></span>').appendTo(".color" + x);
                                $(".4warna" + x).css("background-color", "green");
                                $(".4warna" + x).css("margin-left", "5px");
                            }
                            if (clr4 == "BLU") {
                                $('<span class="clr4 4warna' + x + '"></span>').appendTo(".color" + x);
                                $(".4warna" + x).css("background-color", "blue");
                                $(".4warna" + x).css("margin-left", "5px");
                            }
                            if (clr4 == "YL") {
                                $('<span class="clr4 4warna' + x + '"></span>').appendTo(".color" + x);
                                $(".4warna" + x).css("background-color", "yellow");
                                $(".4warna" + x).css("margin-left", "5px");
                            }
                            if (clr4 == "PR") {
                                $('<span class="clr4 4warna' + x + '"></span>').appendTo(".color" + x);
                                $(".4warna" + x).css("background-color", "purple");
                                $(".4warna" + x).css("margin-left", "5px");
                            }
                            if (clr4 == "BR") {
                                $('<span class="clr4 4warna' + x + '"></span>').appendTo(".color" + x);
                                $(".4warna" + x).css("background-color", "brown");
                                $(".4warna" + x).css("margin-left", "5px");
                            }

                            if (clr5 == "BLCK") {
                                $('<span class="clr5 5warna' + x + '"></span>').appendTo(".color" + x);
                                $(".5warna" + x).css("background-color", "black");
                                $(".5warna" + x).css("margin-left", "5px");
                            }
                            if (clr5 == "RD") {
                                $('<span class="clr5 5warna' + x + '"></span>').appendTo(".color" + x);
                                $(".5warna" + x).css("background-color", "red");
                                $(".5warna" + x).css("margin-left", "5px");
                            }
                            if (clr5 == "WH") {
                                $('<span class="clr5 5warna' + x + '"></span>').appendTo(".color" + x);
                                $(".5warna" + x).css("background-color", "white");
                                $(".5warna" + x).css("margin-left", "5px");
                            }
                            if (clr5 == "GR") {
                                $('<span class="clr5 5warna' + x + '"></span>').appendTo(".color" + x);
                                $(".5warna" + x).css("background-color", "green");
                                $(".5warna" + x).css("margin-left", "5px");
                            }
                            if (clr5 == "BLU") {
                                $('<span class="clr5 5warna' + x + '"></span>').appendTo(".color" + x);
                                $(".5warna" + x).css("background-color", "blue");
                                $(".5warna" + x).css("margin-left", "5px");
                            }
                            if (clr5 == "YL") {
                                $('<span class="clr5 5warna' + x + '"></span>').appendTo(".color" + x);
                                $(".5warna" + x).css("background-color", "yellow");
                                $(".5warna" + x).css("margin-left", "5px");
                            }
                            if (clr5 == "PR") {
                                $('<span class="clr5 5warna' + x + '"></span>').appendTo(".color" + x);
                                $(".5warna" + x).css("background-color", "purple");
                                $(".5warna" + x).css("margin-left", "5px");
                            }
                            if (clr5 == "BR") {
                                $('<span class="clr5 5warna' + x + '"></span>').appendTo(".color" + x);
                                $(".5warna" + x).css("background-color", "brown");
                                $(".5warna" + x).css("margin-left", "5px");
                            }

                            if (clr6 == "BLCK") {
                                $('<span class="clr6 6warna' + x + '"></span>').appendTo(".color" + x);
                                $(".6warna" + x).css("background-color", "black");
                                $(".6warna" + x).css("margin-left", "5px");
                            }
                            if (clr6 == "RD") {
                                $('<span class="clr6 6warna' + x + '"></span>').appendTo(".color" + x);
                                $(".6warna" + x).css("background-color", "red");
                                $(".6warna" + x).css("margin-left", "5px");
                            }
                            if (clr6 == "WH") {
                                $('<span class="clr6 6warna' + x + '"></span>').appendTo(".color" + x);
                                $(".6warna" + x).css("background-color", "white");
                                $(".6warna" + x).css("margin-left", "5px");
                            }
                            if (clr6 == "GR") {
                                $('<span class="clr6 6warna' + x + '"></span>').appendTo(".color" + x);
                                $(".6warna" + x).css("background-color", "green");
                                $(".6warna" + x).css("margin-left", "5px");
                            }
                            if (clr6 == "BLU") {
                                $('<span class="clr6 6warna' + x + '"></span>').appendTo(".color" + x);
                                $(".6warna" + x).css("background-color", "blue");
                                $(".6warna" + x).css("margin-left", "5px");
                            }
                            if (clr6 == "YL") {
                                $('<span class="clr6 6warna' + x + '"></span>').appendTo(".color" + x);
                                $(".6warna" + x).css("background-color", "yellow");
                                $(".6warna" + x).css("margin-left", "5px");
                            }
                            if (clr6 == "PR") {
                                $('<span class="clr6 6warna' + x + '"></span>').appendTo(".color" + x);
                                $(".6warna" + x).css("background-color", "purple");
                                $(".6warna" + x).css("margin-left", "5px");
                            }
                            if (clr6 == "BR") {
                                $('<span class="clr6 6warna' + x + '"></span>').appendTo(".color" + x);
                                $(".6warna" + x).css("background-color", "brown");
                                $(".6warna" + x).css("margin-left", "5px");
                            }

                            if (clr7 == "BLCK") {
                                $('<span class="clr7 7warna' + x + '"></span>').appendTo(".color" + x);
                                $(".7warna" + x).css("background-color", "black");
                                $(".7warna" + x).css("margin-left", "5px");
                            }
                            if (clr7 == "RD") {
                                $('<span class="clr7 7warna' + x + '"></span>').appendTo(".color" + x);
                                $(".7warna" + x).css("background-color", "red");
                                $(".7warna" + x).css("margin-left", "5px");
                            }
                            if (clr7 == "WH") {
                                $('<span class="clr7 7warna' + x + '"></span>').appendTo(".color" + x);
                                $(".7warna" + x).css("background-color", "white");
                                $(".7warna" + x).css("margin-left", "5px");
                            }
                            if (clr7 == "GR") {
                                $('<span class="clr7 7warna' + x + '"></span>').appendTo(".color" + x);
                                $(".7warna" + x).css("background-color", "green");
                                $(".7warna" + x).css("margin-left", "5px");
                            }
                            if (clr7 == "BLU") {
                                $('<span class="clr7 7warna' + x + '"></span>').appendTo(".color" + x);
                                $(".7warna" + x).css("background-color", "blue");
                                $(".7warna" + x).css("margin-left", "5px");
                            }
                            if (clr7 == "YL") {
                                $('<span class="clr7 7warna' + x + '"></span>').appendTo(".color" + x);
                                $(".7warna" + x).css("background-color", "yellow");
                                $(".7warna" + x).css("margin-left", "5px");
                            }
                            if (clr7 == "PR") {
                                $('<span class="clr7 7warna' + x + '"></span>').appendTo(".color" + x);
                                $(".7warna" + x).css("background-color", "purple");
                                $(".7warna" + x).css("margin-left", "5px");
                            }
                            if (clr7 == "BR") {
                                $('<span class="clr7 7warna' + x + '"></span>').appendTo(".color" + x);
                                $(".7warna" + x).css("background-color", "brown");
                                $(".7warna" + x).css("margin-left", "5px");
                            }

                            if (clr8 == "BLCK") {
                                $('<span class="clr8 8warna' + x + '"></span>').appendTo(".color" + x);
                                $(".8warna" + x).css("background-color", "black");
                                $(".8warna" + x).css("margin-left", "5px");
                            }
                            if (clr8 == "RD") {
                                $('<span class="clr8 8warna' + x + '"></span>').appendTo(".color" + x);
                                $(".8warna" + x).css("background-color", "red");
                                $(".8warna" + x).css("margin-left", "5px");
                            }
                            if (clr8 == "WH") {
                                $('<span class="clr8 8warna' + x + '"></span>').appendTo(".color" + x);
                                $(".8warna" + x).css("background-color", "white");
                                $(".8warna" + x).css("margin-left", "5px");
                            }
                            if (clr8 == "GR") {
                                $('<span class="clr8 8warna' + x + '"></span>').appendTo(".color" + x);
                                $(".8warna" + x).css("background-color", "green");
                                $(".8warna" + x).css("margin-left", "5px");
                            }
                            if (clr8 == "BLU") {
                                $('<span class="clr8 8warna' + x + '"></span>').appendTo(".color" + x);
                                $(".8warna" + x).css("background-color", "blue");
                                $(".8warna" + x).css("margin-left", "5px");
                            }
                            if (clr8 == "YL") {
                                $('<span class="clr8 8warna' + x + '"></span>').appendTo(".color" + x);
                                $(".8warna" + x).css("background-color", "yellow");
                                $(".8warna" + x).css("margin-left", "5px");
                            }
                            if (clr8 == "PR") {
                                $('<span class="clr8 8warna' + x + '"></span>').appendTo(".color" + x);
                                $(".8warna" + x).css("background-color", "purple");
                                $(".8warna" + x).css("margin-left", "5px");
                            }
                            if (clr8 == "BR") {
                                $('<span class="clr8 8warna' + x + '"></span>').appendTo(".color" + x);
                                $(".8warna" + x).css("background-color", "brown");
                                $(".8warna" + x).css("margin-left", "5px");
                            }

                            x++;
                        })
                    </script>
                    <?php
                    $x++;
                }
                ?>



            </div>
        </div>
    </div>

    <style>
        .Lproduct {
            margin-left: 300px;
            overflow: auto;
            height: 600px;
        }

        .Lproduct::-webkit-scrollbar {
            display: none;
        }

        .gambar {
            margin-left: 5px;
            width: 230px;
            height: 250px;
            max-height: 250px;
            max-width: 230px;
        }

        .clr,
        .clr2,
        .clr3,
        .clr4,
        .clr5,
        .clr6,
        .clr7,
        .clr8 {
            padding-right: 10%;
            height: 15px;
            padding-right: 15px;
            border: 1px solid #e0e0e0;
        }

        .card-body {
            display: block;
            margin-left: 10px;
        }

        .warna {
            padding-right: 10%;
            height: 15px;
            padding-right: 15px;
            background-color: red;
            border: 1px solid #e0e0e0;
        }

        .card:hover {
            width: 32%;
            border-radius: 2px;
            box-sizing: border-box;
            box-shadow: 1px 5px 10px 3px #d3d3d3;
            cursor: pointer;
        }

        .card {
            display: inline-block;
            margin-bottom: 10px;
            margin-left: 5px;
            +
        }

        .brand {
            height: 110px;
            overflow: auto;
        }

        .brand>span {
            display: block;
        }

        .container {
            margin-left: 15%;
            margin-top: 7%;
        }

        .filter {
            border: 1px solid #e0e0e0;
            padding-left: 5%;
            padding-right: 5%;
        }

        hr {
            border: 1px solid #e0e0e0;

        }

        .kotak {
            display: inline-block;
            position: relative;
            padding-left: 20px;
            margin-bottom: 30px;
            margin-right: 10px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .kotak input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .cek {
            padding-right: 10%;
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: white;
            border: 1px solid #e0e0e0;
        }

        .kotak:hover input~.cek {
            background-color: white;
        }

        /* When the checkbox is checked, add a blue background */
        .kotak input:checked~.cek {
            background-color: white;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .cek:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .kotak input:checked~.cek:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .kotak .cek:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid black;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .cek2 {
            padding-right: 10%;
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: black;

        }

        .kotak:hover input~.cek2 {
            background-color: black;
        }

        /* When the checkbox is checked, add a blue background */
        .kotak input:checked~.cek2 {
            background-color: black;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .cek2:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .kotak input:checked~.cek2:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .kotak .cek2:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .cek3 {
            padding-right: 10%;
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: blue;
        }

        .kotak:hover input~.cek3 {
            background-color: blue;
        }

        /* When the checkbox is checked, add a blue background */
        .kotak input:checked~.cek3 {
            background-color: blue;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .cek3:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .kotak input:checked~.cek3:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .kotak .cek3:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .cek4 {
            padding-right: 10%;
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: red;
        }

        .kotak:hover input~.cek4 {
            background-color: red;
        }

        /* When the checkbox is checked, add a blue background */
        .kotak input:checked~.cek4 {
            background-color: red;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .cek4:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .kotak input:checked~.cek4:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .kotak .cek4:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .cek5 {
            padding-right: 10%;
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: green;
        }

        .kotak:hover input~.cek5 {
            background-color: green;
        }

        /* When the checkbox is checked, add a blue background */
        .kotak input:checked~.cek5 {
            background-color: green;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .cek5:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .kotak input:checked~.cek5:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .kotak .cek5:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .cek6 {
            padding-right: 10%;
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: yellow;
        }

        .kotak:hover input~.cek6 {
            background-color: yellow;
        }

        /* When the checkbox is checked, add a blue background */
        .kotak input:checked~.cek6 {
            background-color: yellow;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .cek6:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .kotak input:checked~.cek6:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .kotak .cek6:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .cek7 {
            padding-right: 10%;
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: purple;
        }

        .kotak:hover input~.cek7 {
            background-color: purple;
        }

        /* When the checkbox is checked, add a blue background */
        .kotak input:checked~.cek7 {
            background-color: purple;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .cek7:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .kotak input:checked~.cek7:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .kotak .cek7:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .cek8 {
            padding-right: 10%;
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: brown;
        }

        .kotak:hover input~.cek8 {
            background-color: brown;
        }

        /* When the checkbox is checked, add a blue background */
        .kotak input:checked~.cek8 {
            background-color: brown;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .cek8:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .kotak input:checked~.cek8:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .kotak .cek8:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        #amount {
            font-size: 90%;
            width: 150px;
        }
    </style>
    <script>
        $(document).ready(function() {




            filter_data();

            function filter_data() {
                var max_price = $('#maxPrice').val();
                var min_price = $('#minPrice').val();
                var brand = make_filter('BRND');
                var color = make_filter('CLR');
                if (flag == 0) {
                    var search = temp;
                }
                if (flag == 1) {
                    var search = "";
                }
                var genre = $('#genre').text();
                $.ajax({
                    url: "Product/filter_data",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        max_price: max_price,
                        min_price: min_price,
                        brand: brand,
                        color: color,
                        search: search,
                        genre: genre
                    },
                    success: function(data) {
                        $('.Lproduct').html(data);
                        $('.BLCK').css('background-color', 'black');
                        $('.WH').css('background-color', 'white');
                        $('.RD').css('background-color', 'red');
                        $('.BLU').css('background-color', 'blue');
                        $('.YL').css('background-color', 'yellow');
                        $('.BR').css('background-color', 'brown');
                        $('.GR').css('background-color', 'green');
                        $('.PR').css('background-color', 'purple');
                        $('.warna').css('margin-right', '4px');
                        $(".produk").on('click', function() {
                            var detail = $(this).attr('id');
                            $.ajax({
                                type: "POST",
                                url: 'Details/detail_barang',
                                data: {
                                    id: detail
                                },
                                success: function(data) {
                                    window.location.href = "details";
                                }
                            })
                        });
                    }
                })
            }

            function make_filter(Cname) {
                var filter = [];
                $('.' + Cname + ':checked').each(function() {
                    filter.push($(this).val());
                });
                return filter;
            };

            $('.CLR').on('click', function() {
                filter_data();
            });
            $('.BRND').on('click', function() {
                filter_data();
            });


            $(".produk").on('click', function() {
                var detail = $(this).attr('id');
                $.ajax({
                    type: "POST",
                    url: 'Details/detail_barang',
                    data: {
                        id: detail
                    },
                    success: function(data) {
                        window.location.href = "details";
                    }
                })
            });

            $(function() {
                $("#slider-range").slider({
                    range: true,
                    min: 50000,
                    max: 4000000,
                    values: [50000, 4000000],
                    slide: function(event, ui) {
                        $("#amount").val("Rp " + ui.values[0] + " - Rp " + ui.values[1]);

                    },
                    stop: function(event, ui) {
                        $('#minPrice').val(ui.values[0]);
                        $('#maxPrice').val(ui.values[1]);
                        filter_data();
                    }
                });
                $("#amount").val("Rp " + $("#slider-range").slider("values", 0) +
                    " - Rp " + $("#slider-range").slider("values", 1));
                $('#minPrice').val($("#slider-range").slider("values", 0));
                $('#maxPrice').val($("#slider-range").slider("values", 1));
            });



        })
    </script>




</body>

</html>