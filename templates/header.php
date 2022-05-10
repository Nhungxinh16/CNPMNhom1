<?php
include("./config/database-connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="content/index.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


  <title>WEB ĐẶT TOUR</title>
</head>

<body>

  <!-- Thanh Menu -->

  <nav class="navbar navbar-expand-lg navbar-light bg-light p-1 pb-0 pt-0 ">
    <a class="navbar-brand m-0" href="index.php"><img src="content/image/logo.png" class="img-fluid ml-2" alt="Responsive image" style="max-width: 70%"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item dropdown active p-2">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: 500; font-size:small;">
            Du lịch
          </a>
          <ul class="dropdown-menu">
            <li>
              <div class="row-fluid" style="min-width: 992px">
                <ul class="unstyled span4 m-4" style="float: left; list-style-type: none;">
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;" class="font-weight-bold">TOUR MIỀN BẮC</a></li>
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;">Du lịch Hà Nội</a></li>
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;">Du lịch Hải Phòng</a></li>
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;">Du lịch Hạ Long</a></li>
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;">Du lịch Bắc Ninh</a></li>
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;">Du lịch Phú Thọ</a></li>
                  <li class="mt-2 mb-2"><u><a href="#" style="color: #282365; font-size: small;" class="font-weight-bold">Xem tất cả</a></u></li>
                </ul>
                <ul class="unstyled span4 m-4" style="float: left; list-style-type: none;">
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;" class="font-weight-bold">TOUR Miền Trung</a></li>
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;">Du lịch Huế</a></li>
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;">Du lịch Quảng Trị</a></li>
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;">Du lịch Quảng Bình</a>
                  </li>
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;">Du lịch Đà Nẵng</a></li>
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;">Du lịch Quảng Nam</a></li>
                  <li class="mt-2 mb-2"><u><a href="#" style="color: #282365; font-size: small;" class="font-weight-bold">Xem tất cả</a></u></li>
                </ul>
                <ul class="unstyled span4 m-4" style="float: left; list-style-type: none;">
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;" class="font-weight-bold">TOUR MIỀN TÂY NAM BỘ</a></li>
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;">Du lịch Phú Quốc</a></li>
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;">Du lịch Tiền Giang</a>
                  </li>
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;">Du lịch Cần Thơ</a></li>
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;">Du lịch Vĩnh Long</a></li>
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;">Du lịch Sóc Trăng</a></li>
                  <li class="mt-2 mb-2"><u><a href="#" style="color: #282365; font-size: small;" class="font-weight-bold">Xem tất cả</a></u></li>
                </ul>
                <ul class="unstyled span4 m-4" style="float: left; list-style-type: none;">
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;" class="font-weight-bold">TOUR MIỀN ĐÔNG NAM BỘ</a></li>
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;">Du lịch Bà Rịa - Vũng
                      Tàu</a></li>
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;">Du lịch Côn Đảo</a></li>
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;">Du lịch TP.Hồ Chí Minh</a>
                  </li>
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;">Du lịch Tây Ninh</a></li>
                  <li class="mt-2 mb-2"><a href="#" style="color: #282365; font-size: small;">Du lịch Bình Dương</a>
                  </li>
                  <li class="mt-2 mb-2"><u><a href="#" style="color: #282365; font-size: small;" class="font-weight-bold">Xem tất cả</a></u></li>
                </ul>
              </div>
            </li>
          </ul>
        </li>

        <li class="nav-item dropdown active p-2">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: 500; font-size:small;">
            Vận chuyển
          </a>
        </li>

        <li class="nav-item dropdown active p-2">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: 500; font-size:small;">
            Tin tức
          </a>
        </li>

        <li class="nav-item dropdown active p-2">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: 500; font-size:small;">
            Khuyến mãi
          </a>
        </li>

        <li class="nav-item active p-2" id="navbarDropdown">
          <a class="nav-link disabled" style="font-weight: 500; font-size:small;" href="#">VietravelPlus</a>
        </li>

        <li class="nav-item active p-2 " id="navbarDropdown">
          <a class="nav-link disabled" style="font-weight: 500; font-size:small;" href="#">Liên hệ</a>
        </li>

      </ul>

      <!--  Tìm kiếm trong thanh menu  -->

      <form class="form-inline my-2 my-lg-0" method="GET" action="listtour.php">
        <input class="form-control mr-1 sm-2 border-warning" type="text" name="search" placeholder="Bắt đầu tìm kiếm..." aria-label="Search">
        <button class="btn btn-outline my-2 my-sm-0 mr-1" type="submit"><i class="fas fa-search"></i></button>
      </form>
      <?php
        if(isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null){
          $sql = "select is_admin from customers where customer_id = ?";
          $cus = simpleQuery($sql, 1, [$_SESSION["user_id"]])[0];
          echo '
            <div class="dropdown show mr-5">
              <a class="btn btn-secondary dropdown-toggle"  style="background: #ffffff;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
              <i class="fas fa-user" style="color: black;"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-end" role="menu" aria-labelledby="dropdownMenuLink" >';
                if($cus["is_admin"] == 1){
                  echo '<a class="dropdown-item" href="admin/index.php">Quản lý</a>';
                }
                echo '<a class="dropdown-item" href="profile.php">Thông tin</a>';
                echo '<a class="dropdown-item" href="history.php?customer_id='.$_SESSION["user_id"].'">Lịch sử</a>';
                echo '<a class="dropdown-item" href="admin/logout.php">Đăng xuất</a>
              </div>
            </div>';
        }else{
          echo '<button type="button" class="btn btn-light"><a href="login.php"><i class="fas fa-user" style="color: black;"></i></a></button>';
        }
        

          
      ?>
      
    </div>

  </nav>