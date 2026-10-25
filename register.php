<?php
include_once("connect.php"); //connect to database


// Get POST data and sanitise
$name     = htmlspecialchars(strip_tags(trim($_POST['name'])));
$phone    = htmlspecialchars(strip_tags(trim($_POST['phone'])));
$email = htmlspecialchars(strip_tags(trim($_POST['email'])));
$password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

// Check if email already exists
$check = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ?");
mysqli_stmt_bind_param($check, "s", $email);
mysqli_stmt_execute($check);
mysqli_stmt_store_result($check);

if (mysqli_stmt_num_rows($check) > 0) {
    echo json_encode(['status' => false, 'message' => 'An account with this email already exists.']);
    exit();
}



// Insert the new user
$stmt = mysqli_prepare($conn, "INSERT INTO users (name, phone, email, password) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssss", $name, $phone, $email, $password);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode(['status' => true, 'message' => 'Registration successful!']);
} else {
    echo json_encode(['status' => false, 'message' => 'Registration failed. Please try again.']);
}

$conn->close();
?>