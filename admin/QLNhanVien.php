<?php
    require("../config/constants.php");
    require_once("check-admin.php");
    $_SESSION["nav"] = "staff";
    require('templates-admin/header.php');
    if(isset($_SESSION["alert"])){
        $message = $_SESSION["alert"];
        unset($_SESSION["alert"]);
        echo '<script>
                alert("'.$message.'");
            </script>
        ';
    }
    $key='';
    if(isset($_GET['key'])){
        $key=$_GET['key'];
    }
?>
            <div class="container-fluid px-4" style="margin-bottom: 20%;">
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Quản lý nhân viên</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm mt-3  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Điện thoại</th>
                                    <th scope="col">Giới tính</th>
                                    <th scope="col">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i = 1;
                                    $sql = "select * from customers where is_admin = 1 and status != -1 and user_name like '%".$key."%'";
                                    $rows = simpleQuery($sql);
                                    foreach($rows as $row){
                                        echo '
                                            <tr>
                                                <th scope="row">'.$i.'</th>
                                                <td>'.$row["user_name"].'</td>
                                                <td>'.$row["email"].'</td>
                                                <td>'.$row["phone_number"].'</td>
                                                <td>';
                                                    if($row["gender"] == 0){
                                                        echo "Nữ";
                                                    }else{
                                                        echo "Nam";
                                                    }
                                                echo '</td>
                                                <td><a onclick="return confirmFuncc()" href="xoa.php?customers=&id='.$row["customer_id"].'"><i class="fas fa-trash"></i></a></td>
                                            </tr>
                                        ';
                                        $i++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
          <div>
            <form action="export-import.php" method="POST" enctype="multipart/form-data">
                <button class="btn btn-primary" type="button"><a href="them_NV.php" style="color:white;">Thêm</a></button>
            </form>
        </div>
<?php
    include('templates-admin/footer.php')
?>
<html>
<script language="javascript" type="text/javascript">
  function confirmFuncc(){
    return confirm("Bạn có chắc chắn muốn xóa không?");
  }
</script>
</html>