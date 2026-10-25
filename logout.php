<!-- code for logging out. send the user back to the log in page -->
<?php
session_start();
session_unset();
session_destroy();
header("Location: session.php");
exit();
