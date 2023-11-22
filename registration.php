<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    require('db.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email    = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);



        $sql = "INSERT INTO `client` (`username`, `email`, `name`, `phone`, `password`) VALUES ('$username', '$email', '$name', '$phone', '$password')";
        $result   = mysqli_query($con, $sql);
        if ($result) {
    ?>
            <div class='form'>
                <h3>You are registered successfully.</h3><br />
                <p class='link'>Click here to <a href='login.php'>Login</a></p>
            </div>";
        <?php
        } else {
            echo "<div class='form'>
              <h3>Required fields are missing.</h3><br/>
              <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
              </div>";
        }
    } else {
        ?>
        <form class="form" action="" method="post">
            <h1 class="login-title">Registration</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" required />
            <input type="text" class="login-input" name="email" placeholder="Email Adress">
            <input type="text" class="login-input" name="name" placeholder="Name">
            <input type="number" class="login-input" name="phone" placeholder="Phone">
            <input type="password" class="login-input" name="password" placeholder="Password">
            <input type="submit" name="submit" value="Register" class="login-button">
            <p class="link"><a href="login.php">Click to Login</a></p>
        </form>
    <?php
    }
    ?>

</body>

</html>