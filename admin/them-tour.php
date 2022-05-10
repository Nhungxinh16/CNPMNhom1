<!-- trang này dùng để thêm các tour -->
<?php
    require_once("../config/constants.php");
    require_once("check-admin.php");
    if(isset($_POST["submit"])){
        $tour_name = $_POST["tour_name"];
        $description = $_POST["description"];
        $places = $_POST["places"];
        $day_count = $_POST["day_count"];
        $price_per_person = $_POST["price_per_person"];
        $max = $_POST["max"];
        $image_1 = $_POST["image_1"];
        $image_2 = $_POST["image_2"];
        $image_3 = $_POST["image_3"];
        $image_4 = $_POST["image_4"];
        $travel_schedule = $_POST["travel_schedule"];
        $res_id = $_POST["res_id"];
        $hotel_id = $_POST["hotel_id"];
        $city_id = $_POST["city_id"];
        $tour_guide_id = $_POST["tour_guide_id"];
        $tour_type_id = $_POST["tour_type_id"];
        $tour_rank_id = $_POST["tour_rank_id"];
        $sql = "insert into tours set tour_name = ?, description = ?, places = ?, day_count = ?, res_id = ?, hotel_id = ?, price_per_person = ?, image_1 =?, image_2 =?, image_3 =?, image_4 = ?, city_id =?, tour_guide_id = ?, tour_type_id = ?, tour_rank_id = ?, travel_schedule = ?, max = ?";
        $result = simpleQuery($sql, 0, [$tour_name, $description, $places, $day_count, $res_id, $hotel_id, $price_per_person, $image_1, $image_2, $image_3, $image_4, $city_id, $tour_guide_id, $tour_type_id, $tour_rank_id, $travel_schedule, $max]);
        if($result){
          $successAlert="Thêm thành công!";
          echo "<script type='text/javascript'>alert('$successAlert'); window.location.href='index.php';</script>";
          // header("location: index.php");
        }
    }
    include('templates-admin/header.php');
?>

<div class="main-content">
    <div class="wrapper">
        <div class="alert alert-success text-center" role="alert">
            <h2>Thêm tour</h2>
            <div class="text-center text-danger">
            </div>
        </div>
  <!-- Thêm -->
        <div class="container col-md-12 mx-auto">
            <form style="margin-bottom: 20%;" action="them-tour.php" METHOD="POST">
                <div class="col-md-6 mx-auto">
                    <div class="input-group mb-2">
                        <span class="input-group-text col-3">Tên tour</span>
                        <input type="text" class="form-control" name= "tour_name" placeholder="Nhập tên tour" required>
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text col-3" >Mô tả</span>
                        <input type="text" class="form-control" name= "description" placeholder="Nhập mô tả">
                    </div>
                    
                    <div class="input-group mb-2">
                        <span class="input-group-text col-3" >Các điểm đến</span>
                        <input type="text" class="form-control" name= "places" placeholder="Nhập các điểm đến" required>
                    </div>

                    <div class="input-group mb-2"> 
                        <span class="input-group-text col-3" >Số ngày</span>
                        <input type="number"  min = "1" max = "15" class="form-control" name="day_count" placeholder="Nhập số ngày" required>      
                    </div>

                    <div class="input-group mb-2"> 
                        <span class="input-group-text col-3" >Số người tối đa</span>
                        <input type="number"  min = "1" max = "15" class="form-control" name="max" placeholder="Nhập số người tối đa" required>      
                    </div>

                    <div class="input-group mb-2"> 
                        <span class="input-group-text col-3" >Giá tour</span>
                        <input type="number"  min = "100000" max = "100000000" class="form-control" name="price_per_person" placeholder="Nhập giá tour" required>      
                    </div>

                    <div class="input-group mb-2"> 
                        <span class="input-group-text col-3" >Hình ảnh 1</span>
                        <input type="text" class="form-control" name="image_1" placeholder="Link hình 1" required>             
                    </div>

                    <div class="input-group mb-2"> 
                        <span class="input-group-text col-3" >Hình ảnh 2</span>
                        <input type="text" class="form-control" name="image_2" placeholder="Link hình 2" required>             
                    </div>

                    <div class="input-group mb-2"> 
                        <span class="input-group-text col-3" >Hình ảnh 3</span>
                        <input type="text" class="form-control" name="image_3" placeholder="Link hình 3" required>             
                    </div>

                    <div class="input-group mb-2"> 
                        <span class="input-group-text col-3" >Hình ảnh 4</span>
                        <input type="text" class="form-control" name="image_4" placeholder="Link hình 4" required>             
                    </div>
                    
                    <div class="input-group mb-2"> 
                        <span class="input-group-text col-3" >Lịch trình</span>
                        <textarea class="form-control" name="travel_schedule" cols="30" rows="10"></textarea>
                    </div>

                    <div class="input-group mb-2 ">
                        <label class="input-group-text col-3" for="inputGroupSelect01">Tên nhà hàng</label>
                        <select class="form-select form-select-sm" name="res_id">
                            <?php 
                                $sql = "select * from restaurants";
                                $rows = simpleQuery($sql);
                                foreach($rows as $row){
                                    echo '<option value="'.$row["res_id"].'">'.$row["res_name"].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-2 ">
                        <label class="input-group-text col-3" for="inputGroupSelect01">Tên khách sạn</label>
                        <select class="form-select form-select-sm" name="hotel_id">
                            <?php 
                                $sql = "select * from hotels";
                                $rows = simpleQuery($sql);
                                foreach($rows as $row){
                                    echo '<option value="'.$row["hotel_id"].'">'.$row["hotel_name"].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-2 ">
                        <label class="input-group-text col-3" for="inputGroupSelect01">Tên thành phố</label>
                        <select class="form-select form-select-sm" name="city_id" required>
                            <?php 
                                $sql = "select * from cities";
                                $rows = simpleQuery($sql);
                                foreach($rows as $row){
                                    echo '<option value="'.$row["city_id"].'">'.$row["city_name"].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-2 ">
                        <label class="input-group-text col-3" for="inputGroupSelect01">Tên hướng dẫn viên</label>
                        <select class="form-select form-select-sm" name="tour_guide_id">
                            <?php 
                                $sql = "select * from tourguides";
                                $rows = simpleQuery($sql);
                                foreach($rows as $row){
                                    echo '<option value="'.$row["tour_guide_id"].'">'.$row["name"].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-2 ">
                        <label class="input-group-text col-3" for="inputGroupSelect01">Tên loại tour</label>
                        <select class="form-select form-select-sm" name="tour_type_id" required>
                            <?php 
                                $sql = "select * from tourtypes";
                                $rows = simpleQuery($sql);
                                foreach($rows as $row){
                                    echo '<option value="'.$row["tour_type_id"].'">'.$row["type_name"].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-2 ">
                        <label class="input-group-text col-3" for="inputGroupSelect01">Tên hạng</label>
                        <select class="form-select form-select-sm" name="tour_rank_id" required>
                            <?php 
                                $sql = "select * from ranks";
                                $rows = simpleQuery($sql);
                                foreach($rows as $row){
                                    echo '<option value="'.$row["rank_id"].'">'.$row["rank_name"].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <br>
                    <div class="d-flex justify-content-around">
                      <button type="submit" class="btn btn-info" name="submit">Thêm</button>
                      <button type="submit" onclick="window.location='index.php'" class="btn btn-info" name="submit">Hủy</button>

                    </div>
                </div>
            </form>
        </div>        
    </div>
</div>
<?php
    include('templates-admin/footer.php');
?>