<?php
$success = 0;
$user = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $blood_group = $_POST['blood_group'];

    $sql = "Select * from `users` where username='$username'";
    $result = mysqli_query($conn, $sql);
    //echo var_dump($result);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            //echo "user already exist";
            $user = 1;
        } else {
            $sql = "insert into `users`(username,password,email,blood_group) values('$username', '$password','$email', '$blood_group')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "Signup Successful";
                $success = 1;

            } else {
                die(mysqli_error($conn));
            }
        }


    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css">
</head>

<body>
    <div class="container">
        <h1>Sign Up</h1>
        <form action="signup.php" method="post">
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <select name="blood_group" required>
                    <option value="">Select Blood Group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>
            <button type="submit" class="btn">Sign Up</button>
        </form>
    </div>
</body>

</html>