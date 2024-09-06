<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
    width: 100%;
height: 100vh;
background-image: url("images/cover.jpg");
background-repeat: no-repeat;
background-size: cover;
}
        </style>
</head>
<body>
    <div class="illustration-container">
        <div class="login-form-container">
            <h1 class="head">Forgot password?</h1>
            <p class="short-text" id="email-error">No worries. We'll send you reset instructions.</p>
            <br>
            <div>
                <form method="POST" action="">
                    <div>
                        <label for="email" class="forgot-password">Email address</label>
                        <br>
                        <input type="email" id="email" name="email" class="email" required aria-describedby="email-error">
                    </div>
                    <div class="text-center">
                        <p class="custom-input">
                            Remember your password?
                            <a href="login.php">Login here</a>
                        </p>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Send">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
include 'connect.php'; 
require 'vendor/autoload.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    
  
    $stmt = $conn->prepare("SELECT Admin_ID FROM tbl_admin WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $Admin_ID = $result->fetch_assoc()['Admin_ID'];
        
     
        $token = bin2hex(random_bytes(32));
        
     
        $expire_time = gmdate("Y-m-d H:i:s", strtotime('+24 hours'));
        
 
        $stmt = $conn->prepare("INSERT INTO tbl_password_reset (email, token, expire_time) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $token, $expire_time);
        $stmt->execute();
        
     
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'asacelms@gmail.com'; 
            $mail->Password = 'ymzmvjjmoboatmve'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
            $mail->Port = 587; 
            $mail->setFrom('asacelms@gmail.com', 'Academy of St.Andrew - Caloocan(ASAC).');
            $mail->addAddress($email); 
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';

            $reset_link = "http://localhost/change.php?token=" . $token;
            $mail->Body = "Click the link below to reset your password:<br><br><a href='$reset_link'>$reset_link</a>";
            $mail->AltBody = "Click the link below to reset your password:\n\n" . $reset_link; // Text version for non-HTML mail clients

  
            $mail->send();
            echo 'Password reset link has been sent to your email.';
        } catch (Exception $e) {
            echo 'Failed to send the password reset email. Mailer Error: ', $mail->ErrorInfo;
        }
    } else {
        echo 'Email address not found.';
    }
}
?>
