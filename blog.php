<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WithYou - Blog</title>
</head>
<body>
    <p>Hello, you are in the blog section which is under process.<br>Click on <a href="index.php">logout</a> to exit.</p>
</body>
</html>