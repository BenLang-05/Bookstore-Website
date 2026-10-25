<?php
session_start();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>La Biblioteca – Crime Books</title>
        <meta name="description" content="Explore La Biblioteca’s full collection of Crime books, sorted alphabetically.">
        <meta name="keywords" content="books, library, crime, La Biblioteca">
        <link rel="stylesheet" href="cssfile.css">
    </head>
    <body>
        <h1>La Biblioteca</h1>
<!-- display navbar -->
        <div class="navbar">
            <a href="DBConnect.php">Home</a>

            <div class="subnav">
                <button class="subnavbtn">Types ▾</button>
                <div class="subnav-content">

                    <!-- Kids flyout -->
                    <div class="flyout">
                        <a href="#">Kids ▸</a>
                        <div class="flyout-content">
                            <a href="infants.php">Infant</a>
                            <a href="juniors.php">Junior</a>
                            <a href="young.php">Young</a>
                        </div>
                    </div>

                    <!-- Adults flyout -->
                    <div class="flyout">
                        <a href="#">Adults ▸</a>
                        <div class="flyout-content">
                            <a href="classic.php">Classic Novels</a>
                            <a href="fiction.php">Fiction</a>
                            <a href="comic.php">Comic</a>
                            <a href="crime.php">Crime &amp; Thriller</a>
                        </div>
                    </div>

                </div>
            </div>
            <?php if (isset($_SESSION['loggedin'])): ?> <!-- check whether the user is logged in -->
                <a href="logout.php" class="split">Logout</a>
            <?php else: ?>
                <a href="signup.php" class="split">Register</a>
                <a href="session.php" class="split">Log-In</a>
            <?php endif; ?>

        </div>
        <br><br>
        <div class="container">
            <p class="section-title">Crime & Thriller Books <span class="subtitle"> - Sorted Alphabetically</span></p>

            <div class="list" id="list">
                <?php

                include_once("connect.php"); //connect to database

                $sql = "SELECT * FROM books WHERE category = 'crime & thriller' ORDER BY title ASC"; //sql query
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($books = $result->fetch_assoc()) {
                        $books = array_map('htmlspecialchars', $books);

                        //display books

                        echo"
                        
                        <div class='item'>
                            <div class='image'>
                                <img src='{$books['image']}' alt='{$books['title']} cover'>
                            </div>
                            <div class='details'>
                                <span class='tag'>{$books['audience']} &rsaquo; {$books['category']}</span>
                                <h3 class='title'>{$books['title']}</h3>
                                <p class='author'>by {$books['author']}</p>
                                <p class='desc'>{$books['description']}</p>
                                <div class='footer'>
                                    <span class='price'>&pound;{$books['price']}</span>

                                        
                        ";
                        ?>

                        <?php if (isset($_SESSION['loggedin'])): ?> <!-- check whether the user is logged in so that a user can order a book-->
                            <a href="order.php?id=<?php echo $books['id']; ?>" class="OrderBtn">Order Book</a>
                        <?php else: ?>
                            <a href="session.php" class="OrderBtn">Order Book</a>
                        <?php endif; ?>

                        <?php
                        echo "
                                </div>
                            </div>
                        </div>
                        ";
                        
                    }
                } 
                else {
                    echo "Nothing found from the Database";
                }
                
                $conn->close();

                ?>
            </div>
        </div>
    </body>
</html>