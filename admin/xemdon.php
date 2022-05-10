<?php
ob_start(); // loi cua header()

require("../config/constants.php");
require_once("check-admin.php");
$_SESSION["nav"] = "orders";
require('templates-admin/header.php');
if(isset($_SESSION["alert"])){
    $message = $_SESSION["alert"];
    unset($_SESSION["alert"]);
    echo '<script>
            alert("'.$message.'");
        </script>
    ';
}
if(isset( $_GET['id'])){
    $id = $_GET['id'];
    $sql = "select * from orders, tours, customers where order_id = $id and orders.customer_id = customers.customer_id and orders.tour_id = tours.tour_id";
    $res = mysqli_query($conn, $sql);
    $order = mysqli_fetch_assoc($res);
}

?>
<div class="main-content">
    <!-- <div id="breadcrum">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                    </div>
                </div>
            </div>
        </div> -->
    <div class="main-content" style="margin-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12  text-center mg-bot30">
                    <h2 style="color:#1583e0 !important;"> Thông tin tour</h2>
                </div>
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 noidungtin">
                           
                           
                            <?php
                            if (isset($_SESSION['noti'])) {
                                echo "<br>";
                                echo $_SESSION['noti'];
                                unset($_SESSION['noti']);
                            }
                            ?>
                            <br>
                            <form action="" class="d-flex flex-column align-items-center">
                                
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <label>
                                                Họ và tên người đặt
                                                :
                                            </label>
                                            <input type="text" value = "<?php echo $order['user_name'] ?>" disabled class="form-control">
                                </div>
                                
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                    <label>
                                        Liên hệ
                                        :
                                    </label>
                                    <input type="text" value = "<?php echo $order['phone_number'] ?>" disabled class="form-control">
                                </div>
                                
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                    <label>
                                        Email
                                        :
                                    </label>
                                    <input type="text" value="<?php echo $order['email'] ?>" disabled class="form-control">
                                </div>
                                
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                    <label>
                                        Tên tour đã đặt
                                        :
                                    </label>
                                    <input type="text" value="<?php echo $order['tour_name'] ?>" disabled class="form-control">
                                </div>
                                
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                    <label>
                                        Địa điểm
                                        :
                                    </label>
                                    <input type="text" value="<?php echo $order['places'] ?>" disabled class="form-control">
                                </div>
                                
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                    <label>
                                        Giá tiền
                                        :
                                    </label>
                                    <input type="text" value="<?php echo $order['price_per_person'] * $order['people'] ?>" disabled class="form-control">
                                </div>

                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                    <label>
                                        Ngày đặt
                                        :
                                    </label>
                                    <input type="text" value="<?php echo $order['date_created'] ?>" disabled class="form-control">
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php
 include('templates-admin/footer.php')
?>