<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: session.php');
    exit();
}

$email        = trim($_POST['email']);
$password     = trim($_POST['password']);
$captchaInput = trim($_POST['captcha_input'] ?? '');

//check email and password
if (empty($email) || empty($password)) {
    header('Location: session.php?error=Please+enter+your+email+and+password.');
    exit();
}

// Check CAPTCHA
if (!isset($_SESSION['captcha_answer']) || strcasecmp($captchaInput, $_SESSION['captcha_answer']) !== 0) {
    header('Location: session.php?error=Incorrect+CAPTCHA.+Please+try+again.');
    exit();
}
unset($_SESSION['captcha_answer']);

include_once("connect.php"); //connect to database

$stmt = mysqli_prepare($conn, "SELECT id, name, email, password FROM users WHERE email = ?"); //sql query
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$user = mysqli_fetch_assoc($result);

if ($user && password_verify($password, $user['password'])) { //verify hashed password and get other details
    $_SESSION['loggedin']   = true;
    $_SESSION['user_id']    = $user['id'];
    $_SESSION['user_name']  = $user['name'];
    $_SESSION['user_email'] = $user['email'];

    header('Location: DBConnect.php?login=success'); //transition to DBConnect.php upon login success
    exit();
}

header('Location: session.php?error=Incorrect+email+or+password.');
exit();
?>