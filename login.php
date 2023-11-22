<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    require('db.php');
    session_start();

    // Check if form is submitted
    // if (isset($_POST['submit'])) {
    //     $username = mysqli_real_escape_string($con, $_POST['username']);
    //     $password = mysqli_real_escape_string($con, $_POST['password']);

    //     $sql = "SELECT * FROM `client` WHERE username='$username' AND password = '$password'";
    //     $result = mysqli_query($con, $sql);
    //     $rows = mysqli_num_rows($result);
    //     if ($rows) {
    //         $_SESSION['username'] = $username;
    //         header("Location: dashboard.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];


        $stmt = $con->prepare("SELECT `username`, `password` FROM `client` WHERE `username` = ? AND `password` = ?");
        $stmt->bind_param("ss", $username, $password);

        $stmt->execute();

        $stmt->bind_result($resultUsername, $resultPassword);

        if ($stmt->fetch()) {
            $_SESSION["username"] = $resultUsername;
            $_SESSION["password"] = $resultPassword;

            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                        <h3>Incorrect Username/password.</h3><br/>
                        <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                      </div>";
        }
    } else {
    ?>
        <form class="form" method="post" name="login">
            <h1 class="login-title">Login</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" />
            <input type="password" class="login-input" name="password" placeholder="Password" />
            <input type="submit" value="Login" name="submit" class="login-button" />
            <!-- <button type="submit" value="Login" name="submit" class="login-button">Login</button> -->
            <p class="link"><a href="registration.php">New Registration</a></p>
        </form>
    <?php
    }
    ?>
</body>

</html>