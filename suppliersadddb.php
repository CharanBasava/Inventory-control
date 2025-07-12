<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Database connection
$con = mysqli_connect("localhost", "root", "", "inventory_control_system");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    $password = $_POST['password'];

    // Check if email or phone number already exists
    $check_query = "SELECT * FROM reg WHERE email='$email' OR phno='$phno'";
    $result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($result) > 0) {
        // If user exists, show alert box
        echo "<script>alert('Email or Phone Number already exists!'); window.location.href='suppliersadd.php';</script>";
    } else {
        // If user doesn't exist, insert new user
        $insert_query = "INSERT INTO reg (username, email, phno, password) VALUES ('$username', '$email', '$phno', '$password')";
        if (mysqli_query($con, $insert_query)) {
            // Send Confirmation Email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'basavacharan85900@gmail.com'; // Your Gmail address
                $mail->Password = 'pghpuedzqdpzfgbf'; // Your Gmail app password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Set sender and recipient
                $mail->setFrom('basavacharan85900@gmail.com', 'Admin'); // Replace with your name
                $mail->addAddress($email, $username); // Add recipient email

                // Email content
                $mail->isHTML(true);
                $mail->Subject = 'You have been successfully added to spCvl inventory!';
                $mail->Body = "Dear $username,<br><br>Welcome to spCvl inventory!<br>Your details:<br>Username: $username<br>Email: $email<br>Phone Number: $phno<br>Password: $password";

                // Send the email
                $mail->send();
                echo "<script>alert('User added successfully and confirmation email sent!'); window.location.href='all admin.html';</script>";
            } catch (Exception $e) {
                echo "<script>alert('User added successfully, but failed to send confirmation email. Error: {$mail->ErrorInfo}'); window.location.href='all admin.html';</script>";
            }
        } else {
            // If insertion fails, show error
            echo "<script>alert('Error in adding user.'); window.location.href='suppliersadd.php';</script>";
        }
    }


// Close the connection
mysqli_close($con);
?>
