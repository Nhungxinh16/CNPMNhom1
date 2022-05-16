<!-- trang này là khi bấm vào quản lý đặt tour trên nav bar sẽ ra 
nó dùng để quản lý đặt tour -->

<?php
    require("../config/constants.php");
    require_once("check-admin.php");
    $_SESSION["nav"] = "orders";
    // Hủy các orders mà 2 ngày chưa thanh toán
    $now = date("Y-m-d");
    $last_time = (int) strtotime($now) - (int) 2 * 86400;
    $last_time = date_create(date("Y-m-d", $last_time));
    $last_time = date_format($last_time, "Ymd");
    $start_time = (int) strtotime($now) - (int) 4 * 86400;
    $start_time = date_create(date("Y-m-d", $start_time));
    $start_time = date_format($start_time, "Ymd");
    $sql = "SELECT * FROM orders WHERE date_created < ? and date_created > ? and payment = 0";
    $orders = simpleQuery($sql, 1, [$last_time, $start_time]);
    $sql = "update orders set validation = ?, payment = ?";
    foreach($orders as $order){
        simpleQuery($sql, 0, [1,2]);
    }

    if(isset($_GET["order_id"]) && $_GET["order_id"] != null){
        $id = $_GET["order_id"];
        $sql = "select customers.email from customers, orders where orders.customer_id = customers.customer_id and orders.order_id = ?";
        $email = simpleQuery($sql, 1, [$id])[0]["email"];
        $sql = "update orders set validation = ? where order_id = ?";
        $result = false;
        require_once("../config/mail.php");
        if(isset($_GET["val"])){
            $result = simpleQuery($sql, 0, [1, $id]);
            if($result){
                $subject = 'MyTour kính chào quý khách'; 
                $bodyContent = '
                    <p>Cảm ơn quý khách đã đăng kí tour trên MyTour.</p>
                    <p>Xin quý khách vui lòng vào đường <a href="http://localhost:88/WebDatTour/pay-booking.php?order_id='.$id.'">link</a> 
                    này để có thể thanh toán tour. Thời hạn thanh toán
                    là 2 ngày kể từ ngày quý khách đăng kí. Nếu quý khách không thanh toán đúng hạn, thì 
                    yêu cầu đặt tour của quý khách sẽ bị hủy bỏ.</p>
                    <p>Kính mến!</p>
                ';
                send_mail($email, $subject, $bodyContent);
                header("location: QLDDTour.php");
            }
        }else if(isset($_GET["cancel"])){
            $result = simpleQuery($sql, 0, [2, $id]);
            if($result){
                $subject = 'MyTour: hủy tour du lịch'; 
                $bodyContent = '
                    <p>Cảm ơn quý khách đã tin tưởng dịch vụ của MyTour. 
                    Tour của quý khách đã bị chúng tôi hủy. Nếu không phải do bạn yêu cầu hủy tour thì có thể là một trong những
                    lý do sau: </p>
                    <ul>
                        <li>MyTour không tin tưởng quý khách</li>
                        <li>Không có tour nào khả dụng</li>
                        <li>MyTour chưa sẵn sàng phục vụ quý khách </li>
                    </ul>
                    <p> Khi nhận được mail này mà không phải bạn yêu cầu hủy tour bạn có thể đăng ký tour lại, chúng tôi
                    tin rằng yêu cầu đặt tour của quý khách sẽ chấp nhận cao hơn.
                    </p>
                    <p>Kính mến!</p>
                ';
                send_mail($email, $subject, $bodyContent);
                header("location: QLDDTour.php");
            }
        }   
    }
    

    require('templates-admin/header.php');
?>

            <div class="container-fluid px-4">

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Các tour đang chờ xử lý</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Người đặt tour</th>
                                    <th scope="col">Tên tour</th>
                                    <th scope="col">Thời gian bắt đầu</th>
                                    <th scope="col">Số người</th>
                                    <th scope="col">Số ngày</th>
                                    <th scope="col">Xem chi tiết</th>
                                    <th scope="col">Xác nhận</th>
                                    <th scope="col">Hủy bỏ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "select * from orders, tours, customers where orders.customer_id = customers.customer_id and orders.tour_id = tours.tour_id and orders.validation = 0";
                                    $rows = simpleQuery($sql);
                                    $i = 1;
                                    foreach($rows as $row){
                                        echo '
                                            <tr>
                                                <th scope="row">'.$i.'</th>
                                                <td>'.$row["user_name"].'</td>
                                                <td>'.$row["tour_name"].'</td>
                                                <td>'.$row["start_time"].'</td>
                                                <td>'.$row["people"].'</td>
                                                <td>'.$row["day_count"].'</td>
                                                <td><a href="Xemdon.php?id='.$row["order_id"].'"><i class="fas fa-eye"></i></a></td>
                                                <td><a href="QLDDTour.php?val=&order_id='.$row["order_id"].'" id="check_tick"><i class="fas fa-check-circle"></i></a></td>
                                                <td><a href="QLDDTour.php?cancel=&order_id='.$row["order_id"].'"><i class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                        ';
                                        $i++;
                                    }
                                    
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>     
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Danh sách chờ thanh toán</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Người đặt tour</th>
                                    <th scope="col">Tên tour</th>
                                    <th scope="col">Thời gian bắt đầu</th>
                                    <th scope="col">Số người</th>
                                    <th scope="col">Số ngày</th>
                                    <th scope="col">Tình trạng</th>
                                    <th scope="col">Xem chi tiết</th>
                                    <th scope="col">Hủy bỏ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "select * from orders, tours, customers where orders.customer_id = customers.customer_id and orders.tour_id = tours.tour_id and orders.validation = 1 and orders.payment = 0 order by orders.order_id desc";
                                    $rows = simpleQuery($sql);
                                    $i = 1;
                                    foreach($rows as $row){
                                        echo '
                                            <tr>
                                                <th scope="row">'.$i.'</th>
                                                <td>'.$row["user_name"].'</td>
                                                <td>'.$row["tour_name"].'</td>
                                                <td>'.$row["start_time"].'</td>
                                                <td>'.$row["people"].'</td>
                                                <td>'.$row["day_count"].'</td>
                                                <td>Chờ thanh toán</td>
                                                <td><a href="Xemdon.php?id='.$row["order_id"].'"><i class="fas fa-eye"></i></a></td>
                                                <td><a href="QLDDTour.php?cancel=&order_id='.$row["order_id"].'"><i class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                        ';
                                        $i++;
                                    }
                                    
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>  
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Danh sách các tour còn lại</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Người đặt tour</th>
                                    <th scope="col">Tên tour</th>
                                    <th scope="col">Thời gian bắt đầu</th>
                                    <th scope="col">Số người</th>
                                    <th scope="col">Số ngày</th>
                                    <th scope="col">Tình trạng</th>
                                    <th scope="col">Xem chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "select * from orders, tours, customers where orders.customer_id = customers.customer_id and orders.tour_id = tours.tour_id and orders.validation > 0 and orders.payment > 0 order by orders.order_id desc";
                                    $rows = simpleQuery($sql);
                                    $i = 1;
                                    foreach($rows as $row){
                                        echo '
                                            <tr>
                                                <th scope="row">'.$i.'</th>
                                                <td>'.$row["user_name"].'</td>
                                                <td>'.$row["tour_name"].'</td>
                                                <td>'.$row["start_time"].'</td>
                                                <td>'.$row["people"].'</td>
                                                <td>'.$row["day_count"].'</td>
                                                <td>'; 
                                                    if($row["validation"] == 0){
                                                        echo "Đang chờ mytour xử lý";
                                                    }else if($row["validation"] == 2){
                                                        echo "Đã bị mytour hủy";
                                                    }else{
                                                        if($row["payment"] == 0){
                                                            echo "Chưa thanh toán";
                                                        }else if($row["payment"] == 1){
                                                            echo "Đã thanh toán";
                                                        }else{
                                                            echo "Bị hủy bỏ vì chưa thanh toán";
                                                        }
                                                    }
                                                echo '</td>
                                                <td><a href="Xemdon.php?id='.$row["order_id"].'"><i class="fas fa-eye"></i></a></td>
                                            </tr>
                                            
                                        ';
                                        $i++;
                                    }
                                    
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>               

<?php
    include('templates-admin/footer.php')
?>