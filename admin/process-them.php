<?php
    //Kiểm tra có đúng người dùng lưu
    if(isset($_POST['btnAdd'])) {
        $tenNV = $_POST['txthoten'];
        $chucVu = $_POST['txtchucvu'];
        $mayban=$_POST['txtmayban'];
        $email=$_POST['txtemail'];
        $sodidong = $_POST['sodidong'];
        $madv = $_POST['sltMaDV'];
        

    require("config/db.php");

    $sql = "INSERT INTO db_nhanvien(tennv, chucvu,mayban,email,sodidong,madv)
    VALUES ('$tenNV','$chucVu','$mayban','$email','$sodidong','$madv')";
    echo $sql;

    if(mysqli_query($conn,$sql)==TRUE){
        echo"Thêm thành công";
        header("location:".SITEURL.'index.php');
    }else{
        echo"Chưa thêm được";
    }


    }
   








?>