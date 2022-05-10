<!-- trang này là trang mà ban đầu admin đăng nhập vào sẽ thấy
nó đang ở chỗ quản lý tour 
-->

<?php
    require_once("../config/constants.php");
    require_once("check-admin.php");

    $_SESSION["nav"] = "tours";
    require('templates-admin/header.php');
    if(isset($_SESSION["alert"])){
        $message = $_SESSION["alert"];
        unset($_SESSION["alert"]);
        echo '<script>
                alert("'.$message.'");
            </script>
        ';
    }
    
?>

            <div class="container-fluid px-4" style="margin-bottom: 20%;">

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Quản lý tour</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Tên tour</th>
                                    <th scope="col">Số ngày</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Thành phố</th>
                                    <th scope="col">Loại tour</th>
                                    <th scope="col">Hạng</th>
                                    <th scope="col">Sửa</th>
                                    <th scope="col">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "select * from tours, cities, tourtypes, ranks where tours.city_id = cities.city_id and tours.tour_rank_id = ranks.rank_id and tours.tour_type_id and tourtypes.tour_type_id group by tours.tour_id order by tours.tour_id desc";
                                    $tours = simpleQuery($sql);
                                    $i = 1;
                                    foreach($tours as $t){
                                        echo '
                                            <tr>
                                                <th scope="row">'.$i.'</th>
                                                <td>'.$t["tour_name"].'</td>
                                                <td>'.$t["day_count"].'</td>
                                                <td>'.$t["price_per_person"].'đ</td>
                                                <td>'.$t["city_name"].'</td>
                                                <td>Tour '.$t["type_name"].'</td>
                                                <td>'.$t["rank_name"].'</td>
                                                <td><a href="sua-tour.php?tour_id='.$t["tour_id"].'"><i class="fas fa-edit"></i></a></td>
                                                <td><a onclick="return confirmFuncc()" href="xoa.php?tours=&tour_id='.$t["tour_id"].'"><i class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                        ';
                                        $i++;
                                    }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" style="margin-bottom: 12px"><a href="them-tour.php" class="text-white">Thêm</a></button>


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