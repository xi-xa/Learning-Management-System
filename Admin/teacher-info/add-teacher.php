<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Teacher</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script nonce="randomNonceValue" src="validation.js"></script>
</head>
<body>
<main id="wrapper">
  <div class="container">
    <form action="#" id="appoint-form" method="POST">
      <h1 id="form-head">Teacher Information</h1>
      <br>
      <!-- Teacher ID Field with Number Validation -->
      <input type="text" class="person-detail" placeholder="Teacher ID" name="Tid" id="Tid" autocomplete="off" required>
      <input type="text" class="person-detail" placeholder="First Name" name="fname" id="fname" maxlength="20" autocomplete="off" required>
      <input type="text" class="person-detail" placeholder="Middle Name" name="mname" id="mname" maxlength="20" autocomplete="off" required>
      <input type="text" class="person-detail" placeholder="Last Name" name="lname" id="lname" maxlength="20" autocomplete="off" required>
      <input type="text" class="person-detail" placeholder="Email" name="email" id="email" maxlength="50" autocomplete="off" required>
      <input type="text" class="person-detail" placeholder="Username" name="users" id="username" maxlength="10" autocomplete="off" required>
      <button type="submit" id="submit" name="sub" value="Submit">Submit</button>
      
      <!-- USER PASSWORD SETUP-->
      <select name="password" value="ASAC" hidden>
        <option value="ASAC">ASAC</option>
      </select>
      <select name="roles" value="Teacher" hidden>
        <option value="Teacher">Teacher</option>
      </select>
    </form>
  </div>
</main>


</body>
</html>

<?php
include_once "connection.php";
require __DIR__ . "/sanitation.php";

if (isset($_POST["sub"])) {
    $Tid = sanitizeInput($_POST["Tid"]);
    $fname = sanitizeInput($_POST["fname"]);
    $mname = sanitizeInput($_POST["mname"]);
    $lname = sanitizeInput($_POST["lname"]);
    $users = sanitizeInput($_POST["users"]);
    $email = sanitizeInput($_POST["email"]);
    $password = sanitizeInput($_POST["password"]);
    $roles = sanitizeInput($_POST["roles"]);
    if (isset($conn)) {
        $sql = "INSERT INTO tbl_teacher (teacher_id, fname, mname, lname, users, email, password, roles) 
                VALUES ('$Tid', '$fname', '$mname', '$lname', '$users', '$email', '$password', '$roles')";

        $insert = $conn->query($sql);

        if ($insert == true) { ?>
            <script>
            alert("Successfully Added")
            </script>
            <?php header("refresh:0;url=index.php");} else {echo "";}
    }
}

?>
