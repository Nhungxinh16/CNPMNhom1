<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css-admin/styles.css" />
    <title>Admin</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>Admin</div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?php if($_SESSION["nav"] == "tours") echo "active"; ?>"><i
                        class="fas fa-tachometer-alt me-2"></i>Quản lý tour</a>
                <a href="QLNhanVien.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?php if($_SESSION["nav"] == "staff") echo "active"; ?>"><i
                        class="fas fa-project-diagram me-2"></i>Quản lý nhân viên</a> 
                <a href="QLDDTour.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?php if($_SESSION["nav"] == "orders") echo "active"; ?>"><i
                        class="fas fa-paperclip me-2"></i>Quản lý đơn đặt tour</a>  
                <a href="QLND.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?php if($_SESSION["nav"] == "customers") echo "active"; ?>"><i
                        class="fas fa-shopping-cart me-2"></i>Quản lý khách hàng</a>         
              
                <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Đăng xuất</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php
                                  // $sql = "select user_name from customers where customer_id = ?";
                                  // $abcd = simpleQuery($sql, 1, [$_SESSION["user_id"]])[0];
                                  echo '<i class="fas fa-user me-2"></i>';
                                  // echo $abcd["user_name"]; 

                                ?>
                            </a>
                            <ul class="dropdown-menu" style="right: 0; left: auto;" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Trang cá nhân</a></li>
                                <li><a class="dropdown-item" href="../index.php"> Trang guess</a></li>
                                <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>