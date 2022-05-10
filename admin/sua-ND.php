<!-- trang này dùng để sửa thông tin người dùng -->

<?php
    require_once("../config/constants.php");
    require_once("check-admin.php");
    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $birthday = $_POST["birthday"];
        $phone_number = $_POST["phone_number"];
        $gender = $_POST["gender"];
        $name = $_POST["name"];
        $sql = "update customers set email = ?, birthday = ?, phone_number = ?, name = ?, gender = ? where customer_id = ?";
        $result = simpleQuery($sql, 0, [$email, $birthday, $phone_number, $name, $gender, $_GET["id"]]);
        if($result){
          $successAlert="Sửa thành công!";
          echo "<script type='text/javascript'>alert('$successAlert'); window.location.href='QLND.php';</script>";
          // header("location: QLND.php");
        }
    }
    $row = null;
    if(isset($_GET["id"]) && $_GET["id"] != null){
        $sql = "select * from customers where customer_id = ?";
        $row = simpleQuery($sql, 1, [$_GET["id"]])[0];
    }
    include('templates-admin/header.php');
?>

<div class="main-content">
    <div class="wrapper">
        <div class="alert alert-success text-center" role="alert">
            <h2>Sửa thông tin</h2>
            <div class="text-center text-danger">
            </div>
        </div>
  <!-- sửa -->
        <div class="container col-md-12 mx-auto">
            <form action="sua-ND.php?id=<?php echo $row['customer_id']; ?>" method="POST">
                <div class="col-md-6 mx-auto">
                    <div class="input-group mb-2">
                        <span class="input-group-text col-3">Username</span>
                        <input disabled type="text" class="form-control" name= "user_name" placeholder="Nhập tên người dùng" required value="<?php echo $row["user_name"]; ?>">
                    </div>

                    <div class="input-group mb-2">
                        <span class="input-group-text col-3" >Email</span>
                        <input type="text" class="form-control" name= "email" placeholder="Nhập email" required value="<?php echo $row["email"]; ?>">
                    </div>

                    <div class="input-group mb-2">
                        <span class="input-group-text col-3" >Số điện thoại</span>
                        <input type="text" class="form-control" name= "phone_number" placeholder="Nhập số điện thoại" required value="<?php echo $row["phone_number"]; ?>">
                    </div>
                    
                    <div class="input-group mb-2">
                        <span class="input-group-text col-3" >Birthday</span>
                        <input type="date" class="form-control" name= "birthday" placeholder="Nhập ngày sinh" required value="<?php 
                            $date = date_create($row["birthday"]);
                            echo date_format($date, "Y-m-d");
                        ?>">
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text col-3" >Họ và tên</span>
                        <input type="text" class="form-control" name= "name" placeholder="Nhập họ và tên" required value="<?php echo $row["name"]; ?>">
                    </div>

                    <div class="input-group mb-2">
                        <span class="input-group-text col-3" >Giới tính</span>
                        <select class="form-select form-select-sm" name="gender">
                            <option value="0" <?php if($row["gender"] == 0 ) echo "selected" ?>>Nữ</option>
                            <option value="1" <?php if($row["gender"] == 1 ) echo "selected" ?>>Nam</option>
                        </select>
                    </div>
          <br>
          <div class="d-flex justify-content-around">
            <button type="submit" class="btn btn-info" name="submit">Sửa</button>
            <button type="button" onclick="window.location = 'QLND.php'" class="btn btn-info" name="submit">Hủy</button>

          </div>
                </div>
            </form>
                      
        </div>        
    </div>
</div>
<?php
    include('templates-admin/footer.php');
?>