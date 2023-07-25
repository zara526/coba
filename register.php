<?php

include 'config.php';
error_reporting(0);
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM zara WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO zara (username, email, password) values ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! email sudah terdaftar.')";
        }
    } else {
        echo "<script>alert('Password tidak sesuai')";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scae=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">

    <title>Zabaya Register</title>
</head>

<header>
            <!--<i style="font-size: 20px; color: white; padding: 0px;" class="fa-solid fa-bars" id="menu-icon"></i>-->
            <a href="#" class="logo">
                <img src="images/logo (2).png" alt="" style="width: 250px;">
            </a>
</header>

<body style="background-color: #facbe8">
 <img src="images/tepi1.png" style=" width: 300px; margin-right: 200px; margin-top: 405px;">
    <div class="register">
    <div class="container">
        <form action="" method="POST" class="login-email">
            
            <p class="login-text" style="font-size: 2rem;  font-weight: 800;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="login.php">Login</a></p>
            </center>
        </form>
    </div>
</div>
<img src="images/tepi2.png" style="width: 300px; margin-left: 213px; margin-top: 50px;">
</body>

</html>