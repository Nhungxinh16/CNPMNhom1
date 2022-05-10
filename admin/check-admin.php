<?php
  if(isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null){
    $sql = "select is_admin from customers where customer_id = ?";
    $row = simpleQuery($sql, 1, [$_SESSION["user_id"]]);
    if(count($row) > 0 && $row[0]["is_admin"] == 0){
      header("location: ../error.php");
    }
  }else{
    header("location: ../error.php");
  }

?>