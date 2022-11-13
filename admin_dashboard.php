<?php
    require('functions.php');
    session_start();
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
                    <a class="nav-link active" style="color: black;" aria-current="page" href="/lms/admin_login.php">Log
                        out</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-2">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height: 100%">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li>
                        <a href="admin_dashboard.php" class="nav-link active">
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
        <div class="col-md-10">
            <div class="text-center" style="margin-top:15px;">
                <span><strong>Welcome: <?php echo $_SESSION['name']; ?></strong></span>
            </div>
            <div class="album bg-light" style="margin-top: 35px;">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="admin_card1.png" alt="" width="100%" height="300">

                                <div class="card-body">
                                    <p class="card-text">Number of Registered Users: <?php echo get_user_count(); ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <a class="btn btn-sm btn-outline-success" style="background-color: #7CF9B7;"
                                                href="registered_users.php" role="button">View Registered
                                                Users</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="admin_card2.png" alt="" width="100%" height="300">

                                <div class="card-body">
                                    <p class="card-text">Number of Books available: <?php echo get_book_count(); ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <a class="btn btn-sm btn-outline-success" style="background-color: #7CF9B7;"
                                                href="books.php" role="button">View All
                                                Books</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="admin_card3.png" alt="" width="100%" height="300">

                                <div class="card-body">
                                    <p class="card-text">Number of Authors: <?php echo get_auth_count(); ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <a class="btn btn-sm btn-outline-success" style="background-color: #7CF9B7;"
                                                href="authors.php" role="button">View Authors</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="admin_card4.png" alt="" width="100%" height="300">

                                <div class="card-body">
                                    <p class="card-text">Number of Books' ctegories: <?php echo get_cat_count(); ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <a class="btn btn-sm btn-outline-success" style="background-color: #7CF9B7;"
                                                href="category.php" role="button">View
                                                Categories</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="admin_card5.png" alt="" width="100%" height="300">

                                <div class="card-body">
                                    <p class="card-text">Number of Books issued: <?php echo get_issued_book_count(); ?>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <a class="btn btn-sm btn-outline-success" style="background-color: #7CF9B7;"
                                                href="issued_books.php" role="button">View Issued
                                                Books</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>