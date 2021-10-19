
<?php

    require("config/db.php");
    $id = $_GET['manv'];


    $sql = "DELETE FROM db_nhanvien WHERE manv=$id";
    echo $sql;
    if(mysqli_query($conn,$sql)==TRUE){
            echo"Xóa thành công";
            header("location:".SITEURL.'index.php');
        }else{
            echo"Chưa xóa được";
        }



?>

