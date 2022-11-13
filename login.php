<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Login Page</title>
</head>

<body style="background-image: url('/lms/bg1.jpg'); background-repeat: no-repeat; background-attachment: fixed;
  background-size: cover;">
    <nav class="navbar navbar-light" style="background-color: #7CF5F9;">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="/lms/logo2.png" alt="" width="40" height="30" class="d-inline-block align-text-top">
                Coding Champs
            </a>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="admin_login.php">Login as Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Sign Up</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
        session_start();
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $email = $_POST['email'];
            $user_password = $_POST['pass'];

            $servername="localhost";
            $username="root";
            $password="";
            $database="lms";

            $conn = mysqli_connect($servername, $username, $password, $database);

            $sql = "SELECT * FROM `REGISTERED_USER` WHERE `Email` = '$email'";
            $result = mysqli_query($conn, $sql);

            if($result)
            {
                if (mysqli_num_rows($result) > 0)
                {
                    $row = mysqli_fetch_assoc($result);
                    $entered_pass = $row['Password'];
                    echo "Password is: ".$row['Password'];
                    if($user_password==$entered_pass)
                    {
                        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                        Login Successful.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        $_SESSION['userid']=$row['S. No.'];
                        $_SESSION['name'] = $row['Name'];
                        $_SESSION['email'] = $row['Email'];
                        $_SESSION['pass'] = $row['Password'];
                        header("Location:user_dashboard.php");
                    } 
                    else
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Wrong email id or password.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
                else
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Wrong email id or password.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            }
            else
            {
                echo mysqli_error($conn);
            }
        }
    ?>
    <div class="container" style="padding-left: 400px; padding-right: 400px; padding-top: 50px;">
        <h3>Please enter your email and password</h3>
        <form action="/lms/login.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                <div id="emailHelp" class="form-text" style="color: black;">We'll never share your email with anyone
                    else.</div>
            </div>
            <div class="mb-5 mt-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="pass" class="form-control" id="exampleInputPassword1"
                    value="<?php if(isset($_POST['pass'])) echo $_POST['pass']; ?>">
            </div>
            <button class="w-100 btn" style="background-color: #7CF5F9;" type="submit">Login</button>
            <div id="emailHelp" class="mt-3">Don't have an account?</div>
            <a href="signup.php" class="w-100 btn mt-3" style="background-color: #7CF5F9;" type="submit">Create
                Account</a>
        </form>
    </div>
    <!-- connecting to the database -->
    <?php
        
    ?>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>

</html>