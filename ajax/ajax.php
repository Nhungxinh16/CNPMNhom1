<?php
    require_once("../config/constants.php");

    if(isset($_POST["mode"])){
        $mode = $_POST["mode"];
        if($mode == "order"){
            $cus_id = $_SESSION["user_id"];
            $tour_id = $_POST["tour_id"];
            $people = $_POST["people"];
            $date = $_POST["date_start"];
            $sql = "insert into orders set customer_id = ?, tour_id = ?, start_time = ?, people = ?, validation = ?, payment = ?";
            $result = simpleQuery($sql, 0, [$cus_id, $tour_id, $date, $people, 0, 0]);
            if($result){
                echo "ok";
            }else{
                echo "no";
            }
        }else if($mode == "payment"){
            $order_id = $_POST["order_id"];
            $sql = "update orders set payment = 1 where order_id = ?";
            $result = true;
            $result = simpleQuery($sql, 0, [$order_id]);
           
            if($result){
                require_once("../config/mail.php");
                $sql = "select * from tours, cities, orders, customers where orders.tour_id = tours.tour_id and orders.customer_id = customers.customer_id and tours.city_id = cities.city_id and orders.order_id = ?";
                $row = simpleQuery($sql, 1, [$order_id])[0];
                $email = $row["email"];
                $date = date_create($row["start_time"]);
                $day = date_format($date, "d");
                $month = date_format($date, "m");
                $year = date_format($date, "Y");
                $paySuccess = '
                    <p>Chào bạn</p>
                    <p>Bạn đã thanh toán thành công hãy chuẩn bị đồ đạc và hẹn gặp tại '.$row["city_name"].' vào 
                    ngày '.$day.' tháng '.$month.' năm '.$year.'. Nếu quý khách không có mặt thì chúng tôi rất 
                    xin lỗi vì chúng tôi sẽ hủy tour của bạn và chúng tôi không thể hoàn tiền lại cho quý khách. Các bạn có thể liên hệ để hủy tour nếu đây không phải tour do bạn đặt hoặc do bạn đặt nhầm.
                    </p>
                    <p>Qúy khách muốn xem thông tin chi tiết về hành trình đầy khó khăn của mình thì có thể truy cập vào 
                    link sau: <a href="http://localhost:88/WebDatTour/history.php?customer_id='.$row["customer_id"].'">Chi tiết</a>
                    </p>
                    <p>Kính chúc quý khách đi chơi vui vẻ</p>
                ';
                send_mail($email, "myTour: Thanh toán thành công", $paySuccess);
                // echo $paySuccess;
                echo "ok";
            }else{
                echo "no";
            }
        }
    }else{
        echo "no";
    }
?>