<?php
    require_once("../config/constants.php");
    require_once("check-admin.php");
    if(isset($_GET["tours"]) && $_GET["tour_id"] != null){
        $id = $_GET["tour_id"];
        $sql = "update tours set status = -1 where tour_id = " . $id;
        $result = simpleQuery($sql, 0, []);
        if($result){
            $_SESSION["alert"] = "Xóa thành công!";
        }else{
            $_SESSION["alert"] = "Không thể xóa 1 !";
        }
        header("location: index.php");
    }
    else if(isset($_GET["customers"]) && $_GET["id"] != null){
        $id = $_GET["id"];
        $sql = "update customers set status = -1 where customer_id = " . $id;
        $result = simpleQuery($sql, 0, []);
        if($result){
            $_SESSION["alert"] = "Xóa thành công!";
        }else{
            $_SESSION["alert"] = "Không thể xóa 1 !";
        }
        header("location: QLNhanVien.php");
    }
    else{
        header("location: index.php");
    }

?>