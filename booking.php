<?php
    require("config/constants.php");
    $tour_id = null;
    if(isset($_GET)){
      if(isset($_GET["tour_id"]) && $_GET["tour_id"] != NULL){
        $tour_id = $_GET["tour_id"];
        if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"] ==null){
          $_SESSION["last_point"] = "booking.php";
          $_SESSION["tour_id"] = $tour_id;
          header("location: login.php");
        }
      }else{
        header("location: index.php");
      }
      $sql = "select count(tours.tour_id) as count, tours.price_per_person, tours.tour_name, tours.max, tours.tour_id, cities.city_id, cities.city_name, tours.image_1, tours.day_count, tourtypes.type_name from tours, orders, cities,tourtypes where tours.tour_type_id = tourtypes.tour_type_id and tours.tour_id = orders.tour_id and tours.city_id = cities.city_id and tours.tour_id = ? group by cities.city_id";
      $tour = simpleQuery($sql, 1, [$tour_id]);
      if(count($tour) >= 1){
        $tour = $tour[0];
      }else{
        $sql = "select tours.price_per_person, tours.tour_name, tours.max, tours.tour_id, cities.city_id, cities.city_name, tours.image_1, tours.day_count, tourtypes.type_name from tours, cities,tourtypes where tours.tour_type_id = tourtypes.tour_type_id and tours.city_id = cities.city_id and tours.tour_id = ?";
        $tour = simpleQuery($sql, 1, [$tour_id]);
        if(count($tour) >=1){
          $tour = $tour[0];
          $tour["count"] = 0;
        }else{
          header("location: error.php");
        }
      }
    }else{
      header("location: error.php");
    }

    require('templates/header.php');
?>

    <div class="mr-auto ml-auto" style="max-width: 1300px">
    <div class="col-12 mt-2">
        <small class="text-muted"><a href="#" style="color: #282365;"><u>Du lịch</u></a><small><i class="fas fa-chevron-right ml-3 mr-3"></i></small><a href="#" style="color: #282365;"><u>Đặt tour trong nước</u></a></small>
    </div>
    <hr>

    <div class="col-12 mt-2">
        <span href="#" style="color:#4D4AEF; font-weight: 500;">1. Nhập thông tin</span><!--<i class="fas fa-chevron-right ml-3 mr-3"></i><span href="#" style="color: #282365; font-weight: 500;">2. Thanh toán</span> !-->
    </div>
    <hr>

    <div class="card mb-3" style="max-width: 1300px;"">
        <?php
          echo '
            <div class="row no-gutters" style="background-color: #F9F9F9;">
              <div class="col-lg-3 col-12">
                <a href="#"><img src="'.$tour["image_1"].'" class="card-img" alt="..." style="border-radius: 10px 0 0 10px;"></a>
              </div>
              <div class="col-lg-9 col-12">
                <div class="card-body">
                  <!-- <p class="card-text" style="font-weight: 500; font-size: large;">Rất tốt<small class="text-muted ml-2">358 nhận xét&#160;&#160;|&#160;&#160;Lượt đi <span class="text-nomute" style="font-weight: 500; color: #282365;">1,3k</span></small></p> -->
                  <p class="card-text" style="font-weight: 500; font-size: large;">Rất tốt<small class="text-muted ml-2">&#160;&#160;|&#160;&#160;Lượt đi <span class="text-nomute" style="font-weight: 500; color: #282365;">'.$tour["count"].' lượt</span></small></p>
                  <h5 class="card-title pr-2 mb-1" style="color: #282365; font-size:x-large;">'.$tour["tour_name"].'</h5>
                  <p class="card-text mb-0"><small class="text-muted">Khởi hành <span class="ml-1" style="color: #282365; font-weight: 500;">28/10/2021</span></small></p>
                  <p class="card-text mb-0"><small class="text-muted">Thời gian <span class="ml-1" style="color: #282365; font-weight: 500;">'.$tour["day_count"].' ngày</span></small></p>
                  <p class="card-text mb-0"><small class="text-muted">Nơi khởi hành  <span class="ml-1" style="color: #282365; font-weight: 500;">'.$tour["city_name"].'</span></small></p>
                  <p class="card-text mb-0"><small class="text-muted">Số chỗ còn nhận<span class="ml-1" style="color: #282365; font-weight: 500;">'.$tour["max"].'</span></small></p>
                </div>
              </div>
              </div>
            </div>
          ';
        ?>
      </div>
      <!-- card thanh toán -->
      <div class="col d-flex justify-content-center">
        <div class="card" style="width: 30rem;">
            <div class="card-body justify-content-center">
              <h5 class="card-title" style="color: #282365;">Đặt tour</h5>
              <?php
                echo '
                  <p class="card-text mb-2"><span class="ml-1" style="color: #282365; font-weight: 500; font-size: normal;">Tour '.$tour["type_name"].'</span></p>
                  <img src="'.$tour["image_1"].'" alt="..." class="img-thumbnail mr-2" style="width:25%; border: none; border-radius: 10px; float: left;">
                  <p class="card-text mr-4" style="color: #282365; font-weight: 500;">'.$tour["tour_name"].'</p>
                  <br>
                  <br>
                  <p class="card-text mb-0"><span class="ml-1" style="color: #282365;">Bắt đầu chuyến đi</span> </p>
                  <input type="date" id="date_start" isValid = "0" day_count = "'.$tour["day_count"].'"/>
                  <p class="card-text mb-0"><span class="ml-1" style="color: #282365;">Kết thúc chuyến đi</span> </p>
                  <p class="card-text mb-5"><span id="date_end" class="ml-1" style="color: #282365; font-weight: 500; font-size: normal;">Vui lòng chọn ngày khởi hành</span></p>
                  <p class="card-text mb-4"><span class="ml-1" style="color: #282365; font-weight: 500; font-size: normal; float: left;">Hành khách</span></p>
                  <div class="form-group">
                    <select class="form-control" style="width:20%; float:right;" id="people_select">';
                      for($i = 0; $i < $tour["max"]; $i++){
                        echo '<option>'.($i + 1).'</option>';
                      }
                    echo '</select>
                  </div>
                ';
              ?>
              <br>
              <br><br><br>
              <?php
                echo '
                  <p class="card-text mb-0"><span class="ml-1" style="color: #282365; font-weight: 500; font-size: normal; float: left;">Giá vé</span></p>
                  <p class="card-text mb-4">
                    <span class="ml-1" style="color: #282365; font-weight: 500; font-size: normal; float: right;">&#160;x&#160;'.number_format($tour["price_per_person"], 0, "", ",").'₫</span>
                    <span id = "price" price="'.$tour["price_per_person"].'" class="ml-1" style="color: #282365; font-weight: 500; font-size: normal; float: right;">1</span>
                  </p>

                  <br><br><br><hr>
                  <p class="card-text mb-0"><span class="ml-1" style="color: #282365; font-weight: 500; font-size: normal; float: left;">TỔNG CỘNG</span></p>
                  <p class="card-text mb-4"><span id="totalPrice" class="ml-1" style="color: #FD5056; font-weight: 500; font-size: x-large; float: right;">'.number_format($tour["price_per_person"], 0, "", ",").'đ</span></p>
                  <br><br><br>
                  <button id="order_now" tour_id = "'.$tour["tour_id"].'" 
                  type="button" class="btn btn-danger col d-flex justify-content-center p-3" style="background-color: #FD5056; font-size:large; font-weight: 500; border-radius: 10px;">ĐẶT NGAY</button>
                ';
              ?>
                      
            </div>
          </div>
      </div>

<?php
    include('templates/footer.php')
?>