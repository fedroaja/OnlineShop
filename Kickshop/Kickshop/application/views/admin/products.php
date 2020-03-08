<div class="col-md-12 table-responsive">
    <button class="btn btn-primary adds" style="margin-bottom: 10px;" data-toggle='modal' data-target='#addData'><i class="fas fa-plus-circle"></i>&nbspADD Product</button>
    <table id="myTable" class='table table-striped table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Brand</th>
                <th>Name</th>
                <th hidden>Desc</th>
                <th>Color</th>
                <th>Photo</th>
                <th>Category</th>
                <th>Size</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $x = 0;
            foreach ($product as $row) {
                $ID = $row['ID_Barang'];
                $Brand = $row['B_Brand'];
                $Name = $row['B_name'];
                $Color = $row['B_color'];
                $Poto = $row['B_photo'];
                $Poto2 = $row['B_photo2'];
                $Poto3 = $row['B_photo3'];
                $Desc = $row['B_description'];
                $Stock = $row['B_stock'];
                $Category = $row['B_category'];
                $Size = $row['B_size'];
                $Price = $row['B_price'];

                echo "<tr>";
                echo "<td> </td>";
                echo "<td id='iid'>" . $ID . "</td>";
                echo "<td id='ibrand'>" . $Brand . "</td>";
                echo "<td id='iname'>" . $Name . "</td>";
                echo "<td id='idesc' hidden>" . $Desc . "</td>";
                echo "<td id='icolor' class='color" . $x . "'>" . $Color . "</td>";
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
                echo "<td width='30%' id='iphoto'><img class='B_photo p1' src='assets/foto/" . $Poto . "' > <img class='B_photo p2' src='assets/foto/" . $Poto2 . "' > <img class='B_photo p3' src='assets/foto/" . $Poto3 . "' ></td>";
                echo "<td id='ictg' class='ctg" . $x . "'>" . $Category . "</td>";
                ?>
                <script type="text/javascript">
                    var y = 0;
                    $(document).ready(function() {
                        var ctg = $('.ctg' + y).text();

                        [ctg1, ctg2, ctg3, ctg4] = ctg.split('_');
                        if (ctg1 == "MN") {
                            $('.ctg' + y).text("MEN");
                        }
                        if (ctg1 == "WN") {
                            $('.ctg' + y).text("WOMEN");
                        }
                        if (ctg1 == "CS") {
                            $('.ctg' + y).text("CASUAL");
                        }
                        if (ctg1 == "SP") {
                            $('.ctg' + y).text("SPORTS");
                        }

                        if (ctg2 == "MN") {
                            $('.ctg' + y).append(", MEN");
                        }
                        if (ctg2 == "WN") {
                            $('.ctg' + y).append(", WOMEN");
                        }
                        if (ctg2 == "CS") {
                            $('.ctg' + y).append(", CASUAL");
                        }
                        if (ctg2 == "SP") {
                            $('.ctg' + y).append(", SPORTS");
                        }

                        if (ctg3 == "MN") {
                            $('.ctg' + y).append(", MEN");
                        }
                        if (ctg3 == "WN") {
                            $('.ctg' + y).append(", WOMEN");
                        }
                        if (ctg3 == "CS") {
                            $('.ctg' + y).append(", CASUAL");
                        }
                        if (ctg3 == "SP") {
                            $('.ctg' + y).append(", SPORTS");
                        }

                        if (ctg4 == "MN") {
                            $('.ctg' + y).append(", MEN");
                        }
                        if (ctg4 == "WN") {
                            $('.ctg' + y).append(", WOMEN");
                        }
                        if (ctg4 == "CS") {
                            $('.ctg' + y).append(", CASUAL");
                        }
                        if (ctg4 == "SP") {
                            $('.ctg' + y).append(", SPORTS");
                        }

                        y++;

                    })
                </script>
                <?php
                echo "<td id='isize' class='tpsize" . $x . "'>" . $Size . "</td>";
                ?>
                <script>
                    var u = 0;
                    $(document).ready(function() {
                        var tmsize = $('.tpsize' + u).text().split('_');
                        if (tmsize.length == 1) {
                            $.each(tmsize, function(i, d) {
                                $('.tpsize' + u).html(tmsize[i]);
                            })
                        } else {
                            $.each(tmsize, function(i, d) {
                                if (i == 0) {
                                    $('.tpsize' + u).html(tmsize[i]);
                                } else {
                                    $('.tpsize' + u).append(", " + tmsize[i]);
                                }
                            })
                        }
                        u++;
                    })
                </script>
                <?php
                echo "<td id='iprice'>" . $Price . "</td>";
                echo "<td id='istock'>" . $Stock . "</td>";
                echo "<td width='80000px'><button class='btn btn-warning edit' data-toggle='modal' data-target='#photoModal'><i class='fas fa-edit'></i>&nbspEdit</button> <button class='btn btn-danger hapus' id='" . $ID . "' name='hapus'><i class='fas fa-trash-alt'></i>&nbspDelete</button></td>";
                echo "</tr>";
                $x++;
            }
            setcookie("LP", $ID, time() + (86400 * 30), "/");
            ?>
        </tbody>
    </table>

</div>

</div>

<div id="photoModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <img src="images/logo.png" style="width: 40%; margin-left: 30%;">
            </div>
            <div class="modal-body photo">

            </div>
        </div>

    </div>
</div>

<div id="addData" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <img src="images/logo.png" style="width: 40%; margin-left: 30%;">
            </div>
            <div class="modal-body add">

            </div>
        </div>

    </div>
</div>


<style>
    .B_photo {
        max-width: 50px;
        max-height: 50px;
    }

    .B_photo:hover {
        transform: scale(3);
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
        border-radius: 50%;
        border: 1px solid #e0e0e0;
    }

    #mphoto,
    #mphoto2,
    #mphoto3 {
        width: 200px;
        height: 200px;
        max-width: 400px;
    }

    .photo,
    .add {
        height: 600px;
        overflow: auto;

    }

    .pilihwarna {
        display: block;
    }

    .dsize {
        height: 100px;
        overflow: auto;
    }

    .dsize>label {
        display: block;
    }
</style>

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Adi Wirya <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/'); ?>js/datatables1.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });



    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });

    });
</script>

</body>

</html>