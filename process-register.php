<!-- Register.php gửi theo PT POST > process-register.php: truy vấn từ mảng $_POST -->
<!-- Xem hình thù 1 MẢNG trước khi xử lý nó -->

<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    include('config/db.php');


  
  
    if(isset($_POST['btnRegister']))
    {

            $first_name = $_POST['firstName'];
            $last_name  = $_POST['lastName'];
            $email      = $_POST['email'];
            $pass1      = $_POST['pass1'];
            $pass2      = $_POST['pass2'];
   
    

            // Bước 02: Thực hiện các truy vấn
            // 2.1 - Kiểm tra Email này đã tồn tại chưa?
            $sql_1 = "SELECT * FROM users WHERE email='$email'";
            $result_1 = mysqli_query($conn,$sql_1);

           
            echo $strActivation;

            if(mysqli_num_rows($result_1) > 1){
                $value='existed';
                header("Location:register.php?response=$value");
            }else{
                // 2.2 - Nếu ko tồn tại thì mới LƯU
                // Băm mật khẩu
                $pass_hash = password_hash($pass1,PASSWORD_DEFAULT);
                $strRandom = rand(1000,9999);
                $strActivation = md5($strRandom);
                $sql = "INSERT INTO users(first_name, last_name, email, password,activation) VALUES ('$first_name','$last_name','$email','$pass_hash','$strActivation')";
                $result= mysqli_query($conn,$sql);
            } //Vì lệnh thực hiện là INSERT: kết quả trả về của $result_2 là SỐ BẢN GHI CHÈN THÀNH CÔNG (SỐ NGUYÊN)
        
    
            
         
                //Gửi email tới địa chỉ email đã đăng ký
                //Server trung gian gửi tới email
                require'phpmailer/Exception.php';
                require'phpmailer/PHPMailer.php';
                require'phpmailer/SMTP.php';
                $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;// Enable verbose debug output
                $mail->isSMTP();// gửi mail SMTP
                $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
                $mail->SMTPAuth = true;// Enable SMTP authentication
                $mail->Username = 'vuthinu27@gmail.com';// SMTP username
                $mail->Password = 'jwfllgxnhhbcavtj'; // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port = 587; // TCP port to connect to
                $mail->CharSet = 'UTF-8';
                //Recipients
                $mail->setFrom('vuthinu27@gmail.com','DHTL' );
                $mail->addReplyTo('vuthinu27@gmail.com','DHTL');
                
                $mail->addAddress('vuthinu27@gmail.com'); // Add a recipient
                
                // Attachments
                // $mail->addAttachment('pdf/XTT/'.$data[11].'.pdf', $data[11].'_1.pdf'); // Add attachments
                //$mail->addAttachment('pdf/Giay_bao_mat_sau.pdf'); // Optional name

                // Content
                $mail->isHTML(true);   // Set email format to HTML
                $mail->Subject = '[Xác thực tài khoản DHTL ]';
                
                // Mail body content 
                $mail->Body    = '<p>Xin chào<b> ' . $first_name . ',</b></p>';
                $mail->Body .= '<p>Bạn đã đăng ký tài khoản thành công, để xác thực tài khoản, bạn vui lòng nhấp vào đường link dưới đây:</p>'; 
                $mail->Body .= '<a href="http://localhost:8080/dhtl/activation.php?accout=' . $email . '&code=' . $strActivation . '">Click here</a>';
               
                
    
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                if($mail->send()){
                    echo 'Thư đã được gửi đi';
                }else{
                    echo 'Lỗi. Thư chưa gửi được';
                }  

            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: {$mail->ErrorInfo}';
            }



                //Phản hồi lại trang đăng ký
        if($result > 0){
            header("Location: login.php?status=0");
        }

        else {
                echo "Đăng ký thất bại";
            }
            }
     

?>