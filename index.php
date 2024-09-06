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

        .btnss {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    background-color: #acc7a9;
    color: black;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-size: 18px;
    font-weight: bold;
    transition: all 0.4s ease; /* Smooth transition for hover effects */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Initial subtle shadow */
}

.btnss img {
    transition: transform 0.4s ease; /* Smooth transition for image zoom */
}

.btnss:hover {
    background-color: #85a284; /* Darken background on hover */
    color: white; /* Change text color on hover */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); /* Increase shadow for depth */
    transform: translateY(-5px); /* Slightly lift the button */
}

.btnss:hover img {
    transform: scale(1.2); /* Slightly zoom the image */
    
}

.btnss:active {
    transform: translateY(-2px) scale(0.98); /* Subtle press effect */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15); /* Reduced shadow on press */
}

        

        .btnss img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
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

            <div class="col-lg-6 login-form-container d-flex align-items-center justify-content-center">
                <div class="w-75">
                    <h1 class="brand-name">ASAC LMS</h1>

                    <div class="mb-3">
                        <a class="btnss" href="login.php">
                            <img src="images/admin.png" alt="Admin Icon"> ADMIN
                        </a>
                    </div>

                    <div class="mb-3">
                        <a class="btnss" href="userlogin.php">
                            <img src="images/user.png" alt="User Icon"> USERS
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
