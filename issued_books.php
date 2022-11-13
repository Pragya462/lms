<?php
    require('functions.php');
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "lms");

    $book_name = "";
    $user_name = "";
    $book_id = "";
    
    $query = "SELECT * FROM `issued book`";
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
                    <a class="nav-link active" style="color: black;" aria-current="page" href="/lms/login.php">Log
                        out</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form>
                <table class="table table-dark table-hover table-striped table-bordered" width="900px"
                    style="text-align: center; margin-top:50px;">
                    <tr>
                        <th>BOOK NAME</th>
                        <th>USER NAME</th>
                        <th>BOOK ID</th>
                    </tr>
                    <?php
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $book_name= $row['book_name'];
                            $user_name= $row['user_name'];
                            $book_id= $row['book_id'];
                            ?>
                    <tr>
                        <td><?php echo $book_name; ?></td>
                        <td><?php echo $user_name; ?></td>
                        <td><?php echo $book_id; ?></td>
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