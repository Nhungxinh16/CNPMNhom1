<?php
  require("config/constants.php");
  if(isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null){
    header("location: index.php");
  }
  if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "select * from customers where user_name ='$username'";
    $result_1 = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result_1) > 0) {
      $row = mysqli_fetch_assoc($result_1);
      $pass_saved = $row['password'];
      if (password_verify($password, $pass_saved)) {
        $_SESSION['login'] = "<div class='text-success'>Đăng nhập thành công.</div>";
        $sql = "select customer_id from customers where user_name = ?";
        $cus = simpleQuery($sql, 1, [$username])[0];
        $_SESSION['user'] = $username;
        $_SESSION["user_id"] = $cus["customer_id"];
        
        if(isset($_SESSION["last_point"])){
          $page = $_SESSION["last_point"];
          $id = $_SESSION["tour_id"];
          unset($_SESSION["last_point"]);
          unset($_SESSION["tour_id"]);
          header("location: $page?tour_id=$id");
        }else{
          header('location: index.php');
        }
      } else {
        $_SESSION['login'] = "<div class='text-danger'>Sai tên đăng nhập hoặc mật khẩu</div>";
        // header("Location:login.php");
      }
    } else {
      $_SESSION['login'] = "<div class='text-danger'>Sai tên đăng nhập hoặc mật khẩu</div>";
      // header("Location:login.php");
    }
  }
  ob_end_flush();


  include('templates/header-login.php');
?>

<body>


  <div class="d-lg-flex half justify-content-center mt-5 mb-5">
    <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.jpg');width: 35%;  background-position: center;background-repeat: no-repeat;background-size: cover;"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <div class="mb-4">
              <h3>Đăng Nhập</h3>
            </div>
            <?php

            if (isset($_SESSION['login'])) {
              echo $_SESSION['login'];
              unset($_SESSION['login']);
            }
            if (isset($_SESSION['reg_success'])) {
              echo $_SESSION['reg_success'];
              unset($_SESSION['reg_success']);
            }

            ?>
            <form action="login.php" method="POST">
              <div class="form-group first">
                <input type="text" class="form-control" name="username" id="username" placeholder="Tài khoản">

              </div>
              <div class="form-group last mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="mật khẩu">

              </div>

              <div class='d-flex flex-row'>
                <button type="submit" name="login" value="Đăng Nhập" class="btn btn-block btn-primary">Đăng Nhập</button>
                <div class="btn btn-block btn-primary mt-0 ms-2 d-flex justify-content-center align-items-center" style='background-color: #1da1f2; border-color: #1da1f2;'>
                  <a href="register.php" style="color:#fff;text-decoration:none;">Đăng ký</a>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>


  </div>
</body>
<?php
include('templates/footer.php')
?>