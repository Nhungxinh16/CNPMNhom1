<?php
    require_once("../config/constants.php");
    require_once("check-admin.php");
    if(isset($_GET["tours"]) && $_GET["tour_id"] != null){
        $id = $_GET["tour_id"];
        $sql = "select * from orders where tour_id = ?";
        $orders = simpleQuery($sql, 1, [$id]);
        if(count($orders) > 0){
            $_SESSION["alert"] = "Không thể xóa tour này vì đã có người đặt";
        }else{
            $sql = "delete from tours where tour_id = ?";
            $result = simpleQuery($sql, 0, [$id]);
            if($result){
                $_SESSION["alert"] = "Xóa tour thành công!";
            }else{
                $_SESSION["alert"] = "Không thể xóa tour!";
            }
        }
        header("location: index.php");
    }
    else if(isset($_GET["customers"]) && $_GET["id"] != null){
        $id = $_GET["id"];
        $sql = "select * from orders where customer_id = ?";
        $orders = simpleQuery($sql, 1, [$id]);
        if(count($orders) > 0){
            $sql = "update customers set status = -1 where customer_id = " . $id;
            $_SESSION["alert"] = "Không thể xóa khách này vì đây là khách vip";
        }else{
            $sql = "delete from customers where customer_id = ?";
            $result = simpleQuery($sql, 0, [$id]);
            if($result){
                $_SESSION["alert"] = "Xóa thành công!";
            }else{
                $_SESSION["alert"] = "Không thể xóa !";
            }
        }
        header("location: QLND.php");
    }
    else{
        header("location: index.php");
    }

?>