<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="icon" href="images/logasac.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            width: 100%;
            height: 100vh;
            background-image: url("images/cover.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .button-container {
            text-align: center;
            margin-top: 10px;
        }

        .btn {
            background: gray;
            width: 100px;
            padding: 5px;
            border-radius: 25px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            border: none;
            color: white;
        }

        .forgot-password {
            display: block;
            margin-bottom: 10px;
            color: blue;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .exit-logo {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 30px;
            font-weight: bold;
            color: #000;
            text-decoration: none;
            background: rgba(255, 255, 255, 0.7); /* Light transparent background */
            padding: 5px 10px;
            border-radius: 50%;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .exit-logo:hover {

            color: #ff0000; /* White color for the X */
           
        }

        .exit-logo:active {
            transform: scale(0.95); /* Slightly shrink the X on click */
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-lg-6 d-none d-lg-block illustration-container">
                <div class="d-flex flex-column justify-content-center align-items-center h-100">
                    <img src="images/logasac.png" class="img-fluid" alt="Logo" style="max-width: 230px;">
                    <p class="illustration-text mt-4">ACADEMY OF SAINT ANDREW CALOOCAN (ASAC), INC.</p>
                    <p class="illustration-subtext">Learning Management System</p>
                </div>
            </div>

            <div class="col-lg-6 login-form-container d-flex align-items-center justify-content-center position-relative">
                <a href="index.php" class="exit-logo">&times;</a>
                <div class="w-75">
                    <h1 class="brand-name">ASAC LMS</h1>
                    <h3 class="welcome-text">Admin Login</h3>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" class="form-control custom-input" name="username" placeholder="Enter your username" required>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" class="form-control custom-input" name="password" placeholder="Enter your password" required>
                        </div>
                        <div class="button-container">
                            <a href="forgot_password.php" class="forgot-password">Forgot Password?</a>
                            <button type="submit" class="btn" name="sign">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


<?php
include "connect.php";

session_start();

if (isset($_POST['sign'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $viewlogin = "SELECT * FROM tbl_admin WHERE username = ?";
    $stmt = $conn->prepare($viewlogin);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $dbpassword = $row['password'];
        $role = $row['Role'];
        $userId = $row['Aid'];

        if (password_verify($password, $dbpassword)) {
            $_SESSION['Aid'] = $userId;
            $_SESSION['username'] = $username;
            $_SESSION['Role'] = $role;
            $_SESSION['loggedin'] = true;

            if ($role == "Admin") {
                header("Location: Admin/dashboard.php");
                exit();
            }
        } else {
            echo "<script>alert('Hi User! Your Password is Incorrect!')</script>";
        }
    } else {
        echo "<script>alert('Username is not Registered')</script>";
    }
}
?>
