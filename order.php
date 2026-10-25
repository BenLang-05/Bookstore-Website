<?php
session_start();

// Handle order submission 
if (isset($_POST['place_order'])) {

    include_once("connect.php");

    $user_id = $_SESSION['user_id'];
    $user_email = $_SESSION['user_email'];
    $book_id = intval($_POST['book_id']);

    $sql = "INSERT INTO orders (user_id, user_email, book_id)
            VALUES ($user_id, '$user_email', $book_id)";

    if ($conn->query($sql) === TRUE) {
        $order_success = true;
    } else {
        $order_error = true;
    }

}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>La Biblioteca – Order Books</title>
        <meta name="description" content="Complete an order for the chosen book on the La Biblioteca website.">
        <meta name="keywords" content="order, library, pruchase, La Biblioteca">
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

                    <div class="flyout">
                        <a href="#">Kids ▸</a>
                        <div class="flyout-content">
                            <a href="infants.php">Infant</a>
                            <a href="juniors.php">Junior</a>
                            <a href="young.php">Young</a>
                        </div>
                    </div>

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
            <p class="section-title">Basket</p>

            <!-- SUCCESS / ERROR MESSAGE -->
            <?php if (isset($order_success)): ?>
                <script>alert("Your order has been placed successfully!");</script>
            <?php endif; ?>

            <?php if (isset($order_error)): ?>
                <script>alert("There was a problem placing your order.");</script>
            <?php endif; ?>

            <div class="list" id="list">
                <?php
                
                include_once("connect.php");  //connect to database

                $book_id = intval($_GET['id']);
                $sql = "SELECT * FROM books WHERE id = $book_id LIMIT 1"; //sql query
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    $books = $result->fetch_assoc();
                    $books = array_map('htmlspecialchars', $books);
                        
                    //display books

                    echo "
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
                            </div>
                        </div>
                    </div>
                    ";
                }
                else {
                    echo "Nothing found from the Database";
                }
                ?>

                <!-- Complete order -->
                <form method="POST"> 
                    <input type="hidden" name="book_id" value="<?php echo $books['id']; ?>">
                    <button type="submit" name="place_order" class="OrderBtn">Complete Order</button>
                </form>

                <?php
                $conn->close(); 
                ?>
            </div>
        </div>
    </body>
</html>
