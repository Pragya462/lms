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
            $book_price = $_POST['bookprice'];
            $author_name = $_POST['authorname'];

            $servername="localhost";
            $username="root";
            $password="";
            $database="lms";

            $conn = mysqli_connect($servername, $username, $password, $database);

            if(trim($book_name)=="")
            {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Please enter book name
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            else if(trim($book_price)=="")
            {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Please enter book price
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            else if(trim($author_name)=="")
            {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Please enter author name
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            else
            {
                $sql = "INSERT INTO `books` (`Name`, `book_price`, `Author`) 
                        VALUES ('$book_name', '$book_price', '$author_name')";
                        $result = mysqli_query($conn, $sql);
                if($result)
                {
                    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                        Book Added Successfully!.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
                else
                {
                    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                        Some error occured. Please try again later.
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
                        <a href="add_book.php" class="nav-link active">
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
                        <a href="change_admin_password.php" class="nav-link link-dark">
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
            <h3 class="text-center" style="margin-top: 50px;">Add Book</h3>
            <form action="/lms/add_book.php" method="post" style="margin-left: 30px; margin-top: 60px;">
                <div class="mb-3">
                    <label for="inputbookname" class="form-label"><b>Book Name</b></label>
                    <input type="text" class="form-control" id="inputbookname" name="bookname" required>
                </div>
                <div class="mb-3">
                    <label for="inputbookprice" class="form-label"><b>Book Price</b></label>
                    <input type="text" class="form-control" id="inputbookprice" name="bookprice" required>
                </div>
                <div class="mb-5">
                    <label for="inputauthorname" class="form-label"><b>Author Name</b></label>
                    <input type="text" class="form-control" id="inputauthorname" name="authorname" required>
                </div>
                <button class="w-100 btn" style="background-color: #7CF5F9;" type="submit">Add Book</button>
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