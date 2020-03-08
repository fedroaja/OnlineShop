<!DOCTYPE html>
<html>

<head>
  <?php
  echo $js;
  echo $css;
  ?>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css'>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js'></script>
  <title><?= $title ?></title>
</head>

<body>
  <?php echo $header; ?>
  <div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">

      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active" style="color: white; "></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="assets/img/Home/wallpaper.jpg" class="img-responsive">
        </div>

        <div class="item">
          <img src="assets/img/Home/wallpaper1.jpg" class="img-responsive">
        </div>

        <div class="item">
          <img src="assets/img/Home/wallpaper2.jpg" class="img-responsive">
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <!----Brand--->
    <br><br>
    <h1 style="font-size:32px; text-align: center;">FEATURED BRANDS</h1>
    <hr>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 lbrand">
          <img id="Adidas" class="Pbrand" src="assets/img/Home/logo1.jpg" style="width: 300px;height: 200px;margin-left: 55px;margin-bottom: 20px;">
          <img id="Nike" class="Pbrand" src="assets/img/Home/logo2.jpg" style="width: 300px;height: 200px;margin-left: 55px;margin-bottom: 20px;">
          <img id="Yeezy" class="Pbrand" src="assets/img/Home/logo3.jpg" style="width: 300px;height: 200px;margin-left: 55px;margin-bottom: 20px;">
          <img id="Reebok" class="Pbrand" src="assets/img/Home/logo4.jpg" style="width: 300px;height: 200px;margin-left: 55px;margin-bottom: 20px;">
          <img id="Air Jordan" class="Pbrand" src="assets/img/Home/logo5.jpg" style="width: 300px;height: 200px;margin-left: 55px;margin-bottom: 20px;">
          <img id="Vans" class="Pbrand" src="assets/img/Home/logo6.jpg" style="width: 300px;height: 200px;margin-left: 55px;margin-bottom: 20px;">
        </div>
      </div>
    </div>

    <!--New produck--->
    <br><br>
    <h1 style="font-size:32px; text-align: center;">NEW PRODUCT</h1>
    <hr>
    <div class="container">
      <div class="owl-carousel">
        <?php
        foreach ($barang as $row) {
          $ID = $row['ID_Barang'];
          $Name = $row['B_name'];
          $Poto = $row['B_photo'];
          $Price = $row['B_price'];
          $Color = $row['B_color'];
  
          echo '<div id="' . $ID . '" class="Nproduct"><img src="assets/foto/' . $Poto . '" alt="" style="height:200px;width:200px;"><br><p style="margin-left:20px;">' . $Name . '<br><br>Rp ' . nominal($Price) . '</p></div>';
        }

        ?>

      </div>
    </div>


    <!-- Second Grid -->
    <div class="row-padding light-grey padding-32 container">
      <div class="content">

        <div class="twothird">
          <br><br>
          <h1 style="font-size:32px; text-align: left;">BELANJA ONLINE DI KICK SHOP</h1>
          <hr>
          <h5 style="font-size:16px; text-align: left; margin-bottom: 200px;">Selamat datang di situs resmi Kickshop di mana Anda dapat membeli berbagai sepatu berkualitas. Toko Online Resmi Kickshop bekerja sama dengan banyak Brand berkualitas mulai dari Nike, Adidas, Vans, dan lainnya untuk semua kebutuhan Anda. Tersedia berbagai macam sepatu yang cocok untuk setiap momen dan nyaman dipakai saat berolahraga. Toko Online Resmi Kickshop menawarkan banyak deal untuk Anda yang berbelanja secara online; mulai dari gratis ongkos kirim jika Anda berbelanja, easy return, fast response, dan masih banyak lagi. Beli segera sepatu untuk segala jenis olahraga hanya di adidas Indonesia.</h5>
        </div>
      </div>
    </div>






  </div>
  <script>
    $('.Pbrand').on('click', function() {
      var brand = $(this).attr('id');
      $.ajax({
        type: "POST",
        url: 'Product/brand_menu',
        data: {
          brand: brand
        },
        success: function(data) {
          window.location.href = "product";
        }
      })
    })

    $(".Nproduct").on('click', function() {
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



    var $owl = $('.owl-carousel');
    $('.container').on('click', function() {})
    $owl.children().each(function(index) {
      $(this).attr('data-position', index); // NB: .attr() instead of .data()
    });

    $owl.owlCarousel({
      center: true,
      loop: true,
      items: 5,
    });

    $(document).on('click', '.owl-item>div', function() {
      $owl.trigger('to.owl.carousel', $(this).data('position'));
    });
  </script>
  <style>
    .owl-item>div {
      cursor: pointer;
      display: inline-block;
      margin: 6% 8%;
      color: black;
      border-radius: 2px;
      box-sizing: border-box;
      box-shadow: 1px 5px 10px 3px #d3d3d3;
      cursor: pointer;
      transition: margin 0.4s ease;
    }

    .owl-item.center>div {
      cursor: auto;
      margin: 0;
    }

    .active {
      background: none;
    }

    .owl-item:not(.center)>div:hover {
      opacity: .75;
    }

    .lbrand>img:hover {
      opacity: 0.5;
      cursor: pointer;
    }

    .wrapper {
      position: relative;
      width: auto;
      height: 200px;
      top: 0;
      left: 0;
      overflow: hidden;
    }

    .containerB {
      position: absolute;
      height: 200px;
    }

    .contentContainer {
      width: 182px;
      height: 200px;
      padding-left: 50px;
      margin-right: 90px;
      display: inline-block;
    }

    .Split {
      margin-right: 700px;
    }



    .carousel .item {
      height: 500px;
    }

    .carousel-inner>.item>img {
      position: fixed;
      left: 0px;
      min-width: 100%;
      height: 500px;
    }

    .carousel-inner>.list>img {
      position: fixed;
      left: 0px;
      min-width: 100%;
      height: 500px;
    }

    .carousel .list {
      height: 100px;
    }
  </style>


</body>

</html>