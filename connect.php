<!-- connect to database -->
<?php
    $servername = "localhost";
    $username = "y0l35";
    $db_password = "y0l35y0l35";
    $dbname = "y0l35";

    $conn = mysqli_connect($servername, $username, $db_password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error()); // display if connection failed
    }
?>