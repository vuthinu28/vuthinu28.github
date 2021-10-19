<?php
$to_email = "vuthinu27@gmail.com";
include 'process-register.php';
mail($to_email, $subject, $body, $headers);

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email";
} else {
    echo "Email sending failed";
}
?>
