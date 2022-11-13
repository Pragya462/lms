<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Sign Up page</title>
</head>

<body style="background-image: url('/lms/signup_bg.png'); background-repeat: no-repeat; background-attachment: fixed;
  background-size: cover;">
    <nav class="navbar navbar-light" style="background-color: #7CF5F9;">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="/lms/logo2.png" alt="" width="40" height="30" class="d-inline-block align-text-top">
                Coding Champs
            </a>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Login as Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Login as User</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
        session_start();
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $user_password = $_POST['pass'];
            echo "Your name is $name, email is $email and password is $user_password";

            $servername="localhost";
            $username="root";
            $password="";
            $database="lms";

            $conn = mysqli_connect($servername, $username, $password, $database);

            if(!$conn)
            {
                die("sorry we failed to connect: ".mysqli_connect_error());
            }
            else
            {
                echo "<br>Connection was successful.";
            }
            
            if($name=="")
            {
                echo '<div class="alert alert-warning" role="alert">
                    Please enter your name!
                    </div>';
            }
            if(strlen($user_password)<8)
            {
                echo '<div class="alert alert-warning" role="alert">
                    Password should be of atleast 8 characters!
                    </div>';
            }   
            else
            {
                $sql = "SELECT * FROM `REGISTERED_USER` WHERE `Email` = '$email'";
                $result = mysqli_query($conn, $sql);

                if($result)
                {
                    if (mysqli_num_rows($result) > 0)
                        echo '<div class="alert alert-warning" role="alert">
                            You are already registered. Please log in.
                        </div>';
                    else
                    {
                        $sql = "INSERT INTO `registered_user` (`Name`, `Email`, `Password`) 
                        VALUES ('$name', '$email', '$user_password')";
                        $result = mysqli_query($conn, $sql);
            
                        if($result)
                        {
                            $_SESSION['email'] = $email;
                            echo "<br>$name $email and $user_password inserted successfully";
                            $conn = mysqli_connect($servername, $username, $password, "students_table");
                            $query = "CREATE TABLE `$email` 
                            (`S. No.` INT NOT NULL AUTO_INCREMENT , `book_name` VARCHAR(20) NOT NULL , `Issue_date` DATE NOT NULL , `Status` VARCHAR(20) NOT NULL , PRIMARY KEY (`S. No.`))";
                            $result1 = mysqli_query($conn, $query);
                            if($result1)
                            {
                                echo "Table created successfully";
                            }
                            else{
                                echo "Some error occured";
                            }
                        }
                        else
                        {
                            echo mysqli_error($conn);        
                        }
                    }
                }
                else
                {
                    echo mysqli_error($conn);
                }
            }

        }

    ?>
    <div class="container" style="padding-left: 400px; padding-right: 400px; padding-top: 50px;">
        <h3 style="color: white;">Please enter your details to register:</h3>
        <form action="/lms/signup.php" method="post">
            <div class="mb-3 mt-3">
                <label for="exampleInputName" class="form-label" style="color: white;">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName"
                    value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>">
            </div>
            <div class="mb-3 mt-3">
                <label for="exampleInputEmail1" class="form-label" style="color: white;">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                <div id="emailHelp" class="form-text" style="color: black;">We'll never share your email with anyone
                    else.</div>
            </div>
            <div class="mb-5 mt-3">
                <label for="exampleInputPassword1" class="form-label" style="color: white;">Password</label>
                <input type="password" name="pass" class="form-control" id="exampleInputPassword1"
                    value="<?php if(isset($_POST['pass'])) echo $_POST['pass']; ?>">
            </div>
            <button class="w-100 btn" style="background-color: #7CF5F9;" type="submit">Register</button>
            <div id="emailHelp" class="form-text mt-3" style="color: white;">Already have an account?</div>
            <a href="login.php" class="w-100 btn" style="background-color: #7CF5F9;" type="submit">Login</a>
        </form>
    </div>
    <div>

    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>