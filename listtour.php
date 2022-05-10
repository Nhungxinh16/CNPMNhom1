<?php
ob_start(); // loi cua header()
include("./templates/header.php");
require("config/constants.php");
if (isset($_GET['tour_type'])) {
    $tour = $_GET['tour_type'];
    $sql = "select count(tours.tour_id) as count,tours.tour_type_id, tours.tour_id, tours.tour_name, 
    tours.price_per_person, tours.day_count, cities.city_name, tours.image_1, 
    ranks.rank_name from tours, cities, ranks 
    where status != -1 and tours.tour_type_id = $tour and  tours.city_id = cities.city_id 
    and tours.tour_rank_id = ranks.rank_id group by tours.tour_id ORDER BY count DESC";
} elseif (isset($_GET['search'])) {
    $tour = $_GET['search'];
    $sql = "select tours.tour_id, tours.tour_name, 
    tours.price_per_person, tours.day_count, cities.city_name, tours.image_1, 
    ranks.rank_name from tours, cities, ranks where status != -1 and 
    cities.city_id = tours.city_id and tours.tour_rank_id = ranks.rank_id and tours.tour_name like '%$tour%' GROUP by tours.tour_id order BY tours.tour_id DESC
    ";
    
} else {
    $sql = "select * from tours, cities, ranks 
    where status != -1 and tours.city_id = cities.city_id 
    and tours.tour_rank_id = ranks.rank_id";
}
//check co hay khong
  $sreachResult = mysqli_query($conn, $sql);
  if(mysqli_num_rows($sreachResult) == 0){
    echo "<script type='text/javascript'>alert('Không tìm thấy kết quả');</script>"; 
  }
?>
<main>
    <div class="mr-auto ml-auto" style="max-width: 1300px">
        <br>
        <br>

        <div class="card-deck">
            <?php
            $tour = simpleQuery($sql);
            foreach ($tour as $t) {
                $price = $t["price_per_person"];
                $price = number_format($price, 0, "", ",");
                echo '
                <div class="card uu-dai taks">
                <div class="h-card-container">
                    <a href="more_info.php?tour_id=' . $t["tour_id"] . '">
                    <img src="' . $t["image_1"] . '" class="card-img-top h-latest-tour-image" alt="...">
                    </a>
                    <div class="h-card-rank">' . $t["rank_name"] . '</div>
                </div>
                <div class="card-body">
                    <p class="card-text mb-1"><small class="text-muted">28/10/2021 - ' . $t["day_count"] . ' ngày</small></p>
                    <a href="#"><h5 class="card-title pr-2 mb-1" style="color: #282365; font-size: medium;">' . $t["tour_name"] . '</h5></a>
                    <p class="card-text"><b style="font-size: large; color:#FD5056;">' . $price . 'đ</b><small class="text-muted">/người</small></p>
                    <a href="booking.php?tour_id=' . $t["tour_id"] . '" class="btn btn-danger" style="font-size: small; background-color: #D74449;"><i
                        class="fas fa-shopping-cart"></i>&#160;Đặt ngay</a>
                    <a href="more_info.php?tour_id=' . $t["tour_id"] . '" class="btn btn-light" style="font-size: small; background-color: #ffffff; float: right; border: 1px solid #2f24a7; color: #2f24a7;">Xem chi tiết</a>
                </div>
                </div>
            ';
            }
            ?>
        </div>
    </div>
</main>
<?php
include("./templates/footer.php");
?>