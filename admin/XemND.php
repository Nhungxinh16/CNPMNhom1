<?php
ob_start(); // loi cua header()

require("../config/constants.php");
require_once("check-admin.php");
$_SESSION["nav"] = "customers";
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
    $sql = "SELECT * from customers where customer_id = '$id'";
    $res = mysqli_query($conn, $sql);
    $customer = mysqli_fetch_assoc($res);
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
                    <h2 style="color:#1583e0 !important;"> Thông tin nhân viên <?php echo $customer['user_name'] ?></h2>
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
                                                Họ và tên
                                                :
                                            </label>
                                            <input type="text" value = "<?php echo $customer['user_name'] ?>" disabled class="form-control">
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <label>
                                        Giới tính
                                        :
                                    </label>
                                <input type="text" value = "<?php echo $customer['gender']== 0 ? "Nữ" :"Nam"?>" disabled class="form-control">
                                    
                                </div>
                                
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                    <label>
                                        Ngày sinh
                                        :
                                    </label>
                                    <input type="text" value = "<?php echo $customer['birthday'] ?>" disabled class="form-control">
                                </div>
                                
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                    <label>
                                        Di động
                                        :
                                    </label>
                                    <input type="text" value = "<?php echo $customer['phone_number'] ?>" disabled class="form-control">
                                </div>
                                
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                    <label>
                                        Email
                                        :
                                    </label>
                                    <input type="text" value="<?php echo $customer['email'] ?>" disabled class="form-control">
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