<?php
include 'connect.php'; 
date_default_timezone_set('Asia/Manila'); 
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reset'])) {
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $token = $_POST['token'];

    $stmt = $conn->prepare("SELECT email FROM tbl_password_reset WHERE token=? AND expire_time > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $email = $result->fetch_assoc()['email'];

        if ($new_password !== $confirm_password) {
            echo 'Passwords do not match.';
            exit;
        }
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("UPDATE tbl_admin SET password=? WHERE email=?");
        $stmt->bind_param("ss", $hashed_password, $email);
        
        if ($stmt->execute()) {
         
            $stmt = $conn->prepare("DELETE FROM tbl_password_reset WHERE token=?");
            $stmt->bind_param("s", $token);
            $stmt->execute();
            header('Location: login.php');
            exit;
        } else {
            echo 'An error occurred. Please try again.';
        }

        $stmt->close();
    } else {
        echo 'Invalid or expired token.';
    }

    $conn->close();
}
?>
