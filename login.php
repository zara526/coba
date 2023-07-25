<?php
include 'config.php';

error_reporting(0);

session_start();

if (isset($SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);


    $sql = "SELECT * FROM zara WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: index.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!') </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="css/login.css">

    <title>Zabaya Store</title>
</head>
<header>
            <!--<i style="font-size: 20px; color: white; padding: 0px;" class="fa-solid fa-bars" id="menu-icon"></i>-->
            <a href="#" class="logo">
                <img src="images/logo (2).png" style="width: 250px;">
            </a>
</header>

<body style="background-color: #facbe8">
    <div class="alert alert-warning" role="alert">
        <?php echo $_SESSION['error'] ?>
    </div>
    <div class="imgs1">
      <img src="images/Abaya A.jpeg" style="width:300px; height: 300px; border-radius: 20px;">
    </div>

    <div class="imgs2">
         <img src="images/cadar.jpeg" style="width:200px; height: 200px; border-radius: 20px;">
    </div>

    <div class="login">
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn" href="index.php">Login</button>
            </div>
            <p class="login-register-text">Anda belum punya akun? <a href="register.php">Register</a></p>
        </form>
    </div>

</body>

</html>