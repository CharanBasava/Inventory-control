<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/register.css">
    <title>Register</title>
    <script>
        // Function to hide the message after 3 seconds
        function hideMessage() {
            setTimeout(() => {
                const messageDiv = document.getElementById('message');
                if (messageDiv) {
                    messageDiv.innerHTML = ''; // Clear the message
                }
            }, 3000); // 3000 milliseconds = 3 seconds
        }
    </script>
</head>

<body>
    <div class="form-wrapper">
        <!-- Register Form -->
        <form method="post" class="form">
            <h2>Register</h2>
            <div class="input-group">
                <input type="text" name="username" id="username" required />
                <label for="username">Username</label>
            </div>
            <div class="input-group">
                <input type="email" name="email" id="email" required />
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <input type="text" name="phno" id="phno" required />
                <label for="phno">Phone Number</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" id="password" required />
                <label for="password">Password</label>
            </div>
            <div class="input-group">
                <input type="password" name="confirm_password" id="confirm_password" required />
                <label for="confirm_password">Confirm Password</label>
            </div>
            <input type="submit" value="Register" name="register" class="submit-btn" />
            <p><a href="login.php">Already registered? Click here to login.</a></p>

            <!-- Message Display Area -->
            <div class="message" id="message">
                <?php
                // Database connection
                $con = mysqli_connect("localhost", "root", "", "inventory_control_system");
                $message = ""; // Initialize message variable

                // PHPMailer
                use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\Exception;

                require 'phpmailer/src/Exception.php';
                require 'phpmailer/src/PHPMailer.php';
                require 'phpmailer/src/SMTP.php';

                // Handle Registration
                if (isset($_POST['register'])) {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $phno = $_POST['phno'];
                    $password = $_POST['password'];
                    $confirm_password = $_POST['confirm_password'];

                    // Check if passwords match
                    if ($password === $confirm_password) {
                        // Check if both email and phone number already exist
                        $check_query = "SELECT * FROM reg WHERE email='$email' OR phno='$phno'";
                        $result = mysqli_query($con, $check_query);

                        if (mysqli_num_rows($result) > 0) {
                            $message = "Email and Phone Number already exist!";
                        } else {
                            // Insert data if email and phone number do not exist
                            $sql = "INSERT INTO reg (username, email, phno, password) VALUES ('$username', '$email', '$phno', '$password')";
                            if (mysqli_query($con, $sql)) {
                                // Send Confirmation Email
                                $mail = new PHPMailer(true);
                                try {
                                    $mail->isSMTP();
                                    $mail->Host = 'smtp.gmail.com';
                                    $mail->SMTPAuth = true;
                                    $mail->Username = 'basavacharan85900@gmail.com'; // Your Gmail address
                                    $mail->Password = 'pghpuedzqdpzfgbf'; // Your Gmail app password
                                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS encryption
                                    $mail->Port = 587; // TCP port to connect to

                                    // Set sender and recipient
                                    $mail->setFrom('basavacharan85900@gmail.com', 'Your Name'); // Replace with your name
                                    $mail->addAddress($email, $username); // Add recipient email

                                    // Email content
                                    $mail->isHTML(true); // Set email format to HTML
                                    $mail->Subject = 'Registration Successful!';
                                    $mail->Body    = "Dear $username,<br><br>Welcome to the  spCvl inventory your registering details are :<br>Your details:<br>Username: $username<br>Email: $email<br>Phone Number: $phno <br> Password: $password";

                                    // Send email
                                    $mail->send();
                                    $message = "Registration successful! Confirmation email sent.";
                                } catch (Exception $e) {
                                    $message = "Registration successful! But failed to send confirmation email: {$mail->ErrorInfo}";
                                }
                            } else {
                                $message = "Error in registration!";
                            }
                        }
                    } else {
                        $message = "Passwords do not match!";
                    }
                }

                // Output the message and trigger JavaScript function to hide it
                if ($message) {
                    echo $message;
                    echo '<script>hideMessage();</script>'; // Call the function to hide message
                }
                ?>
            </div>
        </form>
    </div>
</body>
</html>
