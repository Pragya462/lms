<?php
    require('functions.php');
    session_start();
    $email = $_SESSION['email'];
    $conn = mysqli_connect("localhost", "root", "", "students_table");

    $name = "";
    $book_id = "";
    $author = "";
    
    $query = "SELECT * FROM `$email`";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>User Dashboard</title>
</head>

<body style="background-image: url('/lms/issued_books_bg.png'); background-repeat: no-repeat; background-attachment: fixed;
  background-size: cover;">
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

    <div class="row">
        <div class="col-md-2">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height: 639px">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li>
                        <a href="user_dashboard.php" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#speedometer2"></use>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="issue_request.php" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#table"></use>
                            </svg>
                            Issue Request
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="my_issued_books.php" class="nav-link active">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            My issued Books
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="view_profile.php" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            View Profile
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="edit_profile.php" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            Edit Profile
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="change_password.php" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            Change Password
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            <h4 class="text-center" style="margin-top: 40px;"><b>ISSUED BOOKS</b></h4>
            <form>
                <table class="table table-dark table-hover table-striped table-bordered" width="900px"
                    style="text-align: center; margin-top:50px; margin-left:50px;">
                    <tr>
                        <th>S. No.</th>
                        <th>BOOK NAME</th>
                        <th>DATE OF ISSUE</th>
                        <th>STATUS</th>
                    </tr>
                    <?php
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $s_no= $row['S. No.'];
                            $book_name= $row['book_name'];
                            $doi= $row['Issue_date'];
                            $status = $row['Status'];
                            ?>
                    <tr>
                        <td><?php echo $s_no; ?></td>
                        <td><?php echo $book_name; ?></td>
                        <td><?php echo $doi; ?></td>
                        <td><?php echo $status; ?></td>
                    </tr>
                    <?php
                    }
                ?>
                </table>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>