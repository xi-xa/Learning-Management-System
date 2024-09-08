<?php
include "connect.php";

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$lockout_until = null; // Default to no lockout

if (isset($_POST['sign'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the query to fetch user data
    $viewlogin = "SELECT * FROM tbl_admin WHERE username = ?";
    $stmt = $conn->prepare($viewlogin);
    if (!$stmt) {
        die('Prepare failed: ' . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $dbpassword = $row['password'];
        $role = $row['Role'];
        $userId = $row['Aid'];
        $failed_attempts = $row['failed_attempts'];
        $last_failed_attempt = $row['last_failed_attempt'];
        $lockout_until = $row['lockout_until'];

        $current_time = new DateTime();
        $lockout_time = $lockout_until ? new DateTime($lockout_until) : null;

        if ($lockout_until && $lockout_time && $current_time < $lockout_time) {
            // Calculate remaining lockout time
            $remaining_time = $lockout_time->getTimestamp() - $current_time->getTimestamp();
            $_SESSION['lockout_until'] = $lockout_until;
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    startCountdown($remaining_time);
                });
                </script>";
        } else {
            if (password_verify($password, $dbpassword)) {
                // Reset failed attempts and lockout time
                $updateQuery = "UPDATE tbl_admin SET failed_attempts = 0, lockout_until = NULL WHERE username = ?";
                $updateStmt = $conn->prepare($updateQuery);
                if (!$updateStmt) {
                    die('Prepare failed: ' . $conn->error);
                }

                $reset_failed_attempts = 0;
                $reset_lockout_until = NULL;
                $updateStmt->bind_param("s", $username);
                $updateStmt->execute();

                $_SESSION['Aid'] = $userId;
                $_SESSION['username'] = $username;
                $_SESSION['Role'] = $role;
                $_SESSION['loggedin'] = true;

                if ($role == "Admin") {
                    header("Location: Admin/dashboard.php");
                    exit();
                }
            } else {
                $failed_attempts++;
                if ($failed_attempts >= 3) {
                    $lockout_time = $current_time->add(new DateInterval('PT1M'));
                    $lockout_until = $lockout_time->format('Y-m-d H:i:s');
                    $updateQuery = "UPDATE tbl_admin SET failed_attempts = ?, lockout_until = ? WHERE username = ?";
                    $updateStmt = $conn->prepare($updateQuery);
                    if (!$updateStmt) {
                        die('Prepare failed: ' . $conn->error);
                    }

                    $updateStmt->bind_param("iss", $failed_attempts, $lockout_until, $username);
                    $updateStmt->execute();
                    $_SESSION['lockout_until'] = $lockout_until;
                    echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            startCountdown(60);
                        });
                        </script>";
                } else {
                    $updateQuery = "UPDATE tbl_admin SET failed_attempts = ?, last_failed_attempt = ? WHERE username = ?";
                    $updateStmt = $conn->prepare($updateQuery);
                    if (!$updateStmt) {
                        die('Prepare failed: ' . $conn->error);
                    }

                    $failed_attempts = $failed_attempts;
                    $last_failed_attempt = $current_time->format('Y-m-d H:i:s');
                    $updateStmt->bind_param("iss", $failed_attempts, $last_failed_attempt, $username);
                    $updateStmt->execute();
                    echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            alert('Incorrect password. Attempt $failed_attempts of 3.');
                        });
                        </script>";
                }
            }
        }
    } else {
        echo "<script>alert('Username is not Registered')</script>";
    }
}
?>



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
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Existing styles */
        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            background-color: gray;
            width: 100px;

            border-radius: 25px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            border: none;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: darkgray;
        }

        .forgot-password {
            color: #5d6d7e;
            text-decoration: none;
            font-size: 0.9rem;
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
            background: rgba(255, 255, 255, 0.7);
            padding: 5px 10px;
            border-radius: 50%;
            transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }

        .exit-logo:hover {
            color: #ff0000;
            background: rgba(255, 255, 255, 0.9);
        }

        .exit-logo:active {
            transform: scale(0.95);
        }

        .countdown {
            margin-top: 10px;
            color: red;
            font-weight: bold;
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
                        <div style="text-align:center; margin-top: 10px;">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal" class="forgot-password">Forgot Password?</a>
                            <button type="submit" class="btn" name="sign">Sign in</button>
                            <div id="countdown" class="countdown"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Forgot Password Modal -->
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>No worries. We'll send you reset instructions.</p>
                    <form method="POST" action="forgot_password.php">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        function startCountdown(duration) {
            var countdownElement = document.getElementById('countdown');
            var endTime = Date.now() + duration * 1000;

            function updateCountdown() {
                var remainingTime = Math.max(0, endTime - Date.now());
                var seconds = Math.floor((remainingTime / 1000) % 60);
                var minutes = Math.floor((remainingTime / (1000 * 60)) % 60);
                var hours = Math.floor((remainingTime / (1000 * 60 * 60)) % 24);

                if (remainingTime <= 0) {
                    countdownElement.textContent = '';
                    return;
                }

                countdownElement.textContent = 
                    (hours > 0 ? hours + 'h ' : '') +
                    (minutes > 0 ? minutes + 'm ' : '') +
                    seconds + 's';
                setTimeout(updateCountdown, 1000);
            }

            updateCountdown();
        }
    </script>
</body>

</html>

