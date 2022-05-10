<!-- trang này dùng để thêm nhân viên -->

<?php
    require_once("../config/constants.php");
    require_once("check-admin.php");
    if(isset($_POST["submit"])){
        $user_name = $_POST["user_name"];
        $password = $_POST["password"];
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $email = $_POST["email"];
        $phone_number = $_POST["phone_number"];
        $birthday = $_POST["birthday"];
        $name = $_POST["name"];
        $gender = $_POST["gender"];
        $status = 1;
        $is_admin = 1;
        $sql = "insert into customers set user_name = ?, password = ?, email = ?, phone_number = ?, birthday = ?, name = ?, gender = ?, status = ?, is_admin = ? ";
        $result = simpleQuery($sql, 0, [$user_name, $pass, $email, $phone_number, $birthday, $name, $gender, $status, $is_admin]);
        if($result){
            $alert = "Thêm thành công";
            echo "<script type='text/javascript'>alert('$alert');</script>";
            header("location: QLNhanVien.php");
        }
    }
    include('templates-admin/header.php');
?>

<div class="main-content">
    <div class="wrapper">
        <div class="alert alert-success text-center" role="alert">
            <h2>Thêm nhân viên</h2>
            <div class="text-center text-danger">
            </div>
        </div>
  <!-- sửa -->
        <div class="container col-md-12 mx-auto">
            <form action="" method="POST">
                <div class="col-md-6 mx-auto">
                    <div class="input-group mb-2">
                        <span class="input-group-text col-3">Username</span>
                        <input type="text" class="form-control" name= "user_name" placeholder="Nhập tên người dùng" required value="">
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text col-3">Mật khẩu</span>
                        <input type="text" class="form-control" name= "password" placeholder="Nhập mật khẩu" required value="">
                    </div>
                    
                    <div class="input-group mb-2">
                        <span class="input-group-text col-3" >Email</span>
                        <input type="text" class="form-control" name= "email" placeholder="Nhập email" required value="">
                    </div>

                    <div class="input-group mb-2">
                        <span class="input-group-text col-3" >Số điện thoại</span>
                        <input type="text" class="form-control" name= "phone_number" placeholder="Nhập số điện thoại" required value="">
                    </div>
                    
                    <div class="input-group mb-2">
                        <span class="input-group-text col-3" >Birthday</span>
                        <input type="date" class="form-control" name= "birthday" placeholder="Nhập ngày sinh" required >
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text col-3" >Họ và tên</span>
                        <input type="text" class="form-control" name= "name" placeholder="Nhập họ và tên" required value="">
                    </div>

                    <div class="input-group mb-2">
                        <span class="input-group-text col-3" >Giới tính</span>
                        <select class="form-select form-select-sm" name="gender">
                            <option value="0" >Nữ</option>
                            <option value="1" >Nam</option>
                        </select>
                    </div>
                  <br>
                  <div class="d-flex justify-content-around">
                    <button type="submit" class="btn btn-info" name="submit">Thêm</button>
                    <button type="button" onclick="window.location = 'QLNhanVien.php'" class="btn btn-info" name="submit">Hủy</button>

                  </div>
                </div>
            </form>
                      
        </div>        
    </div>
</div>
<?php
    include('templates-admin/footer.php');
?>