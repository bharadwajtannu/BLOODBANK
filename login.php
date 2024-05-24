<?php
session_start();
//$_SERVER is a PHP super global variable which holds information about headers, paths, and script locations.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "Select * from `users` where username='$username' and password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            echo "Login Successful";
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
            //$user=1;
        } else {
            echo "Invalid Credentials";
        }
    }



}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="signup.css">
</head>

<body>

    <div class="container">
        <h1>Login</h1>
        <?php if (!empty($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</body>

</html>