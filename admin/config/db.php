<?php
 define('SITEURL', 'http://localhost:8080/dhtl/');

 $conn = mysqli_connect('localhost','root','','danhba-dhtl');
 if(!$conn){
     die("Không thể kết nối");
 }

 ?>