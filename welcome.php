<?php
session_start();

if (!isset($_SESSION['username'])) {

    header('location: login.php');
    exit;
} else {
    echo "Hi " . $_SESSION['username'] . ", Welcome to the site";
}

?>

<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <br><br>
    <button onclick="window.location.href='logout.php';"> Logout </button>
</body>

</html>