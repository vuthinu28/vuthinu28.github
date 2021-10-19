<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="UTP-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Danh Bạ Điện Tử</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../learning_web/style.css"> 
    </head>
    <body>
        <div class="container-fluid"> 
          <img src="C:/xampp/htdocs/dhtl3/logo.png" alt="">
            <div class="row header">
               
              <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
                  <div class="container-fluid">
                    <a class="navbar-brand" href="#">Administration</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="#">Quản lý danh bạ người dùng</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Quản lý danh bạ đơn vị</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Quản lý tài khoản</a>
                        </li>
                      </ul>
                    </div>
                  </div>                      
                </nav>
                
            </div>
            <div class="row nav-menu">
                <div class="row">  
                  <div class="col-md">
                   
                      <table class="table table-success table-striped">
                          
                          <tbody>
                            <?php
                              $conn = mysqli_connect('localhost','root','','danhba-dhtl');
                              if(!$conn){
                                die("Không thể kết nối");
                              }
                                $sql="SELECT nv.manv, nv.tennv, nv.chucvu, nv.email, nv.sodidong, dv.tendv FROM db_nhanvien nv, db_donvi dv WHERE nv.madv=dv.madv";
                                $result = mysqli_query($conn,$sql);

                                //xuwr lys keets quar trarve
                              if(mysqli_num_rows($result)>0){
                                $i=1;
                                while($row = mysqli_fetch_assoc($result)){
                            ?>      
                           
                          <?php
                            
                              }
                            }
                          ?>
                          </tbody>
                        </table>
                  </div>
                </div>
            </div>
        </div>
    </body>
</html>