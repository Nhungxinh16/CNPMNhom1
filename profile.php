<?php
    require_once("config/constants.php");

    $userID =  $_SESSION["user_id"];
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $birth=$_POST['birthday'];
        $email=$_POST['email'];
        $phone=$_POST['phone_number'];
        $sql = "update customers set name = ?, birthday = ?, email = ?, phone_number = ? where customer_id = ?";
        $result = simpleQuery($sql, 0, [$name, $birth, $email, $phone, $userID]);
        if($result){
            header("location: profile.php");
        }
    }
    $_SESSION["nav"] = "none";
    require('templates/header.php');
    if(isset($_SESSION["alert"])){
        $message = $_SESSION["alert"];
        unset($_SESSION["alert"]);
        echo '<script>
                alert("'.$message.'");
            </script>
        ';
    }

    
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: aliceblue
}

.wrapper {
    padding: 30px 50px;
    border: 1px solid #ddd;
    border-radius: 15px;
    margin: 10px auto;
    max-width: 600px
}

h4 {
    letter-spacing: -1px;
    font-weight: 400
}

.img {
    width: 70px;
    height: 70px;
    border-radius: 6px;
    object-fit: cover
}

#img-section p,
#deactivate p {
    font-size: 12px;
    color: #777;
    margin-bottom: 10px;
    text-align: justify
}

#img-section b,
#img-section button,
#deactivate b {
    font-size: 14px
}

label {
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 500;
    color: #777;
    padding-left: 3px
}

.form-control {
    border-radius: 10px
}

input[placeholder] {
    font-weight: 500
}

.form-control:focus {
    box-shadow: none;
    border: 1.5px solid #0779e4
}

select {
    display: block;
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 10px;
    height: 40px;
    padding: 5px 10px
}

select:focus {
    outline: none
}

.button {
    background-color: #fff;
    color: #0779e4
}

.button:hover {
    background-color: #0779e4;
    color: #fff
}

.btn-primary {
    background-color: #0779e4
}

.danger {
    background-color: #fff;
    color: #e20404;
    border: 1px solid #ddd
}

.danger:hover {
    background-color: #e20404;
    color: #fff
}

@media(max-width:576px) {
    .wrapper {
        padding: 25px 20px
    }

    #deactivate {
        line-height: 18px
    }
}
</style>
<?php
    
    $sql = 'select * from customers where customer_id  = ?';
    $cus = simpleQuery($sql, 1, [$userID])[0];

    $name = $cus['name'];
    $birth = $cus['birthday'];
    $email = $cus['email'];
    $phone = $cus['phone_number'];
?>
    <div class="wrapper bg-white mt-sm-5">
    <h4 class="pb-4 border-bottom">Thông tin cá nhân</h4>
    <div class="d-flex align-items-start py-3 border-bottom"> <img src="https://images.pexels.com/photos/1037995/pexels-photo-1037995.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="img" alt="">
    </div>
    <div class="py-2">
        <div class="row py-2">
            <div class="col-md-6"> <label for="firstname">Họ và tên</label> <input disabled type="text" class="bg-light form-control" placeholder="Đặng" value="<?php echo $name; ?>"> </div>
            <div class="col-md-6 pt-md-0 pt-3"> <label for="lastname">Ngày sinh</label> <input disabled type="date" class="bg-light form-control" value="<?php echo $birth; ?>"> </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6"> <label for="email">Địa chỉ Email</label> <input disabled type="text" class="bg-light form-control" placeholder="vinhveoveo21@gmail.com"  value="<?php echo $email; ?>"> </div>
            <div class="col-md-6 pt-md-0 pt-3"> <label for="phone">Số điện thoại</label> <input disabled type="tel" class="bg-light form-control" placeholder="+84 338-873-927"  value="<?php echo $phone; ?>"> </div>
        </div>
        </div>
        <div class="py-3 pb-4 border-bottom"> <button class="btn btn-primary mr-3" data-toggle="modal" data-target="#exampleModalCenter">Sửa đổi</button>  </div>
        <div class="d-sm-flex align-items-center pt-3" id="deactivate">
            <div> <b>Thay đổi mật khẩu</b>
                <p>Đặt lại mật khẩu định kì có thể giúp tăng tính báo mật</p>
            </div>
            <div class="ms-auto"> <button class="btn danger">Thay đổi mật khẩu</button> </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sửa thông tin cá nhân</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
            <div class="py-2">
                <div class="row py-2">
                    <div class="col-md-6"> <label for="firstname">Họ và tên</label> <input type="text" name='name' class="bg-light form-control" placeholder="Đặng" value="<?php echo $name; ?>"> </div>
                    <div class="col-md-6 pt-md-0 pt-3"> <label for="lastname">Ngày sinh</label> <input type="date" name='birthday' class="bg-light form-control" value="<?php echo $birth; ?>"> </div>
                </div>
                <div class="row py-2">
                    <div class="col-md-6"> <label for="email">Địa chỉ Email</label> <input type="text"  name='email' class="bg-light form-control" placeholder="vinhveoveo21@gmail.com"  value="<?php echo $email; ?>"> </div>
                    <div class="col-md-6 pt-md-0 pt-3"> <label for="phone">Số điện thoại</label> <input type="tel" name='phone_number' class="bg-light form-control" placeholder="+84 338-873-927"  value="<?php echo $phone; ?>"> </div>
                </div>
                </div>
                <div class="py-3 pb-4 border-bottom"> <button class="btn btn-primary mr-3" type='submit' name='submit'>Sửa đổi</button> <button data-dismiss="modal" class="btn border button">Đóng</button> </div>
                <div class="d-sm-flex align-items-center pt-3" id="deactivate">
                    <div> <b>Thay đổi mật khẩu</b>
                        <p>Đặt lại mật khẩu định kì có thể giúp tăng tính báo mật</p>
                    </div>
                    <div class="ms-auto"> <button class="btn danger">Thay đổi mật khẩu</button> </div>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
    include('templates/footer.php')
?>