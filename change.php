<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="style.css">
    <style>

        body {
    width: 100%;
height: 100vh;
background-image: url("images/cover.jpg");
background-repeat: no-repeat;
background-size: cover;
}
.illustration {
    opacity:90%;
display: flex;
justify-content: center;
align-items: center;
flex-direction: column;
box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);

}
.btns {
    background: #0071eb;
    width: 100px;
    padding: 5px;
    margin-top:10px;
    border-radius: 25px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    border: none; /* Optional: removes default border */
    color: white; /* Optional: sets text color */
}
        </style>
</head>
<body>
    <div class="illustration">
        <div class="login-form-container">
            <h1 class="head">Create New Password</h1>
            <p class="short-text">Your new password must be different from previously used passwords.</p>
            
            <br>
            <div>
                <form action="update_new_password.php" method="POST">
                    <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
                    <label for="password" class="forgot-password">New Password</label>
                    <br>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="custom-input" required>
                    <br>
                    <label for="confirm-password" class="forgot-password">Confirm Password</label>
                    <br>
                    <input type="password" name="confirm_password" id="confirm-password" placeholder="••••••••" class="custom-input" required>
                    <br>
                    <button type="submit" class="btns" name="reset">Reset</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
