<?php
    function get_user_count()
    {
        $conn = mysqli_connect("localhost", "root", "", "lms");

        $user_count = "";
        $query = "SELECT COUNT(*) AS user_count FROM `REGISTERED_USER`";

        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result))
        {
            $user_count = $row['user_count'];
        }

        return ($user_count);
    }

    function get_book_count()
    {
        $conn = mysqli_connect("localhost", "root", "", "lms");

        $book_count = "";
        $query = "SELECT COUNT(*) AS book_count FROM `books`";

        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result))
        {
            $book_count = $row['book_count'];
        }

        return ($book_count);
    }

    function get_auth_count()
    {
        $conn = mysqli_connect("localhost", "root", "", "lms");

        $auth_count = "";
        $query = "SELECT COUNT(*) AS auth_count FROM `author`";

        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result))
        {
            $auth_count = $row['auth_count'];
        }

        return ($auth_count);
    }

    function get_cat_count()
    {
        $conn = mysqli_connect("localhost", "root", "", "lms");

        $cat_count = "";
        $query = "SELECT COUNT(*) AS cat_count FROM `category`";

        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result))
        {
            $cat_count = $row['cat_count'];
        }

        return ($cat_count);
    }

    function get_issued_book_count()
    {
        $conn = mysqli_connect("localhost", "root", "", "lms");

        $issued_book_count = "";
        $query = "SELECT COUNT(*) AS issued_book_count FROM `issued book`";

        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result))
        {
            $issued_book_count = $row['issued_book_count'];
        }

        return ($issued_book_count);
    }
?>