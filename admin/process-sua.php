<?php
  require("config/db.php");
if(isset($_POST['btnSua']))
{
  
   
//echo "Button CLicked";
//Get all the values from form to update
        $id = $_POST['id'];
        $tennv = $_POST['hoten'];
        $chucvu = $_POST['chucvu'];
        $mayban=$_POST['mayban'];
        $email =$_POST['email'];
        $sodidong = $_POST['sodidong'];
        $madv = $_POST['madv'];

       

        //Create a SQL Query to Update Admin
        $sql = "UPDATE db_nhanvien SET

        tennv = '$tennv',
        chucVu = '$chucvu',
        mayban= '$mayban',
        email= '$email',
        sodidong = '$sodidong',
        madv = '$madv'
        WHERE manv='$id'
        ";

//Execute the Query


//Check whether the query executed successfully or not
if(mysqli_query($conn, $sql)==true)
{
    //Query Executed and Admin Updated
    echo"Sửa thành công.";
    //Redirect to Manage Admin Page
    header('location:'.SITEURL.'index.php');
}
else
{
    //Failed to Update Admin
    echo"Không sửa được.";
    //Redirect to Manage Admin Page

}
}

?>