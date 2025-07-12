<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/login.css">
    <title>Login Form</title>
</head>
<body>

<div class="form">
    <h2>Login</h2>
    <form method="post">
        <div class="input-group">
            <input type="text" name="email" id="email" required />
            <label for="email">Email</label>
        </div>
        <div class="input-group">
            <input type="password" name="password" id="password" required />
            <label for="password">Password</label>
        </div>
        <div>
            <p style="text-align:center;"> 
                <a class="link" href="register.php">? Not yet registered.</a>
            </p>
        </div>
        <input type="submit" value="Login" name='sub' class="submit-btn">
        <div class="message"></div> <!-- Message div moved here -->
    </form>
</div>

<?php
if (isset($_POST['sub'])) {
    $con = mysqli_connect("localhost", "root", "", "inventory_control_system");
    if ($con) {
        $uname = $_POST['email'];
        $pass = $_POST['password'];

        if ($uname == "charan" && $pass == "26") {
            header("location:all admin.html");
        } else {
            $sql = "SELECT * FROM reg WHERE email='$uname' AND password='$pass'";
            $result = mysqli_query($con, $sql);
            $count = mysqli_num_rows($result);

            if ($count == 0) {
                echo '<script>
                    document.querySelector(".message").innerText = "Incorrect details, try again";
                    setTimeout(function() {
                        document.querySelector(".message").innerText = "";
                    }, 3000);
                </script>';
            } else {
                echo '<script>
                    document.querySelector(".message").innerText = "Login successful! Redirecting...";
                    setTimeout(function() {
                        window.location.href = "admin.html";
                    }, 2000);
                </script>';
            }
        }
    }
}
?>
</body>
</html>
