<?php
    session_start();
    if(isset($_SESSION['loggedin'])) header("Location: DBConnect.php");

    $error = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
    
    // create the randomiser for the captcha sysetm, along witht he text that they display to check user input against
    $captchas = [
        ['image' => 'captcha/image1.jpg', 'answer' => 'Aeik2'],
        ['image' => 'captcha/image2.jpg', 'answer' => 'ecb4f'],
        ['image' => 'captcha/image3.jpg', 'answer' => '7plBJ8'],
        ['image' => 'captcha/image4.jpg', 'answer' => '24qug'],
    ];
    $random = $captchas[array_rand($captchas)];
    $_SESSION['captcha_answer'] = $random['answer'];
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>La Biblioteca – SignIn</title>
        <meta name="description" content="Sign in to a La Biblioteca to purchase books">
        <meta name="keywords" content="sign in, library, captcha, email, password, La Biblioteca">
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

<!-- display log in form -->
        <form action="login.php" method="POST">
            <div class="logincontainer">

                <div class="imgcontainer">
                    <img src="person.jpg" alt="Avatar" class="avatar">
                </div>
                <br>
                Email: 
                <input type="email" name="email"><br>
                Password:
                <input type="password" name="password"><br>
                <?php 
                    if ($error): 
                ?>
                <p style="color: red; font-size: 14px;"><?php echo $error; ?></p>
                <?php 
                    endif; 
                ?>

                <br> 
                <!-- display captcha -->
                <img src="<?php echo $random['image']; ?>" alt="CAPTCHA" style="height:120px;"><br> 
                <p>Type the characters you see above:<p><br>
                <input type="text" name="captcha_input"><br>
                <button class="sbmtBtn" type="submit">Login</button>
            </div>
        </form>

      
    </body>
</html>