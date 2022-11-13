<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Admin Dashboard</title>
</head>

<body>
    <nav class="navbar navbar-light" style="background-color: #7CF9B7;">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="/20BCA1-B/logo2.png" alt="" width="40" height="30" class="d-inline-block align-text-top">
                Library Management System
            </a>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" style="color: black;" aria-current="page" href="/lms/login.php">Log
                        out</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php
        session_start();
        $admin_id = $_SESSION['adminid'];
        
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $conn = mysqli_connect("localhost", "root", "", "lms");

            $old_pass = $_POST['old_pass'];
            $new_pass1 = $_POST['new_pass1'];
            $new_pass2 = $_POST['new_pass2'];

            $sql = "SELECT * FROM `admin_details` WHERE `admin_id` = '$admin_id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $password = $row['Password'];

            if(trim($old_pass)!=$password)
            {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Wrong password!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            else if(strlen(trim($new_pass1))<8 || strlen(trim($new_pass2))<8)
            {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Password should be of atleast 8 characters!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            else if(trim($new_pass1)!=trim($new_pass2))
            {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Confirm the password correctly!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            else
            {
                $old_pass = trim($old_pass);
                $new_pass1 = trim($new_pass1);

                $sql = "UPDATE `admin_details` SET `Password`='$new_pass1' WHERE `admin_id`='$admin_id'";
                $result = mysqli_query($conn, $sql);

                if($result)
                {
                    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                        Record Updated Successfully!.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
            }
        }
        

    ?>

    <div class="row">
        <div class="col-md-2">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height: 100%">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li>
                        <a href="admin_dashboard.php" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#speedometer2"></use>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="add_book.php" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#table"></use>
                            </svg>
                            Add Book
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="delete_book.php" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            Delete Book
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="add_book_category.php" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            Add Book Category
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="delete_book_category.php" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            Delete Book Category
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="add_user.php" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            Add User
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="delete_user.php" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            Delete User
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="view_admin_profile.php" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            View Profile
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="edit_admin_profile.php" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            Edit Profile
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="change_admin_password.php" class="nav-link active">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            Change Password
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-8">
            <div class="text-center" style="margin-top:15px;">
                <span><strong>Welcome: <?php echo $_SESSION['name']; ?></strong></span>
            </div>
            <h4 class="text-center" style="margin-top: 50px;">Change Password</h4>
            <form action="/lms/change_admin_password.php" method="post" style="margin-left: 30px; margin-top: 50px;">
                <div class="mb-3 mt-5">
                    <label for="exampleInputoldPassword" class="form-label">Old Password</label>
                    <input type="password" name="old_pass" class="form-control" id="exampleInputName"
                        value="<?php if(isset($_POST['old_pass'])) echo $_POST['old_pass']; ?>" required>
                </div>
                <div class="mb-3 mt-5">
                    <label for="exampleInputNewPassword" class="form-label">New Password</label>
                    <input type="password" name="new_pass1" class="form-control" id="InputNewPassword"
                        aria-describedby="emailHelp"
                        value="<?php if(isset($_POST['new_pass1'])) echo $_POST['new_pass1']; ?>" required>
                </div>
                <div class="mb-5 mt-5">
                    <label for="exampleInputNewPassword" class="form-label">Confirm Password</label>
                    <input type="password" name="new_pass2" class="form-control" id="InputNewPassword"
                        value="<?php if(isset($_POST['new_pass2'])) echo $_POST['new_pass2']; ?>" required>
                </div>
                <button class="w-100 btn" style="background-color: #7CF5F9;" type="submit">UPDATE</button>
            </form>
        </div>
        <div class="col-md-1"></div>
    </div>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>