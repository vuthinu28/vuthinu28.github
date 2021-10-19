<?php 
    include('header.php');
?>
<?php
    require("config/db.php");
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Sửa Nhân Viên</h1>

        <br><br>

        <?php 
        
            //1. Get the ID of Selected Admin
            $id=$_GET['manv'];

            //2. Create SQL Query to Get the Details
            $sql="SELECT * FROM db_nhanvien WHERE manv=$id";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Check whether the query is executed or not
            if($res==true)
            {
                // Check whether the data is available or not
                $count = mysqli_num_rows($res);
                //Check whether we have admin data or not
                if($count==1)
                {
                    // Get the Details
                    //echo "Admin Available";
                    $row=mysqli_fetch_assoc($res);

                    $tennv = $row['tennv'];
                    $chucvu = $row['chucvu'];
                    $mayban=$row['mayban'];
                    $email=$row['email'];
                    $sodidong = $row['sodidong'];
                    $madv = $row['madv'];
                }
                else
                {
                    //Redirect to Manage Admin PAge
                    header('location:'.SITEURL.'index.php');
                }
            }
        
        ?>


<form action="process-sua.php" method="POST">
<table class="tbl-50">
    <tr>
        <td>Họ Tên: </td>
        <td>
            <input type="text" name="hoten" value="<?php echo $tennv;?>">
        </td>
    </tr>

    <tr>
        <td>Chức Vụ: </td>
        <td>
            <input type="text" name="chucvu" value="<?php echo $chucvu; ?>">
        </td>
    </tr>
    <tr>
        <td>Máy Bàn: </td>
        <td>
            <input type="text" name="mayban" value="<?php echo $mayban; ?>">
        </td>
    </tr>
    <tr>
        <td>Email: </td>
        <td>
            <input type="text" name="email" value="<?php echo $email; ?>">
        </td>
    </tr>
    <tr>
        <td>Số di động: </td>
        <td>
            <input type="text" name="sodidong" value="<?php echo $sodidong; ?>">
        </td>
    </tr>
    <tr>
        <td>Mã Đơn Vị: </td>
        <td>
            <input type="text" name="madv" value="<?php echo $madv; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="btnSua" value="Sửa" class="btn-secondary">
        </td>
    </tr>

</table>

</form>
</div>
</div>








<?php include('footer.php'); ?>