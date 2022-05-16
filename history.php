<!--trang này là trang thanh toán 
Sau khi bấm đặt tour ở booking xong sẽ gửi link về mail xác nhận đặt tour 
bấm vào link xác nhận ở mail thì ra trang này -->   

<?php
    require_once("config/constants.php");
    if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == null){
      header("error.php");
    }
    $orders = null;
    $customer = null;
    if(isset($_GET)){
        if(isset($_GET["customer_id"]) && $_GET["customer_id"] != null){
            $sql = "select * from tours, orders where orders.tour_id = tours.tour_id and orders.customer_id = ?";
            $orders = simpleQuery($sql, 1, [$_GET["customer_id"]]);
            $sql = "select * from customers where customer_id = ?";
            $customer = simpleQuery($sql, 1, [$_GET["customer_id"]])[0];
        }else{
            header("location: error.php");
        }
    }else{
        header("location: error.php");
    }
    
    require('templates/header.php');
?>

<!-- Nội dung -->
<div class="mr-auto ml-auto" style="max-width: 1300px">
    <hr>
    <div class="col-12 mt-2">
        <span href="#" style="color:#4D4AEF; font-weight: 500;">Thông tin khách hàng</span><!--<i class="fas fa-chevron-right ml-3 mr-3"></i><span href="#" style="color: #282365; font-weight: 500;">2. Thanh toán</span> !-->
    </div>
    <hr>
    <div class="h-booking-detail p-4 mb-4">
        <div class="h-heading">
            <h6 class="fw-bold">THÔNG TIN LIÊN LẠC</h6>
        </div>
        <div class="row">
            <?php
                echo '
                    <div class="col-4 col-md-3">
                        <span class="h-label">Username</span>
                        <p class="info">'.$customer["user_name"].'</p>
                    </div>
                    <div class="col-md-3 col-4">
                        <span class="h-label">Email</span>
                        <p class="info">'.$customer["email"].'</p>
                    </div>
                    <div class="col-md-6 col-4">
                        <span class="h-label">Số điện thoại</span>
                        <p class="info">'.$customer["phone_number"].'</p>
                    </div>
                ';
            ?>
            
        </div>
    </div>
    <div class="col-12 mt-2">
        <span href="#" style="color:#4D4AEF; font-weight: 500;">Lịch sử đặt tour</span><!--<i class="fas fa-chevron-right ml-3 mr-3"></i><span href="#" style="color: #282365; font-weight: 500;">2. Thanh toán</span> !-->
    </div>
    <hr>
    <?php
        foreach($orders as $order){
            $date = date_create($order["date_created"]);
            $day = date_format($date, "d");
            $month = date_format($date, "m");
            $year = date_format($date, "Y");
            echo '
                <div class="h-booking-detail p-4 mb-4">
                    <div class="h-heading">
                        <h6 class="fw-bold ">'.$order["tour_name"].'</h6>
                    </div>
                    <div class="row item">
                        <div class="col-md-3 col-12 h-label">Booking id</div>
                        <div class="col-md-9 col-12 h-text">
                            <span class="text-primary fw-bold">'.$order['order_id'].'</span>
                        </div>
                    </div>
                    <div class="row item">
                        <div class="col-md-3 col-12 h-label">Giá tour</div>
                        <div class="col-md-9 col-12 h-text">
                            <span class="text-primary fw-bold">'.number_format($order["price_per_person"], 0, "", ",").'đ</span>
                        </div>
                    </div>
                    <div class="row item">
                        <div class="col-md-3 col-12 h-label">Số người</div>
                        <div class="col-md-9 col-12 h-text">
                            <span class="text-primary fw-bold">'.$order["people"].'</span>
                        </div>
                    </div>
                    <div class="row item">
                        <div class="col-md-3 col-12 h-label">Tổng tiền</div>
                        <div class="col-md-9 col-12 h-text">
                            <span class="text-primary fw-bold">'.number_format((int) $order["price_per_person"] * (int) $order["people"], 0, "", ",").'đ</span>
                        </div>
                    </div>
                    <div class="row item">
                        <div class="col-md-3 col-12 h-label">Thời gian đăng ký</div>
                        <div class="col-md-9 col-12 h-text">
                            <span class="text-primary fw-bold">'."$day tháng $month năm $year".'</span>
                        </div>
                    </div>
                    <div class="row item">
                        <div class="col-md-3 col-12 h-label">Tình trạng</div>
                        <div class="col-md-9 col-12 h-text">
                            <span class="text-primary fw-bold">';
                                if($order["validation"] == 0){
                                    echo "Đang chờ mytour xử lý";
                                }else if($order["validation"] == 2){
                                    echo "Đã bị mytour hủy";
                                }else{
                                    if($order["payment"] == 0){
                                        echo "Chưa thanh toán";
                                    }else if($order["payment"] == 1){
                                        echo "Đã thanh toán";
                                    }else{
                                        echo "Bị hủy bỏ vì chưa thanh toán";
                                    }
                                }
                            echo '</span>
                        </div>
                    </div>
                </div>
            ';
        }

    ?>
    
    
</div>
<?php
  include('templates/footer.php')
?>