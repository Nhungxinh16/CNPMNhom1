<?php include("../config/constants.php") ?>
<?php
    if(isset($_POST["export"])){

        header('Content-Encoding: UTF-8');
        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename=export.csv');  
        $output = fopen("php://output", "w");  
        fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
        fputcsv($output, array("STT", "TenND", "Email", "DienThoai", "GioiTinh")); 

        $sql = "select customer_id, user_name, email, phone_number, gender from customers";
        $result = mysqli_query($conn,$sql);
        $i = 0;
        if (mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result)){ 
                $i++;
                $new_row = array($i, $row['user_name'], $row['email'], $row['phone_number'], $row['gender']);
                fputcsv($output, $new_row); 
            }
        }  
        fclose($output);  
    }  
?>
