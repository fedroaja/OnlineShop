<style>
  .topnav {
    overflow: hidden;
    background-color: #333;
    position: fixed;
    top: 0;
    width: 100%;
  }

  .topnav>img {
    display: inline-block;
    max-width: 300px;
    margin-top: 0.8%;
    margin-left: 1%;
    height: auto;
    width: 100%;

  }
  
  .topnav a {
    float: right;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }

  .menu3:hover {
    background-color: #ddd;
    color: black;
  }

  .active {
    background-color: #4CAF50;
    color: white;
  }

  .topnav .icon {
    display: none;
  }

  a.menu1 {
    margin-right: 1%;
  }

  a.menu13 {
    margin-left: 10%;
  }

  @media screen and (max-width: 600px) {
    a.menu3 {
      display: none;
    }

    .topnav a.icon {
      float: left;
      display: block;
    }

    a.menu1,
    .menu12,
    .menu13 {
      white-space: pre-line;
    }

    .topnav>img {
      display: inline-block;
      max-width: 300px;
      margin-top: 1.5%;
      margin-left: 1%;
      height: auto;
      width: 100%;

    }

  }

  @media screen and (max-width: 600px) {
    .topnav.respon {
      position: relative;
    }

    .topnav.respon .icon {
      position: absolute;
      left: 0;
      top: 0;
    }

    .topnav.respon a {
      float: right;
      display: block;
      text-align: left;
    }

    a.menu1 {
      margin-right: 0%;
    }

    a.menu2 {
      margin-right: 0%;
    }

    .topnav.respon>img {
      display: inline-block;
      max-width: 300px;
      margin-top: 1.5%;
      margin-left: 14.3%;
      height: auto;
      width: 100%;

    }

  }

  .container {
    margin-top: 5%;
  }

  #myModal {
    margin-top: 5%;

  }

  .modal-content {
    margin-left: 15%;
    width: 65%;
    height: auto;
    background: transparent;
    /*opacity: 0.4;*/
    /*background-color: rgba(255,255,255,0.4);*/
  }

  .modal-header {
    background: white;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
  }

  .modal-body {
    /*
    margin-top: 1%;
    margin-left: 1%;
    margin-right: 1%;
    margin-bottom: 1%;*/
    padding-top: 10%;
    background: rgb(0, 0, 0, 0.4);
    /*opacity: 0;*/
    /*display: none;*/
    color: white;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
  }

  .textbox {
    width: 90%;
    overflow: hidden;
    font-size: 20px;
    padding: 8px 0;
    margin: 8px 0;
    margin-left: 5%;
    margin-bottom: 10%;
    border-bottom: 1px solid white;
  }

  .textbox i {
    width: 26px;
    float: left;
    text-align: center;
  }

  .textbox input {
    border: none;
    outline: none;
    background: none;
    color: white;
    font-size: 18px;
    width: 80%;
    float: left;
    margin: 0 10px;
  }

  .login {
    display: block;
    width: 100%;
    margin-bottom: 5%;
    background-color: white;
    color: black;
  }

  .signup {
    display: block;
    width: 100%;
    margin-bottom: 9%;
    background-color: black;
    color: white;
  }

  .user {
    margin-top: 10%;
  }

  .home {
    cursor: pointer;
  }

  a.example input[type=text] {
    padding: 1px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    border-radius: 3px 0px 0px 3px;
    background: white;
    color: black;
  }

  a.example button {
    float: left;
    width: 20%;
    padding: 1px;
    background: #333;
    color: white;
    font-size: 17px;
    border: 1px solid white;
    border-left: none;
    cursor: pointer;
  }

  a.example button:hover {
    background: white;
    color: black;
  }

  a.example::after {
    content: "";
    clear: both;
    display: table;
  }

  .img-profile {
    height: 2rem;
    width: 2rem;
  }

  .rounded-circle {
    border-radius: 50% !important;
  }
</style>

<nav class="navbar navbar-inverse navbar-fixed-top topnav" id="myTopnav">
  <img src="assets/img/Home/logo1.png" class="img-responsive home" alt="Responsive image">
  <?php
    if($user != null){
      echo '<a href="'.base_url("cart").'" class="menu1" style="color: white;margin-top: 0.2%;"><i class="fas fa-shopping-cart fa-lg "></i></a>';
    }
  ?>
    <a id='user' class="dropdown" href="<?= base_url('user'); ?>" >
      <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>
      <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
    <ul class="dropdown-menu">
      <li><a  My Profile</a></li>
      <li><a href="<?= base_url('auth/logout'); ?>">Logout</a></li>
    </ul>

  <!--<a id='log' href="#myModal" class="menu12" style="color: white;margin-top: 0.2%;" data-toggle="modal"><i class="fas fa-user fa-lg "></i></a>--->
  <a id='log' href="<?= base_url('auth'); ?>" class="menu12" style="color: white;margin-top: 0.2%;"><i class="fas fa-user fa-lg "></i></a>
  <a class="example"><input type="text" placeholder="Search.." name="search" class="inputan">
    <button type="submit" class="submit"><i class="fa fa-search"></i></button></a>
  <!-- <a href="#SPORTS" class="menu2 menu3 admin" style=" font-family: 'Impact';color:white;font-size: 150%;">ADMIN</a>--->
  <a id="SP" class="menu2 menu3" style=" font-family: 'Impact';color:white;font-size: 150%;">SPORTS</a>
  <a id="CS" class="menu3" style=" font-family: 'Impact';color:white;font-size: 150%">CASUAL</a>
  <a id="WN" class="menu3" style=" font-family: 'Impact';color:white;font-size: 150%">WOMEN</a>
  <a id="MN" class="menu3" style=" font-family: 'Impact';color:white;font-size: 150%;margin-left: -100px;">MEN</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</nav>




<script>
  <?php if ($user['name'] != null) {
    echo "$('#log').hide();";
  } else
    echo "$('#user').hide();";
  ?>
  $('.inputan').keypress(function(e){
    var key = e.which;
    if(key == 13){
      $('.submit').click();
    }
  })
  $('.submit').on('click', function() {
    var Sval = $('.inputan').val();
    $.ajax({
      type: "POST",
      url: 'Product/brand_menu',
      data: {
        brand: Sval
      },
      success: function(data) {
        window.location.href = "product";
      }
    })
  })
  $(".home").on('click', function() {
    window.location.replace("home")
  })
  $('.menu3').on('click', function() {
    var category = $(this).attr('id');
    $.ajax({
      type: 'POST',
      url: 'Product/category_menu',
      data: {
        category: category
      },
      success: function(data) {
        window.location.href = "product";
      }
    })
  })

  function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "navbar navbar-inverse navbar-fixed-top topnav") {
      x.className += " respon";
    } else {
      x.className = "navbar navbar-inverse navbar-fixed-top topnav";
    }
  }
  $('.admin').on('click', function() {
    window.location.replace("admin");
  })
</script>