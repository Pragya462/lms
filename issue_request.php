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

<body style="background-image: url('/lms/add_book_bg.png'); background-repeat: no-repeat; background-attachment: fixed;
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

    <?php
        session_start();
        $email = $_SESSION['email'];
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $book_name = $_POST['bookname'];
            $author_name = $_POST['authorname'];
            $doi = $_POST['issue_date'];
            $status = "ISSUED";

            $servername="localhost";
            $username="root";
            $password="";
            $database="lms";

            $conn = mysqli_connect($servername, $username, $password, $database);

            $sql = "SELECT * FROM `books` WHERE `Name` = '$book_name'";
            $result = mysqli_query($conn, $sql);

            if($result)
            {
                if (mysqli_num_rows($result) > 0)
                {
                    $conn = mysqli_connect($servername, $username, $password, "students_table");
                    $sql = "INSERT INTO `$email` (`book_name`, `Issue_date`, `Status`) 
                        VALUES ('$book_name', '$doi', '$status')";
                    $result = mysqli_query($conn, $sql);
                    if($result)
                    {
                        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                        Book Issued Successfully!.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                }
                    
                else
                {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Sorry this book is not available.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
                
            }
        }
    ?>

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
                        <a href="issue_request.php" class="nav-link active">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#table"></use>
                            </svg>
                            Issue Request
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="my_issued_books.php" class="nav-link link-dark">
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
        <div class="col-md-1"></div>
        <div class="col-md-8">
            <h3 class="text-center" style="margin-top: 60px;">Issue Book</h3>
            <form action="/lms/issue_request.php" method="post" style="margin-left: 30px; margin-top: 50px;">
                <div class="mb-3">
                    <label for="inputbookname" class="form-label"><b>Book Name</b></label>
                    <input type="text" class="form-control" id="inputbookname" name="bookname" required>
                </div>
                <div class="mb-3 mt-5">
                    <label for="inputauthorname" class="form-label"><b>Author Name</b></label>
                    <input type="text" class="form-control" id="inputauthorname" name="authorname" required>
                </div>
                <div class="mb-5 mt-5">
                    <label for="inputissuedate" class="form-label"><b>Issue Date</b></label>
                    <input type="text" class="form-control" id="inputauthorname" name="issue_date" required>
                </div>
                <button class="w-100 btn" style="background-color: #7CF5F9;" type="submit">Request Book</button>
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